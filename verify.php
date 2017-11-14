<?php
	include_once('db.php');
	
	$username = $_GET['username'];
	$confirmcode = $_GET['confirmcode'];
	
	$result = mysqli_query($conn, "SELECT username, confirmcode, status FROM users WHERE username='$username' and confirmcode ='$confirmcode' and status='Inactive'");
	$count = mysqli_num_rows($result);
	if($count == 1){
		$query = mysqli_query($conn,"UPDATE users SET status = 'Active' WHERE username = '$username' AND confirmcode = '$confirmcode'");
		if($query) {
		header("location: activate.php?username=$username");
		}
	}
	else {
		header("location: expired.php");
	
	}
	
?>