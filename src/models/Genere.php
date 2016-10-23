<?php
namespace GenereClass;
use myconfig\config as italianretreat;
include "../configs/config.php";

class Genere{
	//public $co = null;
	public $coalminegaurav = null;
	public $conn = null;

	function __construct(){
		echo "constructor called";
		$this->coalminegaurav= new italianretreat();
		$this->coalminegaurav = $this->coalminegaurav->connect();
		
	}
	function populateGenere(){
		$result1 = array();
		$count = 0;
		$res = mysqli_query($this->coalminegaurav,"select GenereDescription from Genere");
		while($result = mysqli_fetch_assoc($res)){
			$result1[$count] = $result['GenereDescription'];
			$count++;
		}
		return $result1;
	}
}

$gen = new Genere();
$res = $gen->populateGenere();
print_r($res);

