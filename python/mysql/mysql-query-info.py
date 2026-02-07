#!/home/wayne/weather-lab/bin/python3
# Wayne Leutwyler

import mysql.connector
from tabulate import tabulate
import json

# Opening JSON file
f = open('/home/wayne/bin/.my.json')

# returns JSON object as a dictionary
data = json.load(f)

hostname = str( data['hostname'] )
username = str( data['username'] )
password = str( data['password'] )
database = str( data['database'] )

# Closing file
f.close()

def get_queries_with_rows_scanned_and_returned(host, user, password, database=None, limit=10):
    try:
        # Connect to the MySQL database
        connection = mysql.connector.connect(
            host=hostname,
            user=username,
            password=password,
            database=database
        )
        cursor = connection.cursor(dictionary=True)
        
        # Query to fetch data from performance_schema.events_statements_summary_by_digest
        query = """
        SELECT 
            DIGEST_TEXT AS query,
            SUM(NO_INDEX_USED) AS no_index_used,
            SUM(NO_GOOD_INDEX_USED) AS no_good_index_used,
            SUM(SUM_ROWS_SENT) AS rows_returned,
            SUM(SUM_ROWS_EXAMINED) AS rows_scanned,
            COUNT_STAR AS executions
        FROM performance_schema.events_statements_summary_by_digest
        WHERE DIGEST_TEXT IS NOT NULL
        GROUP BY DIGEST_TEXT
        ORDER BY rows_scanned DESC
        LIMIT %s;
        """
        
        cursor.execute(query, (limit,))
        results = cursor.fetchall()
        
        # Format the results
        if results:
            print(tabulate(results, headers="keys", tablefmt="grid"))
        else:
            print("No data found.")
    
    except mysql.connector.Error as err:
        print(f"Error: {err}")
    finally:
        if cursor:
            cursor.close()
        if connection:
            connection.close()

# Example usage
if __name__ == "__main__":
    # Replace these with your MySQL server credentials
    host = "localhost"
    user = "root"
    password = "password"
    database = None  # Optional, can specify if needed
    
    # Fetch and display the queries
    get_queries_with_rows_scanned_and_returned(host, user, password, database)
