<?php 
	
	include_once('db.php');
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = pg_query($conn, "SELECT * FROM users WHERE username='$username' and password ='$password'");
		$count = pg_num_rows($result);
		if($count == 1){
			
			$_SESSION['username'] = $username;
			echo "success";
			
		}
		else{
			echo "failed";
			unset($_SESSION['username']);
		}



?>