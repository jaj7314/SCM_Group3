<?php 
	
	include_once('db.php');
	
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and password ='$password'");
	
		$count = mysqli_num_rows($result);
		if($count == 1){
			
			$_SESSION['username'] = $username;
			echo "success";
			
		}
		else{
			echo "failed";
			unset($_SESSION['username']);
		}



?>