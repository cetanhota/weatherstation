<?php 
$page_title = "Main Menu";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>
<p></p>
<!-- <body bgcolor="#00ccff" background="image/cloud.jpg"> -->
<center>
<h2>Powell Ohio:<hr>
Elev 959ft<br>
40.17* North<br>
83.11* West<br>
<br>
<?php
$sql = "select tmp from percona order by ts desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table align=center style='font-size:26px; color:#005266; text-shadow: 1px 1px 1px #b8b894;'><th> Temperature </th></tr>";
     //echo "<table style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;' border=1 align=center bgcolor='white'><tr><th> Tempeture </th><th> Humidity </th><th> Dew Point </th><th> Heat Index </th><th> Pressure </th><th> UV </th><th>Date</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td align=center>" . $row["tmp"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
$conn->close();
?>
</td>
</tr>
</table> 


</h2></center>
<table align=center>
<td><a href="http://weather.com" class="f_button">The Weather Channel</a>
</td>
<td><a href="https://www.wunderground.com" class="f_button">Weather Underground</a>
</td>
<td><a href="http://nbc4i.com/category/weather/" class="f_button">Storm Team 4</a></td>
</table>
<center> 
<br>
<br>
<?php include ('include/footer.inc.php');
?>
