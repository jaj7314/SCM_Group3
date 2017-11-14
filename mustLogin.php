<?php 
    @session_start();
    if(isset($_SESSION['username'])) {
    
    }
    else {
        header("Location: alert.php");
    }
?>