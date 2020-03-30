<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
    <link rel="icon" href="./imgs/title-cow.png" type="img/png">
    <title>Dairy Store</title>
</head>

<body>
    <div class="container">
        <?php include('./contents/notification.php');?>
        <?php include('./contents/nav.php');?>

        <?php include('./contents/header.php');?>

        <div class="topics-container">
            <h1 class="heading_main">Our Product Categories.</h1>
            <h2 class="heading_sub">Choose from one of the category below.</h2>
            <div class="topics">
                <a href="./collection.php?page=yogurt" class="topic-box">
                    <img src="./backend/uploads/normal_dhau.jpg" alt="" class="topic-box-img">
                    Yogurt
                </a>
                <a href="./collection.php?page=cake" class="topic-box">
                    <img src="./backend/uploads/red-velvet.jpg" alt="" class="topic-box-img">
                    Cake
                </a>
                <a href="./collection.php?page=cheese" class="topic-box">
                    <img src="./backend/uploads/Nepali-yak-cheese.jpg" alt="" class="topic-box-img">
                    Cheese
                </a>
                <div class="topic-box">
                    Butter
                    <span class="topic-box-text-sm">Comming Soon!</span>
                </div>
                <div class="topic-box">
                    Butter
                    <span class="topic-box-text-sm">Comming Soon!</span>
                </div>
            </div>
        </div>
        <!-- <div class="notice-bar">
                <span class="notice--text bold">Lorem ipsum dolor sit amet. </span>
                <span class="notice--text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae cum, eius iure earum aperiam aspernatur ipsam </span>

                <span class="notice--close-btn" onclick="" id="close">
                <i class="lnr lnr-cross"> 
                    <svg class="icon-cross">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </i>
                 </span>
        </div> -->
        <section class="section-best_products">
            <h1 class="heading_main">Best Selling Products</h1>
            <div class="slick-slider slider carousel">
            <!-- <h2 class="heading_sub">Choose from one of the category below.</h2> -->
                <?php
                $cake = "SELECT * FROM product ORDER BY quantity_sold DESC Limit 5";
                $result = mysqli_query($conn,$cake);
                // echo "<pre>" ;
                // print_r($result);
                // echo "</pre>" ;
                while($row = mysqli_fetch_assoc($result)){
                ##################################################################
                ### Copy these three lines below ###
                    $product_id = $row['product_id'];
                    $product_category = $row['category'];
                    $product = array_column($_SESSION['cart'],'product_id');
                ?>
                    <div class="slick-list">
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
            
                ?>          
            </div>
        </section>

        <section class="section-testimonial">
            <div class="testimonials">
                <h1 class="heading__primary--sub">WHAT OUR CUSTOMERS SAY</h1>
                <div class="test-body">
                    <div class="item">
                        <img src="./imgs/rosan.png">
                        <div class="name">ROSAN DUMARU</div>
                        <small class="desig">CRANE OWNER</small>
                        <!-- <div class="share">
                                <i>
                                    <svg class="testimonial__icon">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-facebook-with-circle"></use>
                                    </svg>
                                </i>
                                <i>
                                    <svg class="testimonial__icon">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-github-with-circle"></use>
                                    </svg>
                                </i>
                            </div> -->
                        <p class="u-margin-top-small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia omnis earum quae cupiditate
                            fuga sequi.</p>

                    </div>
                    <div class="item">
                        <img src="./imgs/rabin.png">
                        <div class="name">RABIN PHAIJU</div>
                        <small class="desig">STUDENT</small>
                        <!-- <div class="share">
                                <i>
                                    <svg class="testimonial__icon">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-facebook-with-circle"></use>
                                    </svg>
                                </i>
                                <i>
                                    <svg class="testimonial__icon">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-github-with-circle"></use>
                                    </svg>
                                </i>
                            </div> -->
                        <p class="u-margin-top-small">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium nisi ipsam laborum
                            laudantium sint mollitia.</p>

                    </div>
                    <div class="item">
                        <img src="./imgs/rodip.png">
                        <div class="name">RODIP DUWAL </div>
                        <small class="desig">MECHANICS</small>
                        <!-- <div class="share">
                                <i>
                                    <svg class="testimonial__icon">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-facebook-with-circle"></use>
                                    </svg>
                                </i>
                                <i>
                                    <svg class="testimonial__icon">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-github-with-circle"></use>
                                    </svg>
                                </i>
                            </div> -->
                        <p class="u-margin-top-small">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis eos voluptates, nulla
                            dolor facilis saepe.</p>

                    </div>
                </div>
                <button class="">Write your Own review ></button>
            </div>
        </section>

        <?php #include('./contents/products.php');?>
       
        <?php include('./contents/footer.php');?>
        <?php include('./contents/modals.php');?>
    </div>
</body>

</html>