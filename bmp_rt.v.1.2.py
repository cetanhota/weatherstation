#!/usr/bin/python
import MySQLdb
import sys
import time
import Adafruit_BMP.BMP085 as BMP085

time.sleep(30)
sensor = BMP085.BMP085()
inHg = 0.0002952998751*sensor.read_pressure()

db = MySQLdb.connect(host="",    # your host, usually localhost
                     user="",         # your username
                     passwd="",  # your password
                     db="")        # name of the data base

#print 'Pressure = {0:0.2f} Pa'.format(sensor.read_pressure())
#print 'Mercury = {0:02f} inHg'.format(inHg)

# you must create a Cursor object. It will let you execute all the queries you need.
cur = db.cursor()
#prepare SQL query for INSERT
sql = "insert into bmp_rt (pa,inhg,ts) values('%d','%s',NOW())" %((sensor.read_pressure()),(inHg))

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
