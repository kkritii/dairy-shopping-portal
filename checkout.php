<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
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
                <div class="row-1">
                    <p class="heading__primary--main">Checkout</p>
                </div>
                <div class="row-2">
                    <div class="col-1">
                        Hello world
                    </div>
                    <div class="col-2">
                        <p class="heading-summary">Summary</p>
                        <table>
                            <ul>
                            <?php
                                  
                                  if(count($_SESSION['cart']) != 0){
                                      $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`image_source` FROM product";
                                      $result = mysqli_query($conn,$sql);
                                      $product_id = array_column($_SESSION['cart'],'product_id');
                                      while($row = mysqli_fetch_assoc($result)){
                                          foreach($product_id as $id){
                                              if($row['product_id'] == $id){
                                                  
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
                                                            
                                                                <form action="./includes/cart.php?action=removeFromCheckout" method="POST">
                                                                    <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                                    <button type="submit" class="" name="remove">
                                                                        <svg class="item-icon-remove">
                                                                            <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                                                                        </svg>
                                                                    </button>
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
                    </div>
                </div>
            </div>
           
        </div>

        <?php include('./contents/footer.php');?>
        <?php include('./contents/modals.php');?>
    </div>
</body>

</html>