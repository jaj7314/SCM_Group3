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
		$conn = pg_connect("host='localhost' port='5432' dbname='miniproject' user='postgres' password='admin'")
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