<?php
//use cbd;
namespace myconfig;

class config{
	public $servername = "localhost";
	public $username = "root";
	public $password = "gauravabc";
	public $dbName = "HW3";
	public $mycon = '';


// Create connection
  
	function connect(){
			$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
			if(!$con){
				die('could not connect to database!');
			}
			else{
				$this->mycon = $con;
			}
			return $this->mycon;
	}
	//public static $conn = new mysqli($servername, $username, $password, $dbName);
	// Check connection
	/*if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	else
		echo "connection successful";
		
		function getConnection(){
			return $conn;
		}
	}*/
}
?>
