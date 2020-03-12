<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    
    //For adding item to cart
    if(isset($_POST['add'])) {
        if(isset($_SESSION['cart'])){
            print_r($_SESSION['cart']);
            $item_array_id = array_column($_SESSION['cart'],"product_id");
            if(in_array($_POST['product_id'],$item_array_id)){
                echo "<script>alert('Item already exists')</script>";
                echo "<script>window.location = 'index.php'</script>";
                
            }  else{
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );
                $_SESSION['cart'][$count] = $item_array;
                $count_cart_items = $count;
            echo "<script>window.location='index.php'</script>";

            }
        } else{
            print_r($_POST['product_id']);
            echo "Bitch ass nigga";
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][0] =  $item_array;
        }
    }
    $count_cart_items =  count($_SESSION['cart']);    

    //for removing item from cart
    if(isset($_POST['remove'])){
        $_POST['product_id'];
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_POST['product_id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>window.location='index.php'</script>";
            }
        }
    }

    //for emptying cart
    if(isset($_POST['empty-cart'])){
        unset($_SESSION['cart']);
        $_SESSION['cart'] = array();
        echo "<script>window.location='index.php'</script>";

    }

    //for userlogin
    if(isset($_POST['submit'])){
        $u = $_POST['email'];
     $p = $_POST['password'];
          
     $sql = "SELECT * FROM `customer` WHERE `email`='$u' AND `password`='$p' AND `is_active` = 1 AND `email_activation` = 1";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
         session_start();
         $_SESSION['email'] = $u;
         $row = mysqli_fetch_assoc($result);
         echo "<script>alert('thanks for signing ');</script>";
         echo "<script>window.location='index.php';</script>";
     }else{
         // echo "error";
         echo "<script>alert('Email or Password Incorrect!');</script>";
       echo "<script>window.location='index.php';</script>";
     }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
    <title>Dairy Store</title>
</head>

