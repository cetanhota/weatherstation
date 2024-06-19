#!/home/wayne/weather-lab/bin/python3
# Version 1.0 11/28/2016
# Wayne Leutwyler
# Version 2.0 05/23/2024

import sys
import Adafruit_BMP.BMP085 as BMP085
import mysql.connector
from mysql.connector import Error
import json

# Create BMP180 instance
sensor = BMP085.BMP085()
inHg = 0.0002952998751*sensor.read_pressure()

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

print('Pressure: {} Pa'.format(sensor.read_pressure()))

# you must create a Cursor object. It will let you execute all the queries you need.
cur = db.cursor()

#prepare SQL query for INSERT
sql = "insert into bmp (pa,inhg) values('%d','%s')" %((sensor.read_pressure()),(inHg))

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
