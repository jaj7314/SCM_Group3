<!DOCTYPE html>
<?php
session_start();
include("noAdmin.php");
require_once("dbcontroller.php");
$db_handle = new DBController();


?>
<html>
<head>
    <title>Crave Food Restaurant</title>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/main.js"></script>
	<style>
	.menupanel
	{	
		background: rgba(0,0,0,0.3);
		width: 480px;
		height: 227px;
		text-align: left;
		padding-left: 15px;
		margin-right:40px;
		margin-bottom: 20px;
        display:inline-block;
	}
	.menupanel1
	{
		 display: inline-block; 
		 width: 480px;
		 height: 0;
		 text-align: left;
		 padding-left: 15px;
		 margin-right:40px; 
		 margin-bottom: 20px;
	}
	.menuimage
	{
		width: 120px;
		height:auto;
		padding-top: 20px;
	}
	.Menuname
	{
		text-transform:capitalize;
		line-height:20px;
		display: inline-block;
		padding-right: 0px;
		vertical-align: top; 
		font-family: Sans-serif; 
		font-size: 20px;
		padding-top: 10px;
		font-weight: bold;
		color: rgb(183,183,0);
	}
	.MenuDescription
	{
		font-family: Century Gothic;
		color: white;
		line-height: 18px;
		padding-top:10px;
		height:auto;
		padding-right: 0px;
		
	}
	.div2
	{
		display:inline-block; 
		width:320px; 
		height: 227px; 
		vertical-align:top; 
		padding-left:30px;
		position:relative;
	}
	.AddtoCart
	{
		width:100%; 
		height:35px; 
		background-color:#ed1c24; 
		border:0px; 
		border-radius: 6px; 
		font-size: 16px; 
		font-family: Arial Black; 
		color: white; 
		letter-spacing:1px;
		transition-duration: 0.4s;
		cursor: pointer;
		margin-top: 20px;
		
	}
	.AddtoCart:hover
	{
		background: rgb(91,0,0);
	}		
    #product-grid {
        margin-top: 30px;
        height: 100%;
        width: 100%;
        text-align: center;
    }
	</style>
</head>

