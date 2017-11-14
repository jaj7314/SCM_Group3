<?php 
    include("db.php");

    $username = $_SESSION['username'];
    $password = $conn->real_escape_string($_POST['newpassword']);
    $email = $conn->real_escape_string($_POST['email']);


    $query = "UPDATE users SET email='$email', password='$password' WHERE username = '$username';";
	$conn->query($query);
    header("Location: manage.php");

?>