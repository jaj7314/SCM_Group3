<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "miniproject";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}	
	
	function connectDB() {
<<<<<<< HEAD
		$conn = pg_connect("host='ec2-54-221-207-143.compute-1.amazonaws.com' port='5432' dbname='d1583ojbjir9jc' user='olrmqdczslmujh' password='63f0cb1a16cf6b40b5b1a71e3fb7f61f0bbf8484ef36c73a3c9d668ef4d76b66'")
		or die ("unable to connect database");
=======
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
		return $conn;
	}
	
	function runQuery($query) {
<<<<<<< HEAD
		$result = pg_query($this->conn,$query);
		$resultArr = pg_fetch_all($result);
		foreach($resultArr as $array)
		{
			$resultset[] = $array;
=======
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
<<<<<<< HEAD
		$result  = pg_query($this->conn,$query);
		$rowcount = pg_num_rows($result);
=======
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
		return $rowcount;	
	}
}
?>