<body>
        <div class="screen">
            <div class="header">
                <header class="fixed-header">
                    <div class="logo-container">
                        <a href="index.php"><img src="img/logo.png" id="logo" /></a>
                    </div>
                    <div class="menu-row">
                        <div class="menus" id="menu">
                            <div onclick="location.href='pasta.php'">
                                MENU
                            </div>
                            <ul>
                                <li onclick="location.href='pasta.php'">Pasta</li>
                                <li onclick="location.href='sides.php'">Sides</li>
                                <li onclick="location.href='beverage.php'">Beverage</li>
                            </ul>
                        </div>
                        <div class="menus" onclick="location.href='promotion.php'">
                            PROMOTION
                        </div>
                        <div class="menus" onclick="location.href='about.php'">
                            ABOUT US
                        </div>  
                    </div>
                    <div class="login-row">
                        <?php if(isset($_SESSION['username'])){ ?>
                        <div onclick="location.href='cart.php'" class="cart" style="color: white; font-size: 20px;">
                            <div style="display: inline-block; height: 30px;">
                                <img src="img/header-cart.png" style="width: 30px; height: 30px;"/>
                            </div>
                            <div id="cart_price" style="display: inline-block; height: 20px; padding-left: 10px;">
                            <div>
                                RM <?php 
                                    $_SESSION['price'] = 0;
                                    if(isset($_SESSION['cart_item'])){
                                        foreach ($_SESSION["cart_item"] as $item){
                                            $_SESSION['price'] += $item['price']*$item['quantity'];
                                        }
                                    }
                                echo number_format($_SESSION['price'],2);
                                ?>
                            </div>
                             </div>
                        </div>
                        <div class="loggedin">
                            <a>Welcome <?= $_SESSION['username'] ?> &#x25BC;</a>
                            <ul class="dropdown">
                                <li><a id="manage-account"  href="manage.php">Manage Account</a></li>
                                <li><a id="view-orders" href="vieworders.php">View Orders</a></li>
                                <li><a id="signout"  href="signout.php">Sign Out</a></li>
                            </ul>
                        </div>               
                        <?php  } else { ?>
                        <div class="main-nav" style="color: white;">
                            <a id="login" class="cd-signin" href="">Login</a>&nbsp;&nbsp;|&nbsp;
                            <a id="login" class="cd-signup" href="">Signup</a>
                        </div>                
                        <?php } ?>
                    </div>  <!--login-row -->
                </header>
            </div>
            <div class="cd-user-modal">
            <!-- this is the entire modal form, including the background -->
                <div class="cd-user-modal-container">
                    <!-- this is the container wrapper -->
                    <ul class="cd-switcher">
                        <li><a href="#0">Sign in</a></li>
                        <li><a href="#0">New account</a></li>
                    </ul>
                    <div id="cd-login">
                        <!-- log in form -->
                        <div class="cd-error-message" id="loginerror"></div>
                        <form class="cd-form" method="post" id="loginform">
                            <p class="fieldset">
                                <label class="image-replace cd-username" for="signin-username">Username</label>
                                <input class="full-width has-padding has-border" id="signin-username" name="username" type="text" placeholder="Username" required />
                            </p>
                            <p class="fieldset">
                                <label class="image-replace cd-password" for="signin-password">Password</label>
                                <input class="full-width has-padding has-border" id="signin-password" name="password" type="password" placeholder="Password" required />
                            </p>
                            <p class="fieldset">
                                <input type="checkbox" id="remember-me" checked>
                                <label for="remember-me">Remember me</label>
                            </p>
                            <p class="fieldset">
                                <input class="full-width" type="submit" value="Login">
                            </p>
                        </form>

                        <!-- <a href="#0" class="cd-close-form">Close</a> -->
                    </div> <!-- cd-login -->
                    <div id="cd-signup">
                        <!-- sign up form -->
                        <div class="cd-error-message" id="registererror"></div>
                        <form class="cd-form" method="post" id="registerform">
                            <p class="fieldset">
                                <label class="image-replace cd-username" for="signup-username">Username</label>
                                <input class="full-width has-padding has-border" id="signup-username" name="R_username" type="text" placeholder="Username" required />
                            </p>
                            <p class="fieldset">
                                <label class="image-replace cd-email" for="signup-email">E-mail</label>
                                <input class="full-width has-padding has-border" id="signup-email" name="R_email" type="email" placeholder="E-mail" required />
                            </p>
                            <p class="fieldset">
                                <label class="image-replace cd-password" for="signup-password">Password</label>
                                <input class="full-width has-padding has-border" id="signup-password" name="R_password" type="password" placeholder="Password" required />
                            </p>
                            <p class="fieldset">
                                <input class="full-width has-padding has-border" id="signup-confirmpassword" name="R_confirmpassword" type="password" placeholder="Confirm Password" required />
                                <label class="image-replace cd-password" for="signup-password">Confirm Password</label>
                            </p>
                            <p class="fieldset">
                                <input class="full-width has-padding" type="submit" value="Create account">
                            </p>
                        </form>
                        <!-- <a href="#0" class="cd-close-form">Close</a> -->
                    </div> <!-- cd-signup -->
                    <a href="#0" class="cd-close-form">Close</a>
                </div> <!-- cd-user-modal-container -->
            </div> <!-- cd-user-modal -->
		<div>
		    <img src="img/PastaHeader.png" style="width:100%">
		</div>
        <div id="product-grid">
            <?php
            $product_array = $db_handle->runQuery("SELECT * FROM products WHERE category = 'pasta' ORDER BY id ASC ");
            if (!empty($product_array)) { 
                foreach($product_array as $key=>$value){
            ?>
                    <form class="menupanel" method="post" action="addtocart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                        <img class="menuimage" src="<?php echo $product_array[$key]["image"]; ?>">
                        <div class="div2">
                            <p class="Menuname"><?php echo $product_array[$key]["name"];?> </br> <span style="color:orange; font-style:italic"><?php echo "RM".$product_array[$key]["price"]; ?></span></p>
                            <p class="MenuDescription"><?php echo nl2br($product_array[$key]["description"]);?></p>
                            <button class="button AddtoCart">Add to Cart</button>
					    </div>
                        <div style="display: none;">
							<input type="text" name="quantity" value="1" size="2" />
							<input type="text" name="page" value="pasta.php" />
                            <input type="text" name="code" id="code" value="<?php echo $product_array[$key]["code"]; ?>"/>
						</div>
                    </form>
            <?php
                    }
            }
            ?>
        </div>
        <div class="footer">
            All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
        </div>
    </div><!-- Screen -->

</body>
</html>