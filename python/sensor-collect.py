#!/home/wayne/weather-lab/bin/python3
# Wayne Leutwyler
# Version 1.0 12/16/2016
# version 2.0 05/23/2024

import mysql.connector 
import sys
import Adafruit_DHT
import Adafruit_BMP.BMP085 as BMP085
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

# Create BMP180 instance
bmp = BMP085.BMP085()

# Set sensor type: DHT11, DHT22, or AM2302
dht = Adafruit_DHT.DHT22

# Example using a Raspberry Pi with DHT sensor
# connected to GPIO7.
pin = 4

# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(dht, pin)

# Un-comment the line below to convert the temperature to Fahrenheit.
temperature = temperature * 9/5.0 + 32
#print(f'Temperature: {temperature:.1f}°F')
#print(f'Humidity: {humidity:.1f}%')

# Calculate dew point.
dewpoint = temperature - ((100-humidity)/5.0)
#print(f'Dew Point: {dewpoint:.1f}°F')

# Calculate pressure
prs = 0.0002952998751*bmp.read_pressure()
#print('Pressure: {} Pa'.format(prs))

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
#print(f'Heat Index: {hiv:.1f}°F')
        
# you must create a Cursor object. It will let you execute all the queries you need.
cur = db.cursor()

#prepare SQL query for INSERT
sql = "insert into weatherv2 (tmp,hum,dew,hi,prs) values('%s','%s','%s','%s','%s')" %((temperature),(humidity),(dewpoint),(hiv),(prs))

try:
        # execute the sql command
        cur.execute(sql)
        db.commit()
except:
        # rollback if error
        db.rollback()

#close cursor
cur.close()

#close connection
db.close()

sys.exit(0)
