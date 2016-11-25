#!/usr/bin/python

import Adafruit_BMP.BMP085 as BMP085
sensor = BMP085.BMP085()

inHg = 0.0002952998751*sensor.read_pressure() 
#print 'Pressure = {0:0.2f} Pa'.format(sensor.read_pressure())
print 'Mercury = {0:02f} inHg'.format(inHg)
