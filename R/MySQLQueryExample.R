library(DBI)
library(RMySQL)
con <- dbConnect(MySQL(), user="", password="", dbname="", host="")
rs <- dbSendQuery(con, "select id,tmp from dht")
DHT <- fetch(rs, n=10)
huh <- dbHasCompleted(rs)
dbClearResult(rs)
dbDisconnect(con)


plot(DHT)
plot(DHT, type="o", col="blue")
title(main="TEMP", col.main="red")
