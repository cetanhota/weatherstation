#!/home/wayne/weather-lab/bin/python3

import sys
import matplotlib.pyplot as plt
import mysql.connector
import pandas as pd
import numpy as np
from datetime import date

import json

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

today=date.today()
d1 = today.strftime("%m/%d/%Y")

mydb = mysql.connector.connect(
  host=hostname,
  user=username,
  password=password,
  database=database
)

mycursor = mydb.cursor()
sql = "select tmp,hum,dew,hi,ts from weather.weatherv2 order by ts desc limit 96"

mycursor.execute(sql)
myresults = mycursor.fetchall()

df = pd.DataFrame(myresults, columns=['tmp', 'hum', 'dew', 'hi', 'ts']).set_index('ts')
df.columns=['Temperture','Humidity','Dew Point','Heat Index']
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

