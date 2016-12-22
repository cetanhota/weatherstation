<!DOCTYPE html>
<html>
<head>
<?php 
$page_title = "Main Menu";
include ('include/header.inc.php');
?>
<p></p>
</head>
<body bgcolor="#00ccff" background="image/cloud.jpg">
<center>
<h1>Powell Ohio:</h1>
<b><h2>
<p>Elev 959ft<br> 40.17* North<br>83.11* West<br>
<?php
$myfile = fopen("/var/www/html/output/current.out", "r") or die("Unable to open file!");
// Output one line until end-of-file
  echo "" .fgets($myfile) . "";
fclose($myfile);
echo "<br>";
?>
</b></p></h2></center>
<table align=center>
<td><a href="http://weather.com">The Weather Channel</a></td><td><a href="https://www.wunderground.com">Weather Underground</a></td><td><a href="http://nbc4i.com/category/weather/">Storm Team 4</a></td>
</table>
<center> 
<?php include ('include/footer.inc.php');
?>
</center>
</body>
</html>
