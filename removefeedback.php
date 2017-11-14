<?php 
    include("db.php");
    $id = $_GET['id'];
    $query = "DELETE FROM feedback WHERE id = '$id'";
    $conn->query($query);
    header("Location: admin-viewfeedbacks.php");

?>