<body>
    <div class="container">
       
        <section id="notification-bar" class="section-notification-bar" >
            <div class="notification">
                    <div class="block-1">
                        <span class="notification--emoji">
                            BISKET OFFER
                        </span>
                        <span> | </span>
                        <span class="notification--text">
                            Buy products more than 2000Rs
                            to get free Delivery😍
                        </span>
                    </div>
                    <div class="block-2"> 
                        <span>Offer ends in : </span>
                        <span id="count-down"></span>
                    </div>
                
            </div>
            <span class="notification--close-btn" onclick="" id="close">
                <i class="lnr lnr-cross"> 
                    <svg class="icon-cross">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </i>
            </span>
        </section>

        <script>
            let countDownTime = new Date("April 12, 2020 10:00:00").getTime();
            let now = new Date().getTime();
            let timeDistance = countDownTime - now;
            let days = Math.floor(timeDistance/(1000 * 60 * 60 * 24));
            let hr = Math.floor(timeDistance % (1000 * 60 * 60 * 24) / (1000 *60*60));
            let min = Math.floor(timeDistance % (1000 * 60 * 60) / (1000 *60));
            let sec = Math.floor(timeDistance % (1000 * 60) / 1000);
            document.getElementById("count-down").innerHTML = days + " days : " + hr + " hours :" + min + " minutes :" + sec + " seconds";

            let countDownFunction = setInterval(function(){
                let now = new Date().getTime();
                let timeDistance = countDownTime - now;
                let days = Math.floor(timeDistance/(1000 * 60 * 60 * 24));
                let hr = Math.floor(timeDistance % (1000 * 60 * 60 * 24) / (1000 *60*60));
                let min = Math.floor(timeDistance % (1000 * 60 * 60) / (1000 *60));
                let sec = Math.floor(timeDistance % (1000 * 60) / 1000);
                document.getElementById("count-down").innerHTML = days + " days : " + hr + " hours :" + min + " minutes :" + sec + " seconds";
                if(timeDistance < 0){
                    document.getElementById("count-down").innerHTML = "offer Ended";
                }
            },1000);
        </script>
        
        <!-- Navigation -->
        <nav class="section-nav">
            <div class="nav-wrapper">
                <div class="logo">
                    <a href="index.html">LOGO</a>
                </div>
                
                <div class="search">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-search"></use>
                    </svg>
                    <input type="text" placeholder="Search for Products" class="search__input">
                </div>
               
                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__list-items">
                            <div class="category">
                                <a href="" class=" nav__list nav__links">
                                    <svg class="nav__icon--down">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-down"></use>
                                    </svg>
                                    Category
                                </a>
                                <div class="menu-lv-1">
                                    <ul>
                                        <li class="">
                                            <a href="" class="category__link">Yogurt (Dahi)</a>
                                        </li>
                                        <li class=""><a href="" class="category__link">Cream</a></li>
                                        <li class=""><a href="" class="category__link">Butter</a></li>
                                        <li class=""><a href="" class="category__link">Cheese</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>


                        <li class="nav__list-items" id="contactus">
                            <a href="#" class="nav__links">Contact Us</a>
                        </li>
                        <li class="nav__list-items" id="checkRate">
                            <a href="#" class="nav__links">Check rate</a>
                        </li>

                        <li class="nav__list-items nav__links--cart"  id="cart">
                            <a href="#" class="nav__links nav__links--cart">
                                <svg class="nav__icon-cart">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart"></use>
                                </svg>
                                <span class="nav__icon-cart--data"><?=$count_cart_items?></span>
                            </a>
                            <div class="shopping-cart">
                               
                                <div class="shopping-cart-header">
                                    <i class="cart-icon"></i><span class="badge"><?=$count_cart_items?></span>
                                    <div class="shopping-cart-total">
                                        <span class="lighter-text">Total:</span>

                                <?php
                                    $total = 0;
                                    if(count($_SESSION['cart']) != 0){
                                        $sql = "SELECT `product_id`,`unit_price` FROM product";
                                        $result = mysqli_query($conn,$sql);
                                        $product_id = array_column($_SESSION['cart'],'product_id');
                                        while($row = mysqli_fetch_assoc($result)){
                                            foreach($product_id as $id){
                                                if($row['product_id'] == $id){
                                                    $total = $total + $row['unit_price'];
                                                }
                                            }
                                        }       
                                    }
                                ?>
                                        <span class="main-color-text"> Rs.<?=$total?></span>
                                    </div>
                                </div>
                                <a href="#" class="button">Checkout</a>
                                <!-- end of header -->
                                <ul class="shopping-cart-items">
                                <?php
                                    $total = 0;
                                    if(count($_SESSION['cart']) != 0){

                                        
                                        $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`image_source` FROM product";
                                        $result = mysqli_query($conn,$sql);
                                        $product_id = array_column($_SESSION['cart'],'product_id');
                                        while($row = mysqli_fetch_assoc($result)){
                                            foreach($product_id as $id){
                                                if($row['product_id'] == $id){
                                                    $total = $total + $row['unit_price'];
                                ?>
                                                    <li class="clearfix">
                                                        <img class="item-img" src="./backend/uploads/<?=$row['image_source']?>"
                                                            alt="item1" />
                                                        <span class="item-name"><?=$row['product_name'];?></span>
                                                        <span class="item-price">Rs.<?=$row['unit_price'];?></span>
                                                        <span class="item-quantity"><?=$row['category']?></span>
                                                        <span>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                                <button type="submit" class="remove" name="remove">Remove</button>
                                                            </form>
                                                        </span>
                                                    </li>
                                <?php
                                                }
                                            }
                                        }                            
                                    } else{
                                ?>
                                                <li class="clearfix">
                                                        <span class="item-name">Wow such empty</span>
                                                </li>
                                <?php
                                    }
                                ?>
                       
                                <!--end shopping-cart-header -->
                                </ul>
                                <form action="" method="POST">
                                    <button type="submit" name="empty-cart"  class="button-empty">Empty Cart</button>                                                                
                                </form>
                                <!-- // <a href="#" class="button-empty">Empty Cart</a> -->
                            </div>
                            <!--end shopping-cart -->
                        </li>

                        <li class="nav__list-items u-margin-left-small" id="signin">
                            <a href="#" class="nav__links nav--4">Sign in</a>
                        </li>
                    </ul>
                </nav>



            </div>

        </nav>
        <div class="header">
            <div class="board">
                <h1 class="heading__primary--main">We serve you best dairy in town.</h1>
                <h3 class="heading__secondary--sub u-margin-top-small">
                    "Take a taste. Come join us. Life is so endlessly delicious.”
                </h3>
                <form action="" class="u-margin-top-small header_form">
                    <input type="email" placeholder="Enter your Email" class="header_input">
                    <input type="submit" value="Subscribe" name="submit" class="header_btn form-btn">
                </form>
            </div>
            <!-- <img src="./imgs/ct-on-phone-big.jpg" alt="" class="header__img"> -->
        </div>
        
        <!-- Section yogurt -->
        <div class="section-yogurt section-product">
           <div class="container-1">
                <div class="headline">
                    <h1 class="heading__primary--sub headling__main">The Best dairy product in our collection.</h1>
                    <h3 class="heading__secondary--sub headline__sub">Choose the product below.</h3>    
                </div>
                <div class="tab-1">
                    <input type="radio" name="tabs" id="" checked>
                    <label for="tab-1-label">Yogurt</label>
                </div>
                <div class="carousel-1 carousel slick-slider slider">
                    <?php
                        // require_once('./backend/includes/db_connect.php');
                        $sql = "SELECT * FROM product WHERE category = 'yogurt'";
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
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="slick-list">
                        <div class="slick-list-container">
                            <img class="slider-img" src="./backend/uploads/<?=$row['image_source']?>" alt="" />
                            <div class="slider-details">
                                <span class="slider-details--name"><?=$row['product_name'];?></span>
                                <span class="slider-details--discription">Lorem ipsum dolor sit </span>
                                <?php
                                    if($row['stock'] == 0){
                                        ?>
                                           <span class="u-margin-top-v-small badge-out-of-stock">Out of stock</span>                  
                                        <?php
                                    } 
                                ?>
                                <?php
                                    if($row['quantity_sold'] == $max){
                                        ?>       
                                           <span class="u-margin-top-v-small badge-popular">Most popular</span>            
                                        <?php
                                    } 
                                ?>
                                <span class="slider-details--price">Rs.<?=$row['unit_price'];?></span>
                                <div class="slider-icon-box">
                                        <!-- <svg class="slider-icon">
                                            <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                        </svg> -->
                                        <form action="" method="POST">
                                            <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                            <button type="submit" name="add">Add to Cart</button>
                                        </form>
                                       

                                </div>
                                <!-- <div class="slick-row ">
                                    <span class="slider-details--price">Rs.<?=$row['unit_price'];?></span>
                                    <span class="slider-icon-box u-margin-top-v-small">
                                        <svg class="slider-icon">
                                            <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                        </svg>
                                        Add to cart
                                    </span>
                                </div> -->
                                <!-- <div class="slider-price-icon">
                                     <div class="slider-details--price">Rs.<?=$row['unit_price'];?></div>
                                    <div class="slider-icon-box">
                                        <svg class="slider-icon">
                                            <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                        </svg>
                                        Add to cart
                                    </div>
                                </div> -->
                                </div>
                        </div>
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

        <!--Others Product section -->
        <div class="section-others section-product"> 
            <div class="headline">
                <!-- <h1 class="heading__primary--sub headling__main">The Best dairy product in our collection.</h1> -->
                <h3 class="heading__secondary--sub headline__sub">Our other line of products.</h3>    
            </div>
            <div class="tab">
                <input type="radio" name="tabs" id="tab-nav-1" checked>
                <label for="tab-nav-1">Cake</label>
                <input type="radio" name="tabs" id="tab-nav-2">
                <label for="tab-nav-2">Butter</label>
                <input type="radio" name="tabs" id="tab-nav-3">
                <label for="tab-nav-3">Cheese</label><br>
                <div class="tab-content">
                    <div class="slick-slider slider carousel">
                    <?php
                        // require_once('./backend/includes/db_connect.php');
                        $sql = "SELECT * FROM product WHERE category = 'cake'";
                        $max_sold_query = "SELECT MAX(quantity_sold) as max_sold FROM product WHERE category = 'cake'";
                        $output = mysqli_query($conn, $max_sold_query);
                        $max = 0;
                        if (mysqli_num_rows($output) > 0) {
                            $roww = mysqli_fetch_assoc($output);
                            $max = $roww['max_sold'];
                        } 
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                    ?>

                    <?php
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="slick-list">
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
                                
                                <div>
                                    <span class="slider-details--price">Rs.<?=$row['unit_price'];?></span>
                                    <span>

                                    </span>
                                </div>
                                
                                </div>
                                
                        </div>
                       
                    </div>
                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    </div>

                    <div class="slick-slider carousel">
                    <?php
                        require_once('./backend/includes/db_connect.php');
                        $sql = "SELECT * FROM product WHERE category = 'cake'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                    ?>

                    <?php
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="slick-list">
                        <div class="slick-list-container">
                            <img class="slider-img" src="./backend/uploads/<?=$row['image_source']?>" alt="" />
                            <div class="slider-details">
                                <span class="slider-details--name"><?=$row['product_name'];?></span>
                                <span class="slider-details--discription">Lorem ipsum dolor sit </span>
                                <span class="slider-details--price">Rs.<?=$row['unit_price'];?></span>
                                </div>
                        </div>
                    
                    </div>
                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    </div>
                </div>
                <!-- end of tab content -->
            </div> 
            <!-- end of tab -->
         
        </div>
        <!-- end of section others product -->

        <!-- footer -->
        <footer class="section-footer">
            <div class="footer-container">
                <div class="grid">
                    <ul>
                        <li class="bold">NAVIGATE</li>
                        <li><a href="./index.html">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li> <a href="#">Contact us</a></li>

                        <li><a href="./index.html">Check Rate</a></li>
                        <li><a href="#">Sign in</a></li>
                        <li> <a href="#">Sign up</a></li>
                    </ul>
                </div>
                <div class="grid">
                    <ul>
                        <li class="bold">SERVICES</li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Check rate</a></li>
                        <li><a href="#">Rating</a></li>
                    </ul>
                    <ul class="u-margin-top-v-small"> 
                        <li class="bold"><a href="#">PARTNERS</a></li>
                        <li><a href="#">Babin Store</a></li>
                        <li><a href="#">Prajapati Suppliers</a></li>
                    </ul>
                </div>
                <div class="grid">
                    <ul>
                        <li class="bold">OUR SUPPLIERS</li>
                        <li>Bhaptapur Dairy</li>
                        <li>Babin Dairy Pvt.</li>
                    </ul>
                </div>
                <div class="grid">
                    <ul>
                        <li class="bold">STAY CONNNECTED</li>
                        <li class="">Be the first to get exciting offers.</li>
                        <li>
                            <form action="" class="footer-form" >
                                <input class="footer-input" type="email" placeholder="Enter your Email">
                                <input class="footer-btn form-btn" type="button" value="Subscribe">
                            </form>
                        </li>
                        <li  class="u-margin-top-v-small">
                            <a href="https://www.facebook.com/profile.php?id=100007125259498" target="_blank" class="nav__links ">
                                <svg class="footer-icon footer-icon--facebook">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-facebook-with-circle"></use>
                                </svg>
                            </a>

                            <a href="#" class="nav__links ">
                                <svg class="footer-icon footer-icon--google">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-google-with-circle"></use>
                                </svg>
                            </a>

                            <a href="https://twitter.com/kpsharmaoli?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank" class="nav__links ">
                                <svg class="footer-icon footer-icon--twitter">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-twitter-with-circle"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid">
                    <ul>
                        <li class="bold">CONTACT US</li>
                        <li class="contact-row">
                            <div>
                                <svg class="footer-icon footer-icon--twitter">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-old-phone"></use>
                                </svg>
                            </div>
                            <div class="u-margin-left-small">
                                <div>+977 9860465326</div>
                                <div>01 6614243</div>
                            </div>
                        </li>
                        <li class="contact-row">
                            <div>
                                <svg class="footer-icon footer-icon--gmail">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-envelope-open"></use>
                                </svg>
                            </div>
                            <div class="u-margin-left-small">
                                <div>datheputhe.dairy@gmail.com</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="copyrights">
                <div class="copyrights-container">
                    <div class="grid-1">
                        <div>
                            Copyright &copy; 2020 Datheputhe Dairy. All right reserved.
                        </div>
                        <div>
                            <li>
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms of Use</a>
                                <a href="#">Refund Policy</a>
                            </li>
                        </div>                        
                    </div>
                    
                    <div class="grid-2">
                        <img src="./imgs/icons/nepal.svg" alt="Nepal Flag" class="footer-icon--flag">
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of footer -->

        <!-- MODAL checkRate -->
        <div class="modal modal-checkrate">
            <div class="modal_container">
                <div class="modal--close" id="close-checkrate">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="check-rate">
                    <img src="./imgs/drawkit-server-woman-colour.svg" alt="women using laptop" class="check-rate-img">
                    <div class="right-group">
                        <div class="heading">
                            <span class="heading__primary--main">Check Rates<span class="dot">.</span></span>
                            <span class="heading__secondary--sub-sub">Calculate Delivery Cost to your local
                                address.</span>
                        </div>
                        <form action="" class="form">
                            <div class="u-margin-top-small">
                                <span class="heading__secondary--sub">From</span>
                                <input type="text" class="rate__form--source form__input"
                                     value="Kamalbinayak-10,Bhaktapur" readonly>
                            </div>
                            <div class="u-margin-top-small">
                                <span class="heading__secondary--sub">To</span>
                                <input type="text" class="rate__form--destination form__input"
                                    placeholder="Select the destination" required>
                            </div>
                            <input type="button" class="form-btn btn u-margin-top-mid" value="CHECK RATES"
                                type="submit">
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- end of modal checkrate -->
        
        <!-- Modal contact-us -->
        <div class="modal modal-contactus">
            <div class="modal_container">
                <div class="modal--close" id="close-contactus">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="contactus">
                    <div class="left-group">
                        <div class="heading">
                            <span class="heading__primary--main">Drop us a line<span class="dot">.</span></span>
                        </div>
                        <form action="" class="form">
                            <div class="u-margin-top-small">
                                <input type="text"
                                    class="form--destination form__input form__input__contact"
                                    placeholder="Full Name" required>
                                <label for="text" class="form__label">Full Name</label>
                            </div>
                            <div class="u-margin-top-small">
                                <input type="email" class="form--destination form__input form__input__contact" placeholder="Email" required>
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <div class="u-margin-top-small">
                                <input type="tel" class="form--destination form__input form__input__contact" placeholder="Contact Number" required>
                                <label for="tel" class="form__label">Contact Number</label>
                            </div>
                            <div class="u-margin-top-small">
                                <input type="text" class="form--destination form__input form__input__contact" placeholder="Message" required>
                                <label for="text" class="form__label">Message</label>
                            </div>


                            <input type="submit" class="form-btn btn u-margin-top-small" value="Submit" type="submit"
                                required>
                        </form>
                    </div>
                    <img src="./imgs/rsz_contact-illustration.png" alt="" class="contactus-img">

                </div>

            </div>
        </div>
        <!-- end of modal checkrate -->

        <!-- modal signin -->
        <div class="modal modal-signin" >
            <div class="modal-signin-container">
                <div class="modal--close" id="close-signin">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="signin">
                    <form action="" class="signin-form" method="POST">
                        <span class="heading__secondary--main">Login to you Account</span>
                        <!-- <span class="heading__secondary--sub-sub">Join us to get exclusive offers.</span> -->
                       
                        <div class="form__group">
                            <input type="email" name="email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Email</label>
                        </div>
                        <div class="form__group">
                            <input type="password" name="password" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="password" class="form__label">Password</label>
                        </div>
                        <div class="form__group">
                            <input type="submit" name="submit" placeholder="" class=" form-btn u-margin-top-mid" value="Login">
                        </div>

                        <div class="form__group">
                            <a href="">Forgot your Password?</a>
                        </div>   
                        <div class="form__group">
                            <span>Dont have an Account?</span>
                            <a href="#" id="signup">Sign up</a>
                        </div>                        
                    </form>
                </div>
            </div>
            
        </div>
        <!-- end of modal checkrate -->

        <div class="modal modal-signup" >
            <div class="modal-signup-container">
                <div class="modal--close" id="close-signup">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="signup">
                    <form action="" class="signup-form">
                        <span class="heading__secondary--main">SIGN up to you Account</span>
                        <!-- <span class="heading__secondary--sub-sub">Join us to get exclusive offers.</span> -->
                        <div class="form__group">
                            <input type="text" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="text" class="form__label">Full name</label>
                        </div>
                        <div class="form__group">
                            <input type="email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Email</label>
                        </div>
                        <div class="form__group">
                            <input type="email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Contact No.</label>
                        </div>
                        <div class="form__group">
                            <input type="email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Address</label>
                        </div>
                        <div class="form__group">
                            <input type="password" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="password" class="form__label">Password</label>
                        </div>
                        <div class="form__group">
                            <input type="submit" placeholder="" class=" form-btn u-margin-top-mid" value="Sign Up">
                        </div>

                        <div class="form__group">
                            <span>Already have an Account?</span>
                            <a href="#" id="temp">Sign in</a>
                        </div>                        
                    </form>
                </div>
            </div>
            
        </div>

    </div>
