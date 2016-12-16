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
<table align=center border=1 bgcolor=white>
<td>The last 15 days worth of data is being reported below.</td>
</table>
<br>
<table align=center>
<th>Temperature</th><th>Humidity</th><th>DewPoint</th>
<tr><td>
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

$sql = "SELECT * FROM raspberrypi.v_history limit 15;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table border=1 align=center bgcolor=#ffffff><tr><th>-- High --</th><th>-- Low --</th><th>Date</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["High"]. "</td>
		   <td>" . $row["Low"]. "</td>
		   <td>" . $row["Date"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</td>
<td>
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

$sql = "SELECT * FROM raspberrypi.v_humidity_history limit 15;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table border=1 align=center bgcolor=#ffffff><tr><th>-- High --</th><th>-- Low --</th><th>Date</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["High"]. "</td>
                   <td>" . $row["Low"]. "</td>
                   <td>" . $row["Date"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</td>
<td>
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

$sql = "SELECT * FROM raspberrypi.v_dewpoint_history limit 15;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table border=1 align=center bgcolor=#ffffff><tr><th>-- High --</th><th>-- Low --</th><th>Date</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["High"]. "</td>
                   <td>" . $row["Low"]. "</td>
                   <td>" . $row["Date"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</td></tr>
</table> 
<center>
<h1>Highs and Lows for last 30 days.</h1> 
<hr>
<img src="image/HighTempGraph.jpg">
<img src="image/LowTempGraph.jpg">
<hr>
<h1>Barometric Pressure</h1>
<img src="image/HighBMPGraph.jpg">
<?php include ('include/footer.inc.php');
?>
</center>
</body>
</html>
