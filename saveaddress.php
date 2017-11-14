<?php
	include_once('db.php');

    $username = $conn->real_escape_string($_SESSION['username']);
    $address1 = $conn->real_escape_string($_POST['address1']);
    $address2 = $conn->real_escape_string($_POST['address2']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $postal = $conn->real_escape_string($_POST['postal']);
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $datetime = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO address (datetime, address1, address2, city, state, postal, username)" ." VALUE ('$datetime','$address1','$address2','$city','$state','$postal','$username')";
    
			if($conn->query($query) === true)
			{
                $addressid = mysqli_insert_id($conn);
                header("Location: payment.php?addressid=$addressid");
            }
?>