</body>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="./js/script.js"></script>

     <script>
        $(document).ready(function() {
             $(".slick-slider").slick({
                arrows: true,
                  dots: true,
                  infinite: false,
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  initialSlide:0,
                  rows:1,
                //   autoplay:true,
                //   centerMode:true,
                  responsive: [
                       {
                            breakpoint: 768,
                            settings: {
                                 arrows: false,
                                 centerMode: true,
                                 centerPadding: "40px",
                                 slidesToShow: 3
                            }
                       },
                       {
                            breakpoint: 480,
                            settings: {
                                 arrows: false,
                                 centerMode: true,
                                 centerPadding: "40px",
                                 slidesToShow: 1
                            }
                       }
                  ]
             });
        });
   </script>

    <script>
        document.getElementById('checkRate').addEventListener('click',
            function () {
                document.querySelector('.modal-checkrate').style.display = 'flex';
            })
        document.getElementById('contactus').addEventListener('click',
            function () {
                document.querySelector('.modal-contactus').style.display = 'flex';
            })
            document.getElementById('signin').addEventListener('click',
            function () {
                document.querySelector('.modal-signin').style.display = 'flex';
            })
            document.getElementById('signup').addEventListener('click',
            function () {
                document.querySelector('.modal-signup').style.display = 'flex';
            })
            // document.getElementById('temp').addEventListener('click',
            // function () {
            //     document.querySelector('.modal-signin').style.display = 'flex';
            // })
    </script>


</html>