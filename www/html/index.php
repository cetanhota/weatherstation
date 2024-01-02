<?php 
$page_title = "Main Menu";
include ('include/header.inc.php');
?>
<p></p>
<!-- <body bgcolor="#00ccff" background="image/cloud.jpg"> -->
<center>
<h2>Powell Ohio:<hr>
Elev 959ft<br>
40.17* North<br>
83.11* West<br>
<?php
$myfile = fopen("/var/www/html/output/current.out", "r") or die("Unable to open file!");
// Output one line until end-of-file
  echo "" .fgets($myfile) . "";
fclose($myfile);
echo "<br>";
?>
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
