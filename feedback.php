<?php
    include("db.php");
    $name =  $conn->real_escape_string($_POST['cuName']);
    $email = $conn->real_escape_string($_POST['cuEmail']);
    $comment = $conn->real_escape_string($_POST['cuText']);
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $datetime = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO feedback (name, datetime, email, comment)" ." VALUE ('$name','$datetime','$email','$comment')";
    
			if($conn->query($query) === true)
			{
                header('Location: index.php');
            }
?>
