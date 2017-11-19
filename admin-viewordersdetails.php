    <!DOCTYPE html>
    <?php
        include("db.php");
        include("onlyAdmin.php");
        $addressid = $_GET['addressid'];
        $orderid = $_GET['orderid'];
        $query = "SELECT quantity, subtotal, name, image, price FROM orders_line, products WHERE orders_line.fk_order_id ='$orderid' AND products.code IN (SELECT fk_product_code FROM orders_line WHERE fk_order_id = '$orderid') AND products.code = fk_product_code ";
        $addressquery = "SELECT * FROM address WHERE id = '$addressid'";
        $result = pg_query($conn, $query);
        $addressresult = pg_query($conn,$addressquery);
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
                 margin: 50px auto 0;

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
                 min-height: 60vh;
                 width: 100%;
                 height: 100%;
             }

        </style>
    </head>

    <body>
        <div class="screen">
            <div class="header">
                <header class="fixed-header">
                    <div class="logo-container" style="width: 25%;">
                        <a href="index.php"><img src="img/logo.png" id="logo" /></a>
                    </div>
                    <div class="menu-row" style="width: 50%;">
                        <div class="menus" style="width: 33.3333%;"  onclick="location.href='admin.php'">
                                View Users
                        </div>
                        <div class="menus" style="width: 33.3333%;" onclick="location.href='admin-vieworders.php'">
                            View Orders
                        </div>
                        <div class="menus" style="width: 33.3333%;" onclick="location.href='admin-viewfeedbacks.php'">
                            View Feedbacks
                        </div>  
                    </div>
                    <div class="login-row" style="width: 25%;">
                        <?php if(isset($_SESSION['username'])) {
                                if($_SESSION['username']=='admin'){ ?>
                        <div class="loggedin">
                            <a>Welcome <?= $_SESSION['username'] ?> &#x25BC;</a>
                            <ul class="dropdown">
                                <li><a id="signout"  href="signout.php">Sign Out</a></li>
                            </ul>
                        </div>               
                        <?php  } }else { 
                            header("Location: index.php");
                        }?>
                                
                    </div>  <!--login-row -->
                </header>
            </div>
            <div class="order-container">
                <div class="txt-heading">Order ID:&nbsp <?php echo $orderid ?> </div>
                <?php if($result) {
                ?>
                <table cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr style="font-size: 22px; background-color: black;">
                            <th style="text-align:center;"><strong>Item</strong></th>
                            <th style="text-align:center;"><strong>Qty</strong></th>
                            <th style="text-align:center;"><strong>Price</strong></th>
                            <th style="text-align:center;"><strong>Sub-Total</strong></th>
                        </tr>	
                        <?php		
                            $item_total = 0;
                            $resultArr = pg_fetch_all($result);
                            foreach($resultArr as $row){
                                ?>
                                        <tr>
                                            <td style="text-align:left;"><img style= "margin-right: 10px; height: 80px; width: 100px; vertical-align: text-top;" src= "<?php echo $row["image"] ?>"/><strong><?php echo $row["name"]; ?></strong></td>
                                            <td stlye="text-align: right;"><?php echo $row["quantity"] ?></td>
                                            <td style="text-align: center;"><?php echo "RM".$row["price"] ?></td>
                                            <td style="text-align:center;"><?php echo "RM".$row["subtotal"]; ?></td>
                                        </tr>
                                        <?php
                                $item_total += ($row["price"]*$row["quantity"]);
                                }
                                ?>
                                <tr>
                                    <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="3" align=right><strong>Sub-Total:</strong></td>
                                    <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;"><?php echo "RM".number_format($item_total,2); ?></td>
                                </tr>
                                <tr>
                                    <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="3" align=right><strong>Delivery Charges:</strong></td>
                                    <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;">RM6.00</td>
                                </tr>
                                <tr>
                                    <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="3" align=right><strong>Total:</strong></td>
                                    <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;"><?php echo "RM".number_format($item_total+6,2); ?></td>
                                </tr>
                        
                    </tbody>
                </table>
                <table cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr style="font-size: 22px; background-color: black;">
                            <th style="text-align:center;"><strong>Address 1</strong></th>
                            <th style="text-align:center;"><strong>Address 2</strong></th>
                            <th style="text-align:center;"><strong>City</strong></th>
                            <th style="text-align:center;"><strong>State</strong></th>
                            <th style="text-align:center;"><strong>Postal</strong></th>
                        </tr>	
                        <?php		
                            $item_total = 0;
                            $addressrow = pg_fetch_all($addressresult);
                                ?>
                                        <tr>
                                            <td stlye="text-align: right;"><?php echo $addressrow["address1"] ?></td>
                                            <td style="text-align: center;"><?php echo $addressrow["address2"] ?></td>
                                            <td style="text-align:center;"><?php echo $addressrow["city"]; ?></td>
                                            <td stlye="text-align: right;"><?php echo $addressrow["state"] ?></td>
                                            <td style="text-align: center;"><?php echo $addressrow["postal"] ?></td>
                                        </tr>
                    </tbody>
                </table>
              
                <?php 
                } else { ?>
                    <div style="padding-top: 20px; padding-left: 30px; font-size: 20px; color:red">Error</div>

                <?php }
                 ?>
            </div>
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
        </div><!-- Screen -->

    </body>
    </html>
