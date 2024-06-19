<meta http-equiv="refresh" content="60" />
<?php
$page_title = "Current Conditions";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>
<p></p>
<center>

<?php
$sql = "select tmp,hum,dew,hi,prs from weatherv2 order by ts desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table style='font-size:20px;' bgcolor=white border=1 align=center'><tr><th> Temperature </th><th> Humidity </th><th> Dew Point </th><th> Heat Index </th><th> Pressure </th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td align=center>" . $row["tmp"]. "</td>
		   <td align=center>" . $row["hum"]. "</td>
		   <td align=center>" . $row["dew"]. "</td>
		   <td align=center>" . $row["hi"]. "</td>
		   <td align=center>" . $row["prs"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>
</td>
<td>
<br>
<table style="text-align: center; box-shadow: 5px 5px 5px #888888;" bgcolor=#0099ff border="0" cellpadding="2" cellspacing="2">
<tr>
<td style="vertical-align: top;"><img src="image/24-hour-history.png" alt="24 hour report"  /></td>
</table>

<center>
<?php include ('include/footer.inc.php');
?>
