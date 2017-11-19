<?php 
	
	include_once('db.php');
	
<<<<<<< HEAD
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = pg_query($conn, "SELECT * FROM users WHERE username='$username' and password ='$password'");
		$count = pg_num_rows($result);
=======
	$username = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and password ='$password'");
	
		$count = mysqli_num_rows($result);
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
		if($count == 1){
			
			$_SESSION['username'] = $username;
			echo "success";
			
		}
		else{
			echo "failed";
			unset($_SESSION['username']);
		}



?>