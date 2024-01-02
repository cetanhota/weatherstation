<?php
// <website-root-dir>/_private/bp-connect.inc.php

function connect_to_bp() {
$mysqluser="weather"; //user name
$mysqlpasswd="weather!"; //user password
$mysqlhost="192.168.1.61"; // name of host computer
$connID=@mysql_pconnect($mysqlhost, $mysqluser, $mysqlpasswd);
	
	if ($connID) {
		mysql_select_db("weather"); //set default DB
		return $connID;
	}
	else {
		echo "<!DOCTYPE HTML PUBLIC\"-//W3C/DTD HTML 4.0//EB\">
		<html><head>
		<title>Sorry, no connection ... </title>
		<body><p>Sorry, no connection to database ... </body>
		</html>\n";
	exit (); // terminate php interpreter
	}
}
?>

