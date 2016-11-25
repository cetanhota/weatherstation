<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="60" />
<?php
$page_title = "Current Conditions";
include ('include/header.inc.php');
?>
<p></p>
</head>
<body bgcolor="#00ccff" background="image/cloud.jpg">
<center>
<?php
$myfile = fopen("/var/www/html/output/current.out", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo "<h1>" .fgets($myfile) . "</h1>";
}
#echo fread($myfile,filesize("/var/www/html/output/current.out"));
fclose($myfile);
?>
<center>
<?php include ('include/footer.inc.php');
?>
</center>
</body>
</html>
