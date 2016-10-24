<?php
namespace GenereClass;
use myconfig\config as DBConnect;
include "../configs/config.php";

class Genere{
	//public $co = null;
	public $connection_Formed = null;
	
	function __construct(){
		$this->connection_Formed= new DBConnect();
		$this->connection_Formed = $this->connection_Formed->connect();
		
	}
	function populateGenere(){
		$result1 = array();
		$count = 0;
		$res = mysqli_query($this->connection_Formed,"select GenereDescription from Genere");
		while($result = mysqli_fetch_assoc($res)){
			$result1[$count] = $result['GenereDescription'];
			$count++;
		}
		return $result1;
	}
}


