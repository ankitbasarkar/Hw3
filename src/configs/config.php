<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
		echo "Connect Error";
		die("Connection failed: " . $conn->connect_error);
	}
	else
		echo "connection successful";

