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
sql = "SELECT mxtemp,mntemp,dt FROM weather.history WHERE dt >= (CURDATE() - INTERVAL 1 MONTH ) order by dt desc;"
mycursor.execute(sql)
myresults = mycursor.fetchall()

df = pd.DataFrame(myresults, columns=['mxtemp', 'mintemp', 'dt']).set_index('dt')
df.columns=['MaxTemp','MinTemp']
df.plot(kind='line', figsize=(9,9))

plt.title('\nLast 30 day Highs & Lows.\n')
plt.xlabel(d1)
plt.ylabel('Temperture')
plt.xticks(rotation = 45)
plt.grid(True)
plt.legend()
plt.savefig('/var/www/html/image/30-day-history.png')
#plt.show()

mycursor.close()
mydb.close()
