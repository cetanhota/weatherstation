<?php
$page_title = "Disk Usage";
include ('include/header.ss.inc.php');
?>

<table align=center>
<th align=left><font color=white>
<?php $run = "du -h --max-depth=1 /"; echo "Command: "; echo $run; ?>
</th></font>
<tr>
<td>
<?php
$runcommand = shell_exec("$run");
echo "<pre>$runcommand</pre>";
?>
</td>
</tr>
</table>
<br>
<center>
<?php include ('include/footer.inc.php');
?>
