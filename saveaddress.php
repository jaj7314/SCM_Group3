<?php
	include_once('db.php');

    $username = $_SESSION['username'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $datetime = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO address (datetime, address1, address2, city, state, postal, username)" ." VALUES ('$datetime','$address1','$address2','$city','$state','$postal','$username') RETURNING id";
    
	$result = pg_query($conn,$query);
	$row = pg_fetch_row($result);
	$addressid = $row['0'];
	header("Location: payment.php?addressid=$addressid");
            
			
?>