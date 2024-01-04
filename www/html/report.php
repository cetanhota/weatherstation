<?php 
$page_title = "Almanac";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>
<center><h2>Weather Almanac</h2></center><hr>
<table align=center>
<th>Temperature</th><th>Humidity</th><th>DewPoint</th>
<tr><td>
<?php
$sql = "SELECT * FROM weather.v_history limit 7;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;' border=1 align=center bgcolor='white'><tr><th>-- High --</th><th>-- Low --</th><th>Date</th></tr>";
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
?>
</td>
<td>
<?php
$sql = "SELECT * FROM weather.v_humidity_history limit 7;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;' border=1 align=center bgcolor='white'><tr><th>-- High --</th><th>-- Low --</th><th>Date</th></tr>";
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
?>
</td>
<td>
<?php
$sql = "SELECT * FROM weather.v_dewpoint_history limit 7;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;' border=1 align=center bgcolor='white'><tr><th>-- High --</th><th>-- Low --</th><th>Date</th></tr>";
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
<br>
<table style="text-align: center; box-shadow: 5px 5px 5px #888888;" bgcolor=#0099ff border="0" cellpadding="2" cellspacing="2">
<tr>
<td style="vertical-align: top;"><img src="image/weather-30-day-history.png" alt="30 day history"  /></td>
</table>

<?php include ('include/footer.inc.php');
?>
</center>
</body>
</html>
