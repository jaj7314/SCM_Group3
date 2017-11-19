    <!DOCTYPE html>
    <?php
        include("db.php");
        include("onlyAdmin.php");
        $userid = $_GET['userid'];
        $query = "SELECT * FROM orders WHERE fk_user_id='$userid' ";
<<<<<<< HEAD
        $result = pg_query($conn, $query);
=======
        $result = mysqli_query($conn, $query);
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
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
                <div class="txt-heading">User ID:&nbsp <?php echo $userid?> </div>
<<<<<<< HEAD
                <?php if (pg_num_rows($result) != 0) {
=======
                <?php if (mysqli_num_rows($result) != 0) {
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
                ?>
                <table cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr style="font-size: 22px; background-color: black;">
                            <th style="text-align:center;"><strong>Order ID</strong></th>
                            <th style="text-align:center;"><strong>Date & Time</strong></th>
                            <th style="text-align:center;"><strong>Quantity</strong></th>
                            <th style="text-align:center;"><strong>Total Price</strong></th>
                            <th style="text-align:center;"><strong>Address ID</strong></th>
                            <th style="text-align:center;"><strong>Action</strong></th>
                        </tr>	
                        <?php		
                            $item_total = 0;
<<<<<<< HEAD
							$resultArr = pg_fetch_all($result);
                            foreach($resultArr as $row){
=======
                            while($row = mysqli_fetch_array($result)){
>>>>>>> 9c1987af4675939961b7cb22752b78094f2e044a
                                $item_total = $item_total + $row['price'];
                                ?>
                                        <tr>
                                            <td style="text-align: center;"><strong><?php echo $row["id"]; ?></strong></td>
                                            <td stlye="text-align: right;"><?php echo $row["datetime"] ?></td>
                                            <td style="text-align: right;"><?php echo $row["quantity"] ?></td>
                                            <td style="text-align:left;"><?php echo "RM".$row["price"]; ?></td>
                                            <td style="text-align:center;"><?php echo $row["fk_address_id"]; ?></td>
                                            <td style="text-align:center;">
                                                <a href="admin-viewordersdetails.php?orderid=<?php echo $row["id"]."&addressid=".$row['fk_address_id']; ?>" style=" color: lightblue;">View Details</a>
                                            </td>
                                        </tr>
                                        <?php
                                }
                                ?>
                                <tr>
                                    <td style="background-color: black; font-size: 20px; border-right: 0;" colspan="5" align=right><strong>Total:</strong></td>
                                    <td style="background-color: black; font-size: 20px; border-left: 0; text-align: right;"><?php echo "RM".number_format($item_total,2); ?></td>
                                </tr>
                    </tbody>
                </table>
              
                <?php 
                } else { ?>
                    <div style="padding-top: 20px; padding-left: 30px; font-size: 20px; color:lightgreen">Unfortunately, this user doesn't make any order yet.</div>

                <?php }
                 ?>
            </div>
            <div class="footer">
                All material herein © 2017 Crave Food Restaurant All Rights Reserved. 
            </div>
        </div><!-- Screen -->

    </body>
    </html>