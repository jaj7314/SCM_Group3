<?php
    include("db.php");
    $datetime = date('Y-m-d H:i:s');
    $addressid = $_GET['addressid'];
    $price = $_SESSION['price']+6;
    $username = $_SESSION['username'];
    $quantity = 0;
    foreach ($_SESSION["cart_item"] as $item){
        $quantity = $quantity + $item['quantity'];
    }
    $query = "INSERT INTO orders (datetime, fk_user_id, price, quantity,fk_address_id)" ." SELECT '$datetime',id,'$price','$quantity','$addressid' FROM users WHERE username='$username'";    
    $conn->query($query);
    $order_id = mysqli_insert_id($conn);
    foreach ($_SESSION["cart_item"] as $item){
        $quantity = $item['quantity'];
        $subtotal = $item['quantity'] * $item['price'];
        $product_code = $item['code'];
        $query = "INSERT INTO orders_line (fk_order_id, fk_product_code, quantity, subtotal)" ." VALUES('$order_id','$product_code','$quantity','$subtotal')";
        $conn->query("$query");
    }
    header("Location: api.php");

?>