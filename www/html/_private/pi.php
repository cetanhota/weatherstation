<?php
function pi(){
$servername = "192.168.1.61";
$username = "weather";
$password = "weather!";
$dbname = "weather";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	}
}
?>
