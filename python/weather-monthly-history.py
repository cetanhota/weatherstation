#!/home/wayne/weather-lab/bin/python3

import sys
import matplotlib.pyplot as plt
import mysql.connector
import pandas as pd
import numpy as np
from datetime import date
import calendar
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

while True:
    user_month = input("Enter Month Number: ")
    try:
        month_num = int(user_month)
        break
    except ValueError:
        print("The input is not a valid integer. Please try again.")

while True:
    user_start_date = input("Enter Start Day: ")
    try:
        start_date = int(user_start_date)
        break
    except ValueError:
        print("The input is not a valid integer. Please try again.")

while True:
    user_end_date = input("End Date: ")
    try:
        end_date = int(user_end_date)
        break
    except ValueError:
        print("The input is not a valid integer. Please try again.")

while True:
        user_year = input("Year: ")
        try:
            year = int(user_year)
            break
        except ValueError:
            print("The input is not a valid integer. Please try again.")

monthName = (calendar.month_name[month_num]).lower()

start_date = (str(year)+"-"+str(month_num)+"-"+str(start_date))
end_date = (str(year)+"-"+str(month_num)+"-"+str(end_date))

today=date.today()
d1 = today.strftime("%m/%d/%Y")

mydb = mysql.connector.connect(
  host=hostname,
  user=username,
  password=password,
  database=database
)

mycursor = mydb.cursor()
sql = "SELECT mxtemp,mntemp,dt FROM history where dt >= '%s' and dt <= '%s' order by dt desc;" %((start_date),(end_date))
mycursor.execute(sql)
myresults = mycursor.fetchall()

df = pd.DataFrame(myresults, columns=['mxtemp', 'mintemp', 'dt']).set_index('dt')
df.columns=['MaxTemp','MinTemp']
df.plot(kind='line', figsize=(9,9))

plt.title('\n'+str(monthName)+'-'+str(year)+'\n')
plt.xlabel(d1)
plt.ylabel('Temperture')
plt.xticks(rotation = 45)
plt.grid(True)
plt.legend()
plt.savefig("/var/www/html/image/2024/"+monthName+".png")
#plt.show()

mycursor.close()
mydb.close()
