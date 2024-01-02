<!DOCTYPE html>
<html>
<head>
<?php
$page_title = "Weather Report";
include ('include/header.inc.php');
?>
<p></p>
</head>
<body bgcolor="#00ccff" background="image/cloud.jpg">

<br>
<?php

$servername = "192.168.1.21";
$username = "mysqladm";
$password = "hawk69";
$dbname = "raspberrypi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "select max(tmp) mxtemp, min(tmp) mntemp from dht group by ts desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table border=1 align=center bgcolor=#ffffff><tr><th>-- High --</th><th>-- Low --</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td align=center>" . $row["mxtemp"]. "</td>
                   <td align=center>" . $row["mntemp"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</td>
<td>
