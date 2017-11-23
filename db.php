<?php
	include('config.php');
	session_start();
	$conn = pg_connect("host='$HOST' port='$PORT' dbname='$DATABASE_NAME' user='$DATABASE_USER' password='$DATABASE_PASSWORD'");
		
?>
