<?php
	session_start();
	
	unset($_SESSION['username']);
	unset($_SESSION['cart_item']);
	header('Location: index.php');



?>