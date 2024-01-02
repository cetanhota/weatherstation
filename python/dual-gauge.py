#!/usr/bin/env python
# Wayne Leutwyler
# 12/16/2016

import sys
import Adafruit_DHT
import Adafruit_BMP.BMP085 as BMP085

sensorBMP = BMP085.BMP085()
sensor = Adafruit_DHT.AM2302
pin = 04

# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)

# Un-comment the line below to convert the temperature to Fahrenheit.
temperature = temperature * 9/5.0 + 32 - 4

# Calculate dew point.
dewpoint = temperature - ((100-humidity)/5.0)

# Calculate Mercury
inHg = 0.0002952998751*sensorBMP.read_pressure()

print 'Temp = {0:0.1f} *F '.format(temperature)
print 'Humidity = {0:0.1f}% '.format(humidity)
print 'DewPoint = {0:0.1f} *F'.format(dewpoint)
#print 'Pressure = {0:0.2f} Pa'.format(sensorBMP.read_pressure())
print 'Pressure = {0:0.2f} inHg'.format(inHg)
sys.exit(0)
