    <!DOCTYPE html>
    <?php
        session_start();
        include("noAdmin.php");
    ?>

    <html>
    <head>
        <title>Crave Food Restaurant</title>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="css/main.css" />
        <script src="js/main.js"></script>
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
                                TESt
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
            <div class="content">
                <div class="slider">
                    <ul class="controllers">
                        <li><img src="img/backward-arrow.svg" class="prev"></i>
                        <li><img src="img/backward-arrow.svg" class="next"></i>
                    </ul>
                    <div class="slides">
                        <div class="slide "><img src="img/slide1.jpg" alt=""></div>
                        <div class="slide "><img src="img/slide2.jpg" alt=""></div>
                        <div class="slide "><img src="img/slide3.jpg" alt=""></div>
                        <div class="slide "><img src="img/slide4.jpg" alt=""></div>           
                    </div>
                </div>
                <div class="bullets"></div>
                <div class="promotion-container">
                    <div class="promotion-image"><img src="img/sample1.jpg"></div>
                    <div class="promotion-image"><img src="img/sample2.jpg"></div>
                </div>

                <div class="cuContainer">
                    <div style="width: 500px; float: left; padding-left: 35px; padding-top: 35px;">
                        <div id="cuContent" style="font-family: 'Arial'">
                            <h1 class="cuTitle">Crave Food Restaurant</h1>
                            <p style="font-size: 24px; color: white; line-height: 28px; float: left; margin-left: 30px;">UMP Holdings Sdn.Bhd<br />Lebuhraya Tun Razak <br />26300, Gambang <br />Kuantan, Pahang<br /><br />Tel: +603 9282 2179<br />Fax: +603 9282 2178</p>
                        </div>
                    </div>
                    <form method="post" action="feedback.php" id="cuForm">
                        <h1 class="cuTitle">Contact Us</h1>
                            <input name="cuName" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="cuName" required />

                            <input name="cuEmail" type="text" class="validate[required,custom[email]] feedback-input" id="cuEmail" placeholder="Email" required />

                            <textarea name="cuText" class="validate[required,length[6,300]] feedback-input cuTextarea" id="cuComment" placeholder="Comment" required></textarea>

                        <div class="cuSubmit">
                            <input type="submit" value="SEND" id="cuButton"/>
                            <div class="cuEase"></div>
                        </div>
                    </form>
                </div> <!-- cuContainer -->
            </div> <!-- content -->
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
        </div><!-- Screen -->

    </body>
    </html>
