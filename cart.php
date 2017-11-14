    <!DOCTYPE html>
    <?php
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
            #btnEmpty {
                float: right;
                width:150px; 
                height:35px; 
                background-color:#ed1c24; 
                border:0px; 
                border-radius: 6px; 
                line-height: 31px;
                font-size: 16px; 
                font-family: Arial Black; 
                text-decoration: none;
                color: white; 
                letter-spacing:1px;
                transition-duration: 0.4s;
                cursor: pointer;
                text-align: center;
            }
            .txt-heading {    
                background: rgba(0,0,0,0.3);
                padding: 20px 20px;
                border-radius: 2px;
                color: #FFF;
                margin-bottom:10px;
                font-size: 30px;

             }
             table {
                 margin: 30px auto 0;
             }
             tr {
                display: table-row;
                white-space: normal;
                line-height: normal;
                font-weight: normal;
                font-size: medium;
                font-style: normal;
                text-align: start;
                color: lightgreen;
                border: solid;
                border-color: grey;
                border-width: 0.01em;
                vertical-align: text-top;
                 background: rgba(0,0,0,0.3);
             }
             th, td {
                border: solid;
                border-width: 0.01em;
                border-color: grey;
                padding: 10px;
                vertical-align: text-top;
                 background: rgba(0,0,0,0.3);
             }
             .order-container {
                 width: 100%;
                 height: 100%;
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
            <div class="order-container">
                <div class="txt-heading">CART <a id="btnEmpty" href="addtocart.php?action=empty">Empty Cart</a></div>
                <?php if(isset($_SESSION["cart_item"])) {
                ?>
                <table cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr style="font-size: 22px; background-color: black;">
                            <th style="text-align:center;"><strong>Item</strong></th>
                            <th style="text-align:center;"><strong>Qty</strong></th>
                            <th style="text-align:center;"><strong>Price</strong></th>
                            <th style="text-align:center;"><strong>Sub-Total</strong></th>
                            <th style="text-align:center;"><strong>Action</strong></th>
                        </tr>	
                        <?php		
                            $item_total = 0;
                            foreach ($_SESSION["cart_item"] as $item){
                                ?>
                                        <tr>
                                        <td style="text-align:left;"><img style= "margin-right: 10px; height: 80px; width: 100px; vertical-align: text-top;" src= "<?php echo $item["image"] ?>"/><strong><?php echo $item["name"]; ?></strong></td>
                                        <td ><input name="quantity" id="<?php echo $item["code"]; ?>" onBlur="saveCart(this);" onkeypress='return event.charCode >= 48 && event.charCode <= 57' style="font-size: 15px; width: 30px; padding-left: 5px; padding-right: 5px;" type="text" maxlength="2" value="<?php echo $item["quantity"]?>" /></td>
                                        <td style="text-align:right;"><?php echo "RM".$item["price"]; ?></td>
                                        <td style="text-align:right;"><?php echo "RM".number_format($item["price"]*$item["quantity"],2) ?></td>
                                        <td style="text-align:center;">
                                            <a href="addtocart.php?action=remove&code=<?php echo $item["code"]; ?>" style=" color: lightblue;">Remove Item</a>
                                        </td>
                                        </tr>
                                        <?php
                                $item_total += ($item["price"]*$item["quantity"]);
                                }
                                ?>
                        <tr>
                            <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="4" align=right><strong>Sub-Total:</strong></td>
                            <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;"><?php echo "RM".number_format($item_total,2); ?></td>
                        </tr>
                        <tr>
                            <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="4" align=right><strong>Delivery Charges:</strong></td>
                            <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;">RM6.00</td>
                        </tr>
                        <tr>
                            <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="4" align=right><strong>Total:</strong></td>
                            <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;"><?php echo "RM".number_format($item_total+6,2); ?></td>
                        </tr>
                        
                        <tr style="border-style: none; background-color: transparent;">
                            <td style="border-style: none; background-color: transparent; height: 70px; vertical-align: bottom;" colspan="5"><button style="float: right; width: 100px; height: 30px;background-color: grey; color: black;" onclick="location.href='delivery.php'">Proceed</button></td>
                        </tr>
                    </tbody>
                </table>
              
                <?php 
                } else { ?>
                    <div style="padding-top: 20px; padding-left: 30px; font-size: 20px; color:lightgreen">The cart is empty!!</div>

                <?php }
                 ?>
            </div>
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
        </div><!-- Screen -->
    <script>
        function saveCart(obj) {
            var quantity = $(obj).val();
            var code = $(obj).attr("id");
            $.ajax({
                url: "addtocart.php?action=edit",
                type: "POST",
                data: 'code='+code+'&quantity='+quantity,
                success: function(data, status){$("#total_price").html(data)},
                error: function () {alert("Problen in sending reply!")}
            });
            location.reload();
        }
    </script>
    </body>
    </html>