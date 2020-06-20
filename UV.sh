#!/bin/bash
/home/pi/projects/UV-sensor.py | head -1 > /home/pi/data/uv-reading.txt
cp /home/pi/data/uv-reading.txt /var/www/html/output
