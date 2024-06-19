#!/home/wayne/weather-lab/bin/python3
# -*- coding: utf-8 -*-
"""""
5/11/2024
@author: wayne
"""""

import Adafruit_BMP.BMP085 as BMP085
import Adafruit_DHT

# Set sensor type: DHT11, DHT22, or AM2302
sensor = Adafruit_DHT.DHT22

# Set GPIO pin number
pin = 4

# Create BMP180 instance
bmp = BMP085.BMP085()

# Try to grab a sensor reading. Use the read_retry method to retry up to 15 times
# (in case of failure, such as when the sensor is busy).
humidity, temperature = Adafruit_DHT.read_retry(sensor, pin)
temperature = temperature * 9/5.0 + 32 
dewpoint = temperature - ((100-humidity)/5.0)
pressure = round(bmp.read_pressure() / 3386, 2)

### heat index function
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

heat_index_value = round(heat_index(temperature, humidity), 2)

# If a reading is successful, print it
if humidity is not None and temperature is not None:
    print(f'Temperature: {temperature:.1f}°F')
    print(f'Humidity: {humidity:.1f}%')
    print(f'Dew Point: {dewpoint:.1f}°F')
    print(f'Heat Index: {heat_index_value:.1f}°F')
    print('Pressure: {} Pa'.format(pressure))
else:
    print('Failed to get reading. Try again!')
