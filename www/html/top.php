<?php
$page_title = "Top";
include ('include/header.ss.inc.php');
?>

<table align=center>
<th align=left><font color=white>
<?php $run = "top -u wayne -n 1 -b"; echo "Command: "; echo $run; ?>
</th></font>
<tr>
<td>
<?php
$runcommand = shell_exec("$run");
echo "<pre>$runcommand</pre>";
?>
</tr>
</td>
</table>
<br>
<center>
<?php include ('include/footer.inc.php');
?>
