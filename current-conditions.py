#!/usr/bin/env python

import sys
import Adafruit_DHT

sensor = Adafruit_DHT.AM2302
pin = 04

# Try to grab a sensor reading.  Use the read_retry method which will retry up
# to 15 times to get a sensor reading (waiting 2 seconds between each retry).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)

# Un-comment the line below to convert the temperature to Fahrenheit.
temperature = temperature * 9/5.0 + 32

# Calculate dew point.
dewpoint = temperature - ((100-humidity)/5.0)

if humidity is not None and temperature is not None:
        print 'Temp={0:0.1f}*F  Humidity={1:0.1f}% DewPoint={2:0.1f}'.format(temperature, humidity, dewpoint)
else:
        print 'Failed to get reading. Try again!'
sys.exit(0)
