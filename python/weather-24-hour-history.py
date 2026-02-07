#!/home/wayne/weather-lab/bin/python3

import sys
import matplotlib.pyplot as plt
import mysql.connector
import pandas as pd
import numpy as np
from datetime import date

import json

# Opening JSON file
f = open('/home/wayne/bin/.my.json')

# returns JSON object as a dictionary
data = json.load(f)

hostname = str( data['hostname'] )
username = str( data['username'] )
password = str( data['password'] )
database = str( data['database'] )
portnumber = str( data['portnumber'] )

# Closing file
f.close()

today=date.today()
d1 = today.strftime("%m/%d/%Y")

mydb = mysql.connector.connect(
  host=hostname,
  port=portnumber,
  user=username,
  password=password,
  database=database
)

mycursor = mydb.cursor()
sql = "SELECT tmp, dew, ts  FROM weather.weatherv2  WHERE ts >= NOW() - INTERVAL 24 HOUR  ORDER BY ts DESC;"

mycursor.execute(sql)
myresults = mycursor.fetchall()

df = pd.DataFrame(myresults, columns=['tmp', 'dew', 'ts']).set_index('ts')
df.columns=['Temperture','Dew Point']
df.plot(kind='line')

plt.title('\nLast 24 Hours of Data.\n')
plt.xlabel(d1)
plt.ylabel('Temperture')
#plt.xticks([])
plt.grid(True)
plt.legend()
plt.savefig('/var/www/html/image/24-hour-history.png')
#plt.show()

mycursor.close()
mydb.close()

