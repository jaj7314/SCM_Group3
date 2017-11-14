    <!DOCTYPE html>
    <?php
        include("db.php");
        include("mustLogin.php");
        include("noAdmin.php");
        $username = $_SESSION['username'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
        $row = mysqli_fetch_array($result);
        $password = $row['password'];
        $email = $row['email'];
    ?>

    <html>
    <head>
        <title>Crave Food Restaurant</title>
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel="stylesheet" href="css/main.css" />
        <script src="js/main.js"></script>
        <style>
        .content {
            min-height: 60vh;
        }   
        .userprofile {
            color: white;
            background: rgba(0,0,0,0.3);
            font-size: 30px;
            padding: 20px;
        }
        .manage {
            width: 40%;
            margin: 50px auto 0;
            border-style: solid;
            border-width: 1px;
            border-color: white;
        }
        .update-error-message {
            color: red;
            font-size: 20px;
            text-align: center;
            box-sizing: border-box;
            padding-top: 20px;
            height: 30px;
            display: none;
        }
        .update-error-message.is-visible {
            display: block;
        }
        .update-form {
            padding: 2em;
        }
        .fieldset {
        position: relative;
        margin: 1em 0;
    }
        .fieldset:first-child {
            margin-top: 0;
        }
        .fieldset:last-child {
            margin-bottom: 0;
        }
    label {
        font-size: 14px;
        font-size: 0.875rem;
    }
        label.image-replace {
            display: inline-block;
            position: absolute;
            left: 15px;
            top: 50%;
            bottom: auto;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            height: 20px;
            width: 20px;
            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            color: transparent;
            text-shadow: none;
            background-repeat: no-repeat;
            background-position: 50% 0;
        }
        label.update-username {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-username.svg");
        }
        label.update-email {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-email.svg");
        }
        label.update-password {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-password.svg");
        }
        input {
        margin: 0;
        padding: 0;
        border-radius: 0.25em;
         }
        input.full-width {
            width: 100%;
        }
        input.has-padding {
            padding: 12px 20px 12px 50px;
        }
        input.has-border {
            border: 1px solid #d2d8d8;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
        }
        input.has-border:focus {
                border-color: #343642;
                box-shadow: 0 0 5px rgba(52, 54, 66, 0.1);
                outline: none;
            }
       input.has-error {
            border: 1px solid #d76666;
        }
        input[type=submit] {
            padding: 16px 0;
            cursor: pointer;
            background: #2f889a;
            color: #FFF;
            font-weight: bold;
            border: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
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
            <div class="content">
                <div class="userprofile">
                    User Profile
                </div>
                <div class="manage">
                        <div style="color: lightblue; text-decoration: underline; font-size: 25px; padding: 30px 1.5em 10px;">
                            User Information
                        </div>
                        <!-- sign up form -->
                        <div class="update-error-message"></div>
                        <form class="update-form" method="post" id="updateform" action="update.php">
                            <p class="fieldset">
                                <label class="image-replace update-username" for="update-username">Username</label>
                                <input class="full-width has-padding has-border" id="update-username" name="R_username" type="text" value="<?php echo $_SESSION['username']?>" disabled="true" required />
                            </p>
                            <p class="fieldset">
                                <label class="image-replace update-email" for="update-email">E-mail</label>
                                <input class="full-width has-padding has-border" id="update-email" name="email" type="email" placeholder="E-mail" value="<?php echo $email ?>" required />
                            </p>
                            <p class="fieldset">
                                <label class="image-replace update-password" for="update-password">Password</label>
                                <input class="full-width has-padding has-border" id="update-password" name="oldpassword" type="password" placeholder="Old Password" required />
                            </p>
                            <p class="fieldset">
                                <input class="full-width has-padding has-border" id="update-newpassword" name="newpassword" type="password" placeholder="New Password"  />
                                <label class="image-replace update-password" for="update-password">Confirm Password</label>
                            </p>
                            <p class="fieldset">
                                <input class="full-width has-padding has-border" id="update-newconfirmpassword" name="newconfirmpassword" type="password" placeholder="Confirm New Password"  />
                                <label class="image-replace update-password" for="update-password">Confirm Password</label>
                            </p>
                            <p class="fieldset">
                                <input class="full-width has-padding" type="submit" value="Update"/>
                            </p>
                            <input type="hidden" id="oripassword" value="<?php echo $password ?>"/>
                        </form>
                        <!-- <a href="#0" class="cd-close-form">Close</a> -->
                </div>
            </div>
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
        </div><!-- Screen -->
        <script>
        $("#updateform").submit(function (e) {
            var oldpassword = document.getElementById("update-password").value;
            var newpassword = document.getElementById("update-newpassword").value;
            var newconfirmpassword = document.getElementById("update-newconfirmpassword").value;
            var password = document.getElementById("oripassword").value;
            if(oldpassword == password){
                if(newpassword !== ''){
                    if(newpassword == newconfirmpassword) {
                        alert("Successfully updated profile!!");
                    }
                    else {
                        e.preventDefault();
                        $('.update-error-message').html('The new passwords are different!!');
                        $('.update-error-message').addClass('is-visible');	
                    }
                }
                else {
                    alert("Successfully updated profile!!");
                    document.getElementById("update-newpassword").value = oldpassword;
                }
            }
            else {
                e.preventDefault();
                $('.update-error-message').html('Password wrong!!');
                $('.update-error-message').addClass('is-visible');	
            }
	})
	
        </script>
    </body>
    </html>