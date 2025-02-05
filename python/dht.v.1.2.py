#!/home/wayne/weather-lab/bin/python3
# Wayne Leutwyler
# Version 1.0 12/16/2016
# version 2.0 05/23/2024

import mysql.connector 
import sys
import Adafruit_DHT
from mysql.connector import Error
import json

# Opening JSON file
f = open('.my.json')

# returns JSON object as a dictionary
data = json.load(f)

hostname = str( data['hostname'] )
username = str( data['username'] )
password = str( data['password'] )
database = str( data['database'] )

# Closing file
f.close()

db = mysql.connector.connect(host=hostname,    # your host, usually localhost
                     user=username,         # your username
                     passwd=password,  # your password
                     db=database)        # name of the data base

# Set sensor type: DHT11, DHT22, or AM2302
sensor = Adafruit_DHT.DHT22

# Example using a Raspberry Pi with DHT sensor
# connected to GPIO7.
pin = 4

# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)

# Un-comment the line below to convert the temperature to Fahrenheit.
temperature = temperature * 9/5.0 + 32

# Calculate dew point.
dewpoint = temperature - ((100-humidity)/5.0)

def heat_index(temperature, humidity):
    c1 = -42.379
    c2 = 2.04901523
    c3 = 10.14333127
    c4 = -0.22475541
    c5 = -6.83783 * 10**-3
    c6 = -5.481717 * 10**-2
    c7 = 1.22874 * 10**-3
    c8 = 8.5282 * 10**-4
    c9 = -1.99 * 10**-6

    # Calculate the heat index
    HI = (c1 + c2 * temperature + c3 * humidity +
          c4 * temperature * humidity + c5 * temperature**2 +
          c6 * humidity**2 + c7 * temperature**2 * humidity +
          c8 * temperature * humidity**2 +
          c9 * temperature**2 * humidity**2)

    return HI

hiv = round(heat_index(temperature, humidity), 2)
        
# you must create a Cursor object. It will let you execute all the queries you need.
cur = db.cursor()

#prepare SQL query for INSERT
sql = "insert into dht (tmp,hum,dew,hi) values('%d','%d','%d','%d')" %((temperature),(humidity),(dewpoint),(hiv))
		
try:
        # execute the sql command
        cur.execute(sql)
        db.commit()
except:
        # rollback if error
        db.rollback()

#close cursor
#cur.close()

#close connection
#db.close()

if db.is_connected():
	cur.close()
	db.close()
	print("MySQL connection is closed")
	sys.exit(0)
