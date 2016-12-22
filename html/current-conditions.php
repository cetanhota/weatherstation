<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="60" />
<?php
$page_title = "Current Conditions";
include ('include/header.inc.php');
?>
<p></p>
</head>
<body bgcolor="#00ccff" background="image/cloud.jpg">
<center>
<?php
$myfile = fopen("/var/www/html/output/current.out", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo "<h1>" .fgets($myfile) . "</h1>";
}
#echo fread($myfile,filesize("/var/www/html/output/current.out"));
fclose($myfile);
?>
<hr>
<h1>Current High and Low Temps.</h1>
<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "select max(tmp) mxtemp, min(tmp) mntemp from dht group by DATE(ts) desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table border=1 align=center bgcolor=#ffffff><tr><th>-- High --</th><th>-- Low --</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td align=center bgcolor=red>" . $row["mxtemp"]. "</td>
                   <td align=center bgcolor=#00ccff>" . $row["mntemp"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</td>
<td>
<h1>Barometric Pressure</h1>
<img src="image/BMP24HourReport.jpg">
<center>
<?php include ('include/footer.inc.php');
?>
</center>
</body>
</html>
