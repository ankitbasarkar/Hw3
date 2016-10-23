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
/*	//$query[] ="CREATE TABLE Genere(gid int UNSIGNED AUTO_INCREMENT , Description VARCHAR(20) NOT NULL, PRIMARY KEY(gid) );";
	//$query[] =  "INSERT INTO Genere VALUES (null,'FICTION');";
	$query1 = cdb.getQuery();
	foreach($query1 as $que){
		if ($conn->query($que) === TRUE) {
			echo "successfully";
		} else {
			echo "Error creating database: " . $conn->error;
			break;
		}
	}

$conn->close();
*/
?>
