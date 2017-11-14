    <!DOCTYPE html>
    <?php
        session_start();
        include("mustLogin.php");
        include("noAdmin.php");
    ?>

    <html>
    <head>
        <title>Crave Food Restaurant</title>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="css/main.css" />
        <script src="js/main.js"></script>
        <style>
        .shipping__container {
            max-width: 60rem;
            margin: 0 auto;
        }

        .form__name {
            color: white;
            padding: 10px;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            margin-top: 60px;
        }

        .form__container {
            width: 100%;
            min-height: 300px;
            background-color: transparent;
            border: 1px solid #DADDE8;
            border-radius: 5px;
            padding: 30px;
            margin-bottom: 100px;
        }

        .personal--form {
            color: white;
            font-size: 0.7rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 55px;
            margin-top: 10px;
        }
        .personal--form .last {
            margin-left: 40px;
        }
        .personal--form .first, .personal--form .last, .personal--form .email {
            display: inline-block;
        }
        .personal--form .first label, .personal--form .last label, .personal--form .email label {
            margin-bottom: 10px;
         }
        .personal--form .first label, .personal--form .first input, .personal--form .last label, .personal--form .last input, .personal--form .email label, .personal--form .email input {
            display: block;
            min-width: 250px;
        }
        .personal--form .email {
            margin-top: 20px;
        }
        .personal--form .email input {
            width: 540px;
        }

        .shipping--form {
            color: white;
            font-size: 0.7rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 55px;
            margin-top: 10px;
        }
        .shipping--form .row.two, .shipping--form .row.three {
            margin-top: 20px;
        }
        .shipping--form .address-two, .shipping--form .state, .shipping--form .country {
            margin-left: 40px;
        }
        .shipping--form .address, .shipping--form .address-two, .shipping--form .city, .shipping--form .state, .shipping--form .zip, .shipping--form .country {
            display: inline-block;
        }
        .shipping--form .address label, .shipping--form .address-two label, .shipping--form .city label, .shipping--form .state label, .shipping--form .zip label, .shipping--form .country label {
            margin-bottom: 10px;
        }
        .shipping--form .address label, .shipping--form .address input, .shipping--form .address-two label, .shipping--form .address-two input, .shipping--form .city label, .shipping--form .city input, .shipping--form .state label, .shipping--form .state input, .shipping--form .zip label, .shipping--form .zip input, .shipping--form .country label, .shipping--form .country input {
            display: block;
            min-width: 250px;
        }
        input {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            background: transparent;
            border: 1px solid #A4A9C5;
            border-radius: 3px;
            outline: none;
            padding: 10px;
            -webkit-transition: border-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            transition: border-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            color: white;
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
            -webkit-text-fill-color: #18C2C0;
        }
        input:focus {
            border-color: #18C2C0;
        }
        input::-webkit-input-placeholder {
            font-weight: 500;
            color: white;
        }
        input::-moz-placeholder {
            font-weight: 500;
            color: white;
        }
        input:-ms-input-placeholder {
            font-weight: 500;
            color: white;
        }
        input::placeholder {
            font-weight: 500;
            color: white;
        }

        .form__confirmation {
            padding: 10px 55px;
        }

        input[type=submit] {
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
            background-color: lightgrey;
            border: 1px solid #DADDE8;
            color: black;
            padding: 18px;
            border-radius: 5px;
            outline: none;
            -webkit-transition: background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            transition: background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            left: 80%;
        }
        input[type=submit]:hover {
            background-color: grey;
        }

        .box {
            cursor: default;
            -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                    user-select: none;
            display: inline-block;
            font-size: 1.5rem;
            font-weight: 400;
            height: 40px;
            width: 40px;
            line-height: 35px;
            border-radius: 50px;
            border: 2px solid white;
            text-align: center;
            color: white;
        }

        section {
            margin-top: 50px;
        }
        section:nth-child(1) {
            margin-top: 0px;
        }

        .sections span {
            color: white;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 1px;
            margin-left: 15px;
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
            <div class="shipping__container">
                <div class="form__name">Delivery Form</div>
                <form class="form__container"  action="saveaddress.php" method="post">
                    <section class="form__shipping">
                        <div class="sections">
                            <div class="box">1</div><span>Delivery Address</span>
                        </div>
                        <div class="shipping--form">
                            <div class="form--shipping">
                                <div class="row one">
                                    <div class="address">
                                        <label for="address-one">Address Line 1</label>
                                        <input placeholder="" id="address-one" name="address1" type="text" required/>
                                    </div>
                                    <div class="address-two">
                                        <label for="address-two">Address Line 2</label>
                                        <input id="address-two" name="address2" type="text" />
                                    </div>
                                </div>
                                <div class="row two">
                                    <div class="city">
                                        <label for="city">City</label>
                                        <input placeholder="" id="city" name="city" type="text" required/>
                                    </div>
                                    <div class="state">
                                        <label for="state">State / Province / Region</label>
                                        <input placeholder="" id="state" name="state" type="text" required/>
                                    </div>
                                </div>
                                <div class="row three">
                                    <div class="zip">
                                        <label for="zip">Zip / Postal Code</label>
                                        <input placeholder="" id="zip" name="postal" type="text" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="form__confirmation">
                        <input type="submit" value="Confirm & Pay"></input>
                    </div>
                </form>
            </div>
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
        </div><!-- Screen -->

    </body>
    </html>