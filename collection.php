<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('./backend/includes/db_connect.php');
    require_once('./includes/cart.php');
?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link rel="stylesheet" href="./css/main.css" />
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
          <!-- <link rel="stylesheet" type="text/css" href="./slick/slick.css">
          <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> -->
          <title>Document</title>
     </head>
     <body>
          <?php include('./contents/nav.php');?>
          <section class="section-collection">
            <!-- <h1 class="heading__primary--main">Yogurt</h1> -->
            <div class="breadcrumb ">
                <a href="./index.php" class="breadcrumb--links">Home</a>
                <svg class="breadcrumb-icon">
                    <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-right"></use>
                </svg>
                <a href="#" class="breadcrumb--links"><?=ucfirst($_GET['page']);?></a>

            </div>
               <div class="collection-container">
                    <div class="side-nav">
                        <p class="side-nav--head bold">CATEGORY</p>
       
                            <a href="" class="side-nav--links ">Yogurt</a>
                      
                            <a href="" class="side-nav--links ">Cake</a>
                   
                            <a href="" class="side-nav--links ">Cheese</a>
                 
                            <a href="" class="side-nav--links--light  side-nav--links">Butter</a>
                        
                    </div>
                    <main class="collection-content">
                       
                         <div>
                              <div class="section-best-products section-product" id="section-yogurt">
                                <div class="container-1">

                                       
                                        <div class="carousel carousel-flex">
                                        <!-- <div class="carousel-1 slick-slider "> -->

                                            <?php
                                                $product_category = $_GET['page'];
                                                $sql = "SELECT * FROM product WHERE category = '$product_category' ORDER BY quantity_sold DESC";
                                                $max_sold_query = "SELECT MAX(quantity_sold) as max_sold FROM product WHERE category = 'yogurt'";
                                                $output = mysqli_query($conn, $max_sold_query);
                                                $max = 0;
                                                if (mysqli_num_rows($output) > 0) {
                                                    $roww = mysqli_fetch_assoc($output);
                                                    $max = $roww['max_sold'];
                                                } 
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    $temp = 0;
                                                    $product = array_column($_SESSION['cart'],'product_id');
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $product_id = $row['product_id'];
                                                        
                                            ?>
                                            <div class="slick-list slick-list-flex">
                                                <a href="./product-detail.php?page=<?=$product_category?>&action=viewProduct&productId=<?=$product_id?>">
                                                    <div class="slick-list-container">
                                                        <img class="slider-img" src="./backend/uploads/<?=$row['image_source']?>" alt="" />
                                                        <div class="slider-details">
                                                            <span class="slider-details--name"><?=$row['product_name'];?></span>
                                                            <span class="slider-details--discription">Lorem ipsum dolor sit </span>
                                                            <?php
                                                                if($row['quantity_sold'] == $max){
                                                                    ?>
                                                            <span class="u-margin-top-v-small badge-popular">Most popular</span>
                                                            <?php
                                                                } 
                                                            ?>
                                                            <?php
                                                                if($row['stock'] == 0){
                                                                    ?>
                                                            <span class="u-margin-top-v-small badge-out-of-stock">Out of stock</span>
                                                            <?php
                                                                } 
                                                                
                                                            ?>
                                                            <?php
                                                                if($row['stock'] < 20 && $row['stock'] != 0){
                                                                    ?>
                                                            <span class="u-margin-top-v-small badge-out-of-stock">Limited Stock</span>
                                                            <?php
                                                                } 
                                                                
                                                            ?>
                                                        
                                                            <div class="slider-details-wrap">
                                                                <span class="slider-details--price">Rs.<?=$row['unit_price'];?></span>
                                                                <div class="slider-icon-box">
                                                                    <form action="" method="POST">
                                                                        <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                                        <?php
                                                                            if($row['stock'] == 0){
                                                                            } else{   
                                                                        ?>
                                                                        <?php
                                                                            if(in_array($row['product_id'],$product)){
                                                                        ?>
                                                                                <p>Added to Cart</p>
                                                                        <?php
                                                                            } else{
                                                                        ?>
                                                                        <input type="hidden" name="quantity" value="1">
                                                                        <button type="submit" name="add" value="Add to cart" class="slider-icon-wrap" >
                                                                                <svg  class="slider-icon-cart" >
                                                                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                                                                </svg>
                                                                        </button>
                                                                
                                                                        </input>
                                                                        <?php
                                                                            }
                                                                            }
                                                                        ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
        <!-- end of section yogurt -->
                         </div>
                    </main>
               </div>
          </section>
          <?php include('./contents/footer.php');?>
          <?php include('./contents/modals.php');?>
     </body>
</html>
