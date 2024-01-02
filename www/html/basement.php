<?php
$page_title = "Basement";
include ('include/header.inc.php');
include ('include/raspberrypi-connect.inc.php');
?>
<center><h2>Basement Conditions</h2></center>

<?php
$sql = "select tmp,hum,ts from basement order by ts desc limit 10;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     echo "<table style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border: 1px solid black;' border=1 align=center bgcolor='white'><tr><th>-- Tempeture --</th><th>-- Humidity --</th><th>Date</th></tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["tmp"]. "</td>
                   <td>" . $row["hum"]. "</td>
                   <td>" . $row["ts"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
$conn->close();
?>
</td>
</tr>
</table> 

<center>
<?php include ('include/footer.inc.php');
?>

</center>
</body>
</html>
