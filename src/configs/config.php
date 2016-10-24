namespace myconfig;

class config{
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
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
	}//end of function-connect
}//end of class
?>

