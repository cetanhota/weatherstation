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
<hr>
<img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/TempHLGraph.jpg">
<img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/HighBMPGraph.jpg">
<hr>
<img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;"src="image/ytd.jpg">
<hr>
<a href="report-2017.php" class="f_button">2017 Highs and Lows</a>
<a href="report-2018.php" class="f_button">2018 Highs and Lows</a>
<h2>2018 / 2019 Temp dif by Month</h2>
<table border=0>
<th colspan=2></th>
<tr>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/01-2019.jpg" alt="No Data">
</td>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/02-2019.jpg" alt="No Data">
</td>
<tr>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/03-2019.jpg" alt="No Data">
</td>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/04-2019.jpg" alt="No Data">
</td>
</tr>
<tr>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/05-2019.jpg" alt="No Data">
</td>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/06-2019.jpg" alt="No Data">
</td>
<tr>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/07-2019.jpg" alt="No Data">
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/08-2019.jpg" alt="No Data">
</tr>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/09-2019.jpg" alt="No Data">
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/10-2019.jpg" alt="No Data">
</tr>
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/11-2019.jpg" alt="No Data">
<td><img style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;" src="image/12-2019.jpg" alt="No Data">
</tr>
</table>
<?php include ('include/footer.inc.php');
?>
</center>
</body>
</html>
