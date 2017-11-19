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
		$conn = pg_connect("host='ec2-54-221-207-143.compute-1.amazonaws.com' port='5432' dbname='d1583ojbjir9jc' user='olrmqdczslmujh' password='63f0cb1a16cf6b40b5b1a71e3fb7f61f0bbf8484ef36c73a3c9d668ef4d76b66'")
		or die ("unable to connect database");
		return $conn;
	}
	
	function runQuery($query) {
		$result = pg_query($this->conn,$query);
		$resultArr = pg_fetch_all($result);
		foreach($resultArr as $array)
		{
			$resultset[] = $array;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = pg_query($this->conn,$query);
		$rowcount = pg_num_rows($result);
		return $rowcount;	
	}
}
?>