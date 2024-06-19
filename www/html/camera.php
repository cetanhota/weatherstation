<?php
$page_title = "Main Menu";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>

<center>
<br>
<table style="text-align: center;">
<tr>
<td style="vertical-align: top;"><img src='http://weather-cam.local:8080/?action=stream' alt='Frontyard Cam' height='480' width='640'></td>
<td style="vertical-align: top;"><img src='http://backyard-cam.local:8080/?action=stream' alt='Backyard Cam' height='480' width='640'></td>
</tr>
</table>
<br>
<?php include ('include/footer.inc.php');
?>
