<?php
    session_start();
    require('./backend/includes/db_connect.php');
    require_once('./includes/cart.php');
    if(isset($_POST['change']) ){
        $id = $_POST['product_id'];
        $key = array_search($id, array_column($_SESSION['cart'], 'product_id'));
        $_SESSION['cart'][$key]['quantity']= $_POST['quantity'];
    }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imgs/title-cow.png" type="img/png">
    <title>Dairy Store</title>
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!-- <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">  -->

</head>

<body>
    <div class="container">
        <?php include('./contents/nav.php');?>
        <div class="section-checkout">
            <div class="checkout-container">
                <div class="col-1">
                    <p class="heading__primary--main">Checkout</p>
                    <div class="swappy-radios  u-margin-top-small" role="radiogroup"
                        aria-labelledby="swappy-radios-label">
                        <!-- <h3 id="swappy-radios-label">Select an option</h3> -->
                        <label id="tab-1">
                            <input type="radio" name="options" class="radio-input" value="cash_on_delivery" checked/>
                            <span class="radio"></span>
                            <span>Cash on Delivery</span>
                        </label>
                        <label id="tab-2">
                            <input type="radio" name="options" class="radio-input" value="pay_with_esewa" />
                            <span class="radio"></span>
                            <span>Pay with esewa</span>
                        </label>
                        
                    </div>
                    <div class="tab-content-1">
                        <div class="notice-bar">
                            <?php
                                    if(!isset($_SESSION)){
                                        session_start();
                                    }
                                    if(!isset($_SESSION['user_id'])){
                                    ?>
                            <span class="shipping-head">
                                You need to logged in to proceed.
                                <a href="#" class="a" id="checkout-signin">Sign in</a> /
                                <a href="#" class="a" id="checkout-signup">Sign up</a>
                            </span>
                            <?php
                                    } else{
                                    ?>
                            <span class="shipping-head">Billing Detail</span>
                            <table>
                                <ul>
                                    <tr>
                                        <td>Buyer's Name</td>
                                        <td>:</td>
                                        <td>Arun Prajapati </td>
                                    </tr>
                                    <tr>
                                        <td>Contact Number</td>
                                        <td>:</td>
                                        <td>9860465326</td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td>:</td>
                                        <td>arunkp1122@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Address</td>
                                        <td>:</td>
                                        <td>Kamalbinayak</td>
                                    </tr>
                                </ul>
                            </table>
                            <div>
                                <img src="./imgs/cash-on-delivery.png" class="" height="70" alt="">
                            </div>
                            <?php
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="tab-content-2">
                        <div class="notice-bar">
                            <?php
                                    if(!isset($_SESSION)){
                                        session_start();
                                    }
                                    if(!isset($_SESSION['user_id'])){
                                    ?>
                            <span class="shipping-head">
                                You need to logged in to proceed.
                                <a href="#" class="a" id="checkout-signin">Sign in</a> /
                                <a class="a">Sign up</a>
                            </span>

                            <?php
                                    } else{
                                    ?>
                            <span class="shipping-head">In order to complete your transaction, we will transfer you over
                                to esewa's secure servers.
                                <div>
                                    <img src="./imgs/esewa-logo.png" height="70" alt="">
                                </div>
                            </span>
                            <?php
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="notice-bar notice-bar-danger">
                        <span class="notice--text bold">Note:  </span>
                        <span class="notice--text">Delivery is only available in Bhaktapur,Kathmandu and Lalitpur.</span>
                        <span class="notice--close-btn" onclick="" id="close">
                            <i class="lnr lnr-cross"> 
                                <!-- <svg class="icon-cross">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                                 </svg> -->
                            </i>
                        </span>
                    </div> 
                </div>
                <!-- end of col-1 -->
                <div class="col-2">
                    <div class="col-2-wrapper">
                    <p class="heading-summary">Summary</p>
                    <table>
                        <ul class="col-2-ul">

                            <?php
                                  
                                  if(count($_SESSION['cart']) != 0){
                                    $sum = 0;
                                    $i = 0;
                                    $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`image_source` FROM product";
                                    $result = mysqli_query($conn,$sql);
                                    $product_id = array_column($_SESSION['cart'],'quantity','product_id');
                                    // echo "<pre>";
                                    // print_r($_SESSION);
                                    // print_r($product_id);

                                    // echo "</pre>";

                                      while($row = mysqli_fetch_assoc($result)){
                                          foreach($product_id as $key =>$value){
                                            if($row['product_id'] == $key){
                                                  $sum = $sum + $row['unit_price'] * $value;
                              ?>
                            <li class="item-wrap">
                                <div>
                                    <img class="item-img" src="./backend/uploads/<?=$row['image_source']?>"
                                        alt="item1" />
                                </div>
                                <div class="item-details">
                                    <div>
                                        <span class="item-product-name"><?=$row['product_name'];?></span>
                                        <span class="item-product-price">Rs.<?=$row['unit_price'];?></span>
                                        <span class="item-product-category"><?=$row['category']?></span>
                                    </div>
                                  
                                    <div>
                                            
                                            <form action="#" method="POST">
                                            <div class="input-group">
                                                <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                <input type="number" step="1" max="" value="<?=$value?>" name="quantity" class="quantity-field quantity-field-summary" maxlength="10">
                                                <input type="submit" value="Change" name="change">
                                              
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                    <form action="" method="POST">
                                            <div class="input-group">
                                            <input type="hidden" name="product_id" value="<?=$row['product_id']?>"> 
                                                <button type="submit" class="" name="remove">
                                                    <svg class="item-icon-remove">
                                                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <form action="./includes/cart.php?action=removeFromCheckout" method="POST"> -->

                                </div>
                            </li>

                            <?php
                                              }
                                          }
                                      }                            
                                  } else{
                              ?>

                            <li class="item-wrap">
                                <div>

                                </div>
                                <div class="item-details">
                                    <span class="item-product-empty">Your Cart is Empty</span>

                                </div>
                            </li>

                            <?php
                                  }
                              ?>
                        </ul>
                    </table>
                    <?php

                        if(count($_SESSION['cart']) != 0){
                            $delivery_price = 0;
                    ?>
                    <div class="section-checkout-details">
                        <table cellpadding="2px" class="checkout-details-table">
                            <ul >
                                <tr>
                                    <th class="details-th">Sub-total (<?=count($_SESSION['cart'])?> items)</th>
                                    <th class="details-th">:</th>
                                    <?php
                                        if (!is_float($sum)){
                                           $a = ".00";

                                    ?>        
                                        <td  class="details-td" >Rs. 
                                            <span id="sub-total"><?=$sum.$a?></span>
                                        </td>

                                    <?php        
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                        $status_check_sql  = "SELECT offer_name,offer_status from offer WHERE offer_name = 'Bisket Offer'";
                                        $result = mysqli_query($conn, $status_check_sql);
                                        $row = mysqli_fetch_assoc($result);

                                    ?>
                                    <th class="details-th">Shipping Fee</th>
                                    <th class="details-th">:</th>
                                    <td  class="details-td">
                                        <?php
                                            $offer_active  = 1;  
                                            if($sum >= 2000 && $row['offer_status'] == 1){
                                                $delivery_price = 0;
                                        ?>
                                                Rs.
                                                <span><?=$delivery_price?>.00</span>&nbsp; 
                                                <strike class="strike">&nbsp;80.00 &nbsp;</strike>
                                                <!-- <span class="offer_name"><?=$row['offer_name']?></span> -->
                                            

                                                
                                        <?php
                                            } else{
                                                $delivery_price = 80;
                                        ?>
                                                Rs. 
                                                <span><?=$delivery_price?>.00</span>
                                        <?php
                                            }
                                        ?>
                                        
                                    </td>
                                </tr>
                            </ul>
                        </table>
                    </div>
                    <?php 
                        }
                    ?>
               
                    <div class="section-proceed">
                        <!-- <script>
                            var checkedValue = document.querySelector('input[name="options"]:checked').value;
                        </script> -->

                        <form action="./includes/order.php" method="POST">
                            <input type="hidden"  id="checked_value"  name="checked_value">
                            <input type="hidden" name="order_price" value="<?=$sum?>">
                            <input type="hidden" name="delivery_price" value="<?=$delivery_price?>">
                            <input type="hidden" name="total_items" value="<?=count($_SESSION['cart'])?>">
                            <input type="hidden" name="total_price" value="<?=$delivery_price + $sum?>">

                        <?php
                            if(count($_SESSION['user_id']) != 0  &&  count($_SESSION['cart']) != 0) {
                        ?>
                                <input type="submit" value="PROCEED" onclick="setvalue();" class="btn-cart" name="proceed">

                        <?php 
                            }
                        ?>
                           
                        </form>
                        <script>
                            function setvalue(){
                                var checkedValue = document.querySelector('input[name="options"]:checked').value;
                                document.getElementById('checked_value').value = checkedValue;
                            }
                        </script>
                    </div>
                    </div>
                   
                </div>

            </div>
            <!-- end of checkout container -->
        </div>
        <!-- end of section-checkout -->
        <?php include('./contents/footer.php');?>
        <?php include('./contents/modals.php');?>
    </div>
    <!-- end of container    -->
</body>
<script src="./js/quantity.js"></script>
<script>



    document.querySelector('.tab-content-1').style.display = 'block';
    document.querySelector('.tab-content-2').style.display = 'none';
    document.getElementById('tab-1').addEventListener('click',
        function () {
            document.querySelector('.tab-content-1').style.display = 'block';
            document.querySelector('.tab-content-2').style.display = 'none';

        });

    document.getElementById('tab-2').addEventListener('click',
        function () {
            document.querySelector('.tab-content-2').style.display = 'block';
            document.querySelector('.tab-content-1').style.display = 'none';

        });
        
</script>