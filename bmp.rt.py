#!/usr/bin/python

import Adafruit_BMP.BMP085 as BMP085
sensor = BMP085.BMP085()
x=0

inHg = 0.0002952998751*sensor.read_pressure() 
pressure = sensor.read_pressure()
#print 'Mercury = {0:02f} inHg'.format(inHg)

while x==0: 
	print pressure
