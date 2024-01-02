<?php
$page_title = "System Status";
include ('include/header.ss.inc.php');
?>
<table align=center>
<td>
<?php
echo "<font size=4>";
#echo php_uname('a');
$run = "cat /etc/debian_version"; 
$runcommand = shell_exec("$run");
#echo "<br>";
echo "<h4><pre>Debian Version: $runcommand</pre></h4>";
echo "</font>";
$myfile = fopen("/var/www/html/output/pi-status.out", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo "<h4><font color=green>" .fgets($myfile) . "</font></h4>";
}
fclose($myfile);
?>
</td>
</table>
<center>
<?php include ('include/footer.inc.php');
?>
