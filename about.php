<!DOCTYPE html>
<?php 
	session_start();
?>
<html>
<head>
    <title></title>
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/login.js"></script>
	<script src="js/main.js"></script>
    <link rel="stylesheet" href="css/main.css" />
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<style>
	 .div1
	 {
		background: rgba(255,255,255);
		width: 100%;
		background-color: #D2FFFF;
		border-collapse: collapse;
		
	 }
	 .form1
	 {
		background: rgba(255,255,255);
		width: 100%;
		height: 300px;
		background-color: #D2FFFF;
		border-collapse: collapse;
		
	 }
	 .div2
	 {
		 background: rgba (255,255,255);
		 width100%;
		 background-color: #D2FFFF;
	 }
	
	.p1
	{
		padding: 30px 130px;
		text-indent: 80px;
		font-size: 20px;
		text-align: justify;
		word-spacing: 1px;
		line-height: 130%;
		font-family: Calibri;
	}
	.p2
	{
		font-size: 20px;
		word-spacing: 1px;
		line-height: 130%;
		font-family: Calibri;
	}
	#p3
	{
		font-size:16px;
		font-weight: bold;
	}
	.Title{
		font-size: 46px;
		color : #132982;
		font-family: Comic Sans MS;
		font-weight: bold;
		padding-top: 40px;
		text-align: center;
	}
	#map {
		display: inline-block;
        width: 360px;
        height: 240px;
        background-color: grey;
      }
	</style>
</head>

<body >
        <div class="screen" style="padding-bottom: 80px;">
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
		
            <img src="img/interior.jpg" style=" height:420px; width:100%; display:block">
            <div class="div1">
            <p class="Title">About Us</p>
            <p class="p1">Crave Food Restaurant’s story is simple. We seek to tell our story through the food we serve. Our western food style restaurant was founded by Mr. Ben in year 2013. 
                    Crave Food Restaurant has its reputable restaurant name since year 2014 because our popular Italian Pasta had achieved the <span style="color:red">Western Delicious Food Awards Malaysia 2014.</span> 
                    Our vision in these few years is to let our well-known western foods can be approached to our beloved customers as far as we can, we started the Online Food Ordering service which could let our delivery boy to send our all kinds of delicious western foods to your doorsteps. 
                    We’ll keep our works up to serve our customers better. </p>
            </div>
            <div class="div2">
            <p class="Title" style="padding-bottom:40px">Our Location</p>
            </div>
            <form class="form1" style="padding-left:280px">
                <div class="div3" style="display:inline-block; padding-right:50px">
                    <div id="map">
                        <script>
                        function initMap() {
                        var uluru = {lat: 3.733037, lng:  103.125974};
                            var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 18,
                            center: uluru
                            });
                            var marker = new google.maps.Marker({
                            position: uluru, 
                            map: map
                            });
                        }
                        </script>
                        <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41pokO77pFgrFrqafJZzpdtGiIBfbms8&callback=initMap"></script>
                    </div>
                    </div>
                    
                    <div style="display: inline-block; vertical-align:top" >
                    <p id="p3"><b>Address:</b></p>
                    <p class="p2">
                    Crave Food Restaurant</br>
                    UMP Holding SDN BHD</br>
                    1st Floor</br>
                    Lebuhraya Tun Razak</br>
                    26300 Gambang</br>
                    Kuantan.</br>
                    </p>
                    </div>
            </form>
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
		
		</div>
</body>
</html>
