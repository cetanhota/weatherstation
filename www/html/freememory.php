<?php
$page_title = "Memory Usage";
include ('include/header.ss.inc.php');
?>

<table align=center border=0>
<th align=left><font color=white>
<?php $run = "free -h"; echo "Command: "; echo $run; ?>
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
