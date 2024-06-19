<?php 
$page_title = "Main Menu";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>
<p></p>
<!-- <body bgcolor="#00ccff" background="image/cloud.jpg"> -->
<center>
<h2>Powell Ohio:<br>
<br>
Elev 959ft<br>
40.17° North<br>
83.11° West<br>
<br>
<?php
$sql = "select tmp from weatherv2 order by ts desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table align=center style='font-size:26px; color:#000000; text-shadow: 1px 1px 1px #b8b894;'></tr>";
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>Temperature:</td><td align=right>" . $row["tmp"]. "</td><td align=left>°F</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
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
<?php
$sql = "SELECT ts FROM weather.weatherv2 WHERE ts <= current_timestamp() order by ts desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table align=center><th> Last DB update time:</th></tr>";
     while($row = $result->fetch_assoc()) {
         echo "<tr><td align=center>" . $row["ts"]. "</td></tr>";
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
<br>
<?php include ('include/footer.inc.php');
?>
