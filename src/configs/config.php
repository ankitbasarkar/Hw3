<?php
//use cbd;
$servername = "localhost";
$username = "root";
$password = "password";
//$dbName = "HW3";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
		echo "connection successful";
?>
