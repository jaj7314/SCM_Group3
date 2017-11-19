<?php
    include("db.php");
    $name =  $_POST['cuName'];
    $email = $_POST['cuEmail'];
    $comment = $_POST['cuText'];
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $datetime = date('Y-m-d H:i:s');
    $datetime = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO feedback (name, datetime, email, comment)" ." VALUES ('$name','$datetime','$email','$comment')";
    
			if(pg_query($conn,$query))
			{
                header('Location: index.php');
            }
?>
