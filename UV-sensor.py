#!/usr/bin/env python

#from time import sleep
import serial, sys
ser = serial.Serial("/dev/ttyACM0",9600)
getVal = ser.readline()
print(getVal)
sys.stdout.flush()
