<meta http-equiv="refresh" content="60" />
<?php
echo "<h2>Shop Temperature<hr>";
$myfile = fopen("/var/www/html/output/shop-conditions.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo "<h2>" .fgets($myfile) . "</h2>";
}
#echo fread($myfile,filesize("/var/www/html/output/current.out"));
fclose($myfile);
echo "<hr>";
echo date("F d, Y g:i a");
?>
