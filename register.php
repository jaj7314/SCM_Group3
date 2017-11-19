<?php
	include_once('db.php');
	
		if ($_POST['R_password'] == $_POST['R_confirmpassword']) 
		{
			$username = $_POST['R_username'];
			$email = $_POST['R_email'];
			$password = $_POST['R_password'];
			$confirmcode = md5( rand(0,1000) );
			$status = 'Inactive';
			
			$query = "INSERT INTO users (username, email, password,confirmcode,status) VALUES ('".
			$username . "','" .$email. "','" .$password. "','" .$confirmcode. "','".$status."')";
			if(pg_query($conn,$query)){
				$_SESSION['username'] = $username;
				echo "success";
			}
			else 
			{
				echo "username";
			}
		}
		else
		{
			echo "password";
		}
?>