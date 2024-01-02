<meta http-equiv="refresh" content="60" />
<?php
$page_title = "Current Conditions";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>
<p></p>
<center>
<?php
echo "<h2>" . date("F d, Y") ."</h2>" . "<hr>";
$myfile = fopen("/var/www/html/output/current.out", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo "<h2>" .fgets($myfile) . "</h2>";
}
#echo fread($myfile,filesize("/var/www/html/output/current.out"));
fclose($myfile);

$uvfile = fopen("/var/www/html/output/uv-reading.txt", "r") or die("Unable to open file!");
echo "<h2>UV = " .fgets($uvfile) . "</h2>";
fclose($uvfile);
?>
<?php
$sql = "select max(tmp) mxtemp, min(tmp) mntemp from dht group by DATE(ts) desc limit 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;' border=1 align=center bgcolor='white'><tr><th><font color=#000000>-- High --</font></th><th><font color=#000000>-- Low --</font></th></tr>";
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
<hr>
<table>
<td>
<div class="graphshadow">
<img src="image/BMP24HourReport.jpg" loading="lazy" style="width:100%">
</div>
</td>
<td>
<div class="graphshadow">
<img src="image/HUM24HourReport.jpg" loading="lazy"> 
</div>
</td>
<tr>
<td align='center' colspan=2>
<div class="graphshadow">
<img src="image/TMP24HourReport.jpg" loading="lazy">
</div>
</td>
</tr>
</table>
<center>
<?php include ('include/footer.inc.php');
?>
