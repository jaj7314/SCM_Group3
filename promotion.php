<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
<head>
    <title>Promotion</title>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/login.js"></script>
	<script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css" />
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<style>
	h1 
	{
		overflow: hidden;
		text-align: center;
		color: white;
		font-size: 40px;
		padding-top: 15px;
		font-weight: bold;
	}
	h1:before,
	h1:after 
	{
		background-color: red;
		content: "";
		display: inline-block;
		height: 3px;
		position: relative;
		vertical-align: middle;
		width: 50%;
	}
	h1:before 
	{
		right: 0.5em;
		margin-left: -50%;
	}
	h1:after 
	{
		left: 0.5em;
		margin-right: -50%;
	}
	
	p.maintitle
	{
		color: white;
		padding-top: 20px;
		padding-bottom: 20px;
		padding-left: 50px;
		font-size: 25px;
		font-weight: bold;
		
	}
	div.titlepanel
	{
		background: rgba(0,0,0,0.5);
		margin-top: 30px;
	}
	
	.promotionimage
	{
		width:500px;
		height:300px;
	}
	.imagediv
	{
		display:inline-block;
	}
	.descriptiondiv
	{
		display:inline-block;
		width:675px;
		height:300px;
		vertical-align:top;
		padding-left: 30px;
		padding-right: 30px;
		padding-top: 20px;
		text-align: justify;
		background: rgba(0,0,0,0.3);
	}
	button.findoutmore
	{
		border-radius: 12px;
		height: 50px;
		width: 200px;
		font-size: 20px;
		padding: 10px;
		margin-top:30px;
		cursor: pointer;
		color: white;
		background-color: #29ad61;
	}
	</style>
</head>

<body >
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
                            <div style="display: inline-block; height: 20px; padding-left: 10px;">
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
		<!-- Continue here -->
		
		<div>
			<h1>PROMOTIONS</h1>
		</div>
		<div>
			<div class="titlepanel">
				<p class="maintitle">Monthly Promotion</p>
			</div>
			<div style="font-size: 0px;">
				<div class="imagediv">
					<img class="promotionimage" src="img/promotion1.jpg"></img>
				</div>
				<div class="descriptiondiv" >
					<span style="font-weight:bold; font-size: 40px; color: rgb(183,183,0);">The Hottest Deal in Town with the Coolest Bonus is Here!</span><br/>
					<span style="font-size:25px; color: white;">Enjoy 2 of your favorite pizzas fresh from the oven starting from RM30 & add on a bottle of your favorite Soft Drink at 50% off today!</span><br />
					<button class="button findoutmore">Find Out More</button>
				</div>
			</div>
			<div style="font-size: 0px;">
				<div class="imagediv">
					<img class="promotionimage" src="img/promotion2.jpg"></img>
				</div>
				<div class="descriptiondiv" >
					<span style="font-weight:bold; font-size: 40px; color: rgb(183,183,0);">Nut your average Chocolate Lava Cake</span><br/>
					<span style="font-size:25px; color: white;">Sink your teeth into the molten peanut butter and chocolate mix of our NEW Peanut Butter Chocolate Lava Cake!</span><br />
					<button class="button findoutmore">Find Out More</button>
				</div>
			</div>
			<div style="font-size: 0px;">
				<div class="imagediv">
					<img class="promotionimage" src="img/promotion3.jpg"></img>
				</div>
				<div class="descriptiondiv" >
					<span style="font-weight:bold; font-size: 40px; color: rgb(183,183,0);">Quadruple the Choices with Quadruple the Taste</span><br/>
					<span style="font-size:25px; color: white;">Mini Cinnadots, Cheesy Mozzarella Stix, Crazy Chicken Crunchies & Roasted Chicken Drummets all in one box to make the new Fabulous Four!</span><br />
					<button class="button findoutmore">Find Out More</button>
				</div>
			</div>
			<div style="font-size: 0px;">
				<div class="imagediv">
					<img class="promotionimage" src="img/promotion4.jpg"></img>
				</div>
				<div class="descriptiondiv" >
					<span style="font-weight:bold; font-size: 40px; color: rgb(183,183,0);">Two good two be true</span><br/>
					<span style="font-size:25px; color: white;">You read that right! Get 2 Pizzas from only RM30 and enjoy big savings.</span><br />
					<button class="button findoutmore">Find Out More</button>
				</div>
			</div>
		</div>
		
		<!-- footer -->
		<div class="footer">
			All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
		</div>

    </div>
</body>
</html>
