#!/usr/bin/python
# Wayne Leutwyler
# 12/16/2016

import MySQLdb
import sys
import Adafruit_DHT

db = MySQLdb.connect(host="",    # your host, usually localhost
                     user="",         # your username
                     passwd="",  # your password
                     db="")        # name of the data base

sensor = Adafruit_DHT.AM2302

# Example using a Raspberry Pi with DHT sensor
# connected to GPIO7.
pin = 4

# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)

# Un-comment the line below to convert the temperature to Fahrenheit.
temperature = temperature * 9/5.0 + 32 - 4

# Calculate dew point.
dewpoint = temperature - ((100-humidity)/5.0)
        
# you must create a Cursor object. It will let you execute all the queries you need.
cur = db.cursor()

#prepare SQL query for INSERT
sql = "insert into dht (tmp,hum,dew) values('%d','%d','%d')" %((temperature),(humidity),(dewpoint))
		
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
