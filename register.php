<?php
	include_once('db.php');
	
		if ($_POST['R_password'] == $_POST['R_confirmpassword']) 
		{
			$username = $conn->real_escape_string($_POST['R_username']);
			$email = $conn->real_escape_string($_POST['R_email']);
			$password = $conn->real_escape_string($_POST['R_password']);
			$confirmcode = md5( rand(0,1000) );
			$status = 'Inactive';
			
			$query = "INSERT INTO users (username, email, password,confirmcode,status)" ." VALUE ('$username','$email','$password','$confirmcode','$status')";
			
			if($conn->query($query) === true)
			{
				$subject = 'Signup | Verification';
				$content = ' 
				
Hello '.$username.'
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
				
Please click this link to activate your account: 
http://localhost/Mini%20Project/verify.php?username='.$username.'&confirmcode='.$confirmcode.'
				
				
				'; 
				
				$header = 'From: noreply@kf.com' . "\r\n";
				if(mail($email,$subject,$content,$header)){
				$_SESSION['username'] = $username;
				echo "success";
				}
				else{
					echo "success";
				}
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