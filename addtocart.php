<?php 
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"],'image'=>$productByCode[0]["image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
		echo "success";
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
		
		if(isset($_POST['page'])){
			header("Location: ".$_POST['page']);
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
        unset($_SESSION["price"]);
		
		if(isset($_POST['page'])){
			header("Location: ".$_POST['page']);
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	break;	
    case "edit":
        $total_price = 0;
        foreach ($_SESSION['cart_item'] as $k => $v) {
            if($_POST["code"] == $k) {
                if($_POST["quantity"] == '0') {
                    unset($_SESSION["cart_item"][$k]);
                } else {
                $_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
                }
            }
            $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"];	
                
        }
        if($total_price!=0 && is_numeric($total_price)) {
            print "RM" . number_format($total_price,2);
            exit;
        }
		
		if(isset($_POST['page'])){
			header("Location: ".$_POST['page']);
		}
		else {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
    break;	
}
}