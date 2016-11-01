<?php
namespace cool_name_for_your_group\myconfig;

class config
{
    const Servername = "localhost";
    const Username = "root";
    const Password = "";
    const DbName = "HW3";
    const Mycon = '';

    const HW3root = "c:/xampp/htdocs/Hw3";
    const MAX_TITLE_LENGTH = 30;
    const MAX_AUTHOR_LENGTH = 30;
    const MAX_STORY_LENGTH = 5000;
    const MAX_IDENTIFIER_LENGTH = 15;
}

// Create connection

//	function connect(){
//			$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbName);
//			if(!$con){
//				die('could not connect to database!');
//			}
//			else{
//				$this->mycon = $con;
//			}
//			return $this->mycon;
//	}//end of function-connect
//end of class
