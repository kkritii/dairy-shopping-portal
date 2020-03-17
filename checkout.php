<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
    include('./includes/esewa-setting.php');
    // print_r($_SESSION);
    // exit;
    //for userlogin
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
                        <div class="swappy-radios  u-margin-top-small" role="radiogroup" aria-labelledby="swappy-radios-label">
                            <!-- <h3 id="swappy-radios-label">Select an option</h3> -->
                          
                            <label>
                                <input type="radio" name="options" class="radio-input" checked />
                                <span class="radio"></span>
                                <span>Cash on Delivery</span>
                            </label>
                            <label>
                                <input type="radio" name="options" class="radio-input"/>
                                <span class="radio"></span>
                                <span>Pay with esewa</span>
                            </label>
                        </div>  
                </div>
                <!-- end of col-1 -->
                <div class="col-2">
                <p class="heading-summary">Summary</p>
                        <table>
                            <ul>
                            <?php
                                  
                                  if(count($_SESSION['cart']) != 0){
                                      $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`image_source` FROM product";
                                      $result = mysqli_query($conn,$sql);
                                      $product_id = array_column($_SESSION['cart'],'quantity','product_id');
                                    //   echo "<pre>";
                                    //   print_r($product_id);
                                    //   exit;
                                      $quantity = array_column($_SESSION['cart'],'quantity');
                                      while($row = mysqli_fetch_assoc($result)){
                                          foreach($product_id as $key =>$value){

                                    //   echo "<pre>";

                                            //   echo $key ." and".$value;
                                            //   if($row['product_id'] == $product_id[$key]){
                                            if($row['product_id'] == $key){
                                                  
                              ?>
                                                <li class="item-wrap">
                                                    <div>
                                                        <img class="item-img" src="./backend/uploads/<?=$row['image_source']?>"
                                                          alt="item1" />
                                                    </div>    
                                                    <div class="item-details">
                                                        <span class="item-product-name"><?=$row['product_name'];?></span>
                                                            <span class="item-product-price">Rs.<?=$row['unit_price'];?></span>
                                                            <span class="item-product-category"><?=$row['category']?></span>
                                                            
                                                                <!-- <form action="./includes/cart.php?action=removeFromCheckout" method="POST"> -->
                                                                <form action="" method="POST">
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                                        <input type="button" value="-" class="button-minus" data-field="quantity">
                                                                        <input type="number" step="1" max="" value="<?=$value?>" name="quantity" class="quantity-field">
                                                                        <input type="button" value="+" class="button-plus" data-field="quantity">
                                                                        <button type="submit" class="" name="remove">
                                                                            <svg class="item-icon-remove">
                                                                                <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                    
                                                                </form>
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

                        <div class="section-proceed">
                            <form action="<?=$epayURL?>" method="POST">
                                <input value="100" name="tAmt" type="hidden">
                                <input value="90" name="amt" type="hidden">
                                <input value="5" name="txAmt" type="hidden">
                                <input value="2" name="psc" type="hidden">
                                <input value="3" name="pdc" type="hidden">
                                <input value="epay_payment" name="scd" type="hidden">
                                <input value="<?=$pid?>" name="pid" type="hidden">
                                <input value="<?=$success_url?>" type="hidden" name="su">
                                <input value="<?=$failure_url?>" type="hidden" name="fu">
                                <input value="Submit" class="btn-cart" type="submit">
                            </form>
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