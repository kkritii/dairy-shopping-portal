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
       

        <section class="section-testimonial">
            <div class="testimonials">
                <h1 class="heading__primary--sub">WHAT OUR CUSTOMER SAYS</h1>
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
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia omnis earum quae cupiditate
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
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium nisi ipsam laborum
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
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis eos voluptates, nulla
                            dolor facilis saepe.</p>

                    </div>
                </div>
                <button class="">Write your Own review ></button>
            </div>
        </section>

        <?php //include('./contents/products.php');?>
        <?php include('./contents/footer.php');?>
        <?php include('./contents/modals.php');?>
    </div>
</body>

</html>