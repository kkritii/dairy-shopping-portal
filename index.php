<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/main.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/glider.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet"> -->
    <title>Dairy Store</title>


</head>

<body>
    <div class="container">
       
        <div id="notification-bar" >
            <div class="notification">
                <div>
                    <i class="notification--emoji">
                        &#128293; &#128293; &#128293; 
                    </i>
                    <span class="notification--text">
                        Buy products more than 2000Rs
                        to get free Delivery.
                    </span>
                </div>
            <span class="notification--close-btn" onclick="myFunction()" id="close">
                <i class="lnr lnr-cross"> </i>
            </span>
        </div>

        
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
                                            <svg class="nav__icon--down nav__icon--right">
                                                <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-right"></use>
                                            </svg>
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
                        <li class="nav__list-items" id="cart">
                            <a href="#" class="nav__links ">
                                <svg class="nav__icon-cart">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart"></use>
                                </svg>

                            </a>
                            <div class="shopping-cart">
                                <div class="shopping-cart-header">
                                    <i class="cart-icon"></i><span class="badge">3</span>
                                    <div class="shopping-cart-total">
                                        <span class="lighter-text">Total:</span>
                                        <span class="main-color-text">$2,229.97</span>
                                    </div>
                                </div>
                                <!--end shopping-cart-header -->

                                <ul class="shopping-cart-items">
                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                            alt="item1" />
                                        <span class="item-name">Sony DSC-RX100M III</span>
                                        <span class="item-price">$849.99</span>
                                        <span class="item-quantity">Quantity: 01</span>
                                    </li>
                                    <ul class="shopping-cart-items">
                                        <li class="clearfix">
                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                                alt="item1" />
                                            <span class="item-name">Sony DSC-RX100M III</span>
                                            <span class="item-price">$849.99</span>
                                            <span class="item-quantity">Quantity: 01</span>
                                        </li>
                                        <ul class="shopping-cart-items">
                                            <li class="clearfix">
                                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                                    alt="item1" />
                                                <span class="item-name">Sony DSC-RX100M III</span>
                                                <span class="item-price">$849.99</span>
                                                <span class="item-quantity">Quantity: 01</span>
                                            </li>
                                        </ul>
                                        <a href="#" class="button">Checkout</a>
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
                    " Take a taste. Come join us. Life is so endlessly delicious.”
                </h3>
            </div>
            <!-- <img src="./imgs/ct-on-phone-big.jpg" alt="" class="header__img"> -->
        </div>
        <!-- MODAL -->
        <div class="section-product"> 
            <div class="headline">
                <h1 class="heading__primary--sub headling__main">The Best dairy product in our collection.</h1>
                <h3 class="heading__secondary--sub headline__sub">Choose the product below.</h3>    
            </div>
            <div class="tab">
                <input type="radio" name="tabs" id="tab-nav-1" checked>
                <label for="tab-nav-1">Yogurt</label>
                <input type="radio" name="tabs" id="tab-nav-2">
                <label for="tab-nav-2">Cream</label>
                <input type="radio" name="tabs" id="tab-nav-3">
                <label for="tab-nav-3">Butter</label>
                <input type="radio" name="tabs" id="tab-nav-4">
                <label for="tab-nav-4">Cheese</label><br>
                <div class="tab-content">
                    <div class="tab-content__list">
                        <div class="glider-contain">
                            <div class="glider">
                                    <div class="glider-card">
                                        <img class="card-img" src="./imgs/products/juju_dhau.jpg" alt=""> 
                                        <div class="card-details">
                                            <span class="card-details--name">JUJU: Dhau</span>
                                            <span class="card-details--discription">Lorem ipsum dolor sit amet consectetur adipisicing.</span>
                                            <span class="card-details--price">Rs.400</span>
                                        </div>
                                    </div>
                                    <div class="glider-card">
                                        <img class="card-img" src="./imgs/products/juju_dhau.jpg" alt=""> 
                                        <div class="card-details">
                                            <span class="card-details--name">JUJU: Dhau</span>
                                            <span class="card-details--discription">Lorem ipsum dolor sit amet consectetur adipisicing.</span>
                                            <span class="card-details--price">Rs.400</span>
                                        </div>
                                    </div>
                                    <div class="glider-card">
                                        <img class="card-img" src="./imgs/products/juju_dhau.jpg" alt=""> 
                                        <div class="card-details">
                                            <span class="card-details--name">JUJU: Dhau</span>
                                            <span class="card-details--discription">Lorem ipsum dolor sit amet consectetur adipisicing.</span>
                                            <span class="card-details--price">Rs.400</span>
                                        </div>
                                    </div>

                                    <div class="glider-card">
                                        <img class="card-img" src="./imgs/products/juju_dhau.jpg" alt=""> 
                                        <div class="card-details">
                                            <span class="card-details--name">JUJU: Dhau</span>
                                            <span class="card-details--discription">Lorem ipsum dolor sit amet consectetur adipisicing.</span>
                                            <span class="card-details--price">Rs.400</span>
                                        </div>
                                    </div>

                                    <div class="glider-card">
                                        <img class="card-img" src="./imgs/products/juju_dhau.jpg" alt=""> 
                                        <div class="card-details">
                                            <span class="card-details--name">JUJU: Dhau</span>
                                            <span class="card-details--discription">Lorem ipsum dolor sit amet consectetur adipisicing.</span>
                                            <span class="card-details--price">Rs.400</span>
                                        </div>
                                    </div>
                            </div>
                            <button role="button" aria-label="Previous" class="glider-prev">«</button>
                            <button role="button" aria-label="Next" class="glider-next">»</button>
                            <div role="tablist" class="dots glider-dots" id="resp-dots"></div>
                        </div>
                    </div>
                </div>    
                </div>
            </div>
            
        </div>
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
                                    placeholder="Select the starting location" required>
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

        <!-- modal signin -->
        <div class="modal modal-signin" >
            <div class="modal-signin-container">
                <div class="modal--close" id="close-signin">
                    <svg class="nav__icon">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="signin">
                    <form action="" class="signin-form">
                        <span class="heading__secondary--main">Login to you Account</span>
                        <!-- <span class="heading__secondary--sub-sub">Join us to get exclusive offers.</span> -->
                        <div class="form__group">
                            <input type="email" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="email" class="form__label">Email</label>
                        </div>
                        <div class="form__group">
                            <input type="password" placeholder="" class="form__input u-margin-top-small" required>
                            <label for="password" class="form__label">Password</label>
                        </div>
                        <div class="form__group">
                            <input type="submit" placeholder="" class=" form-btn u-margin-top-mid" value="Login">
                        </div>

                        <div class="form__group">
                            <a href="">Forgot your Password?</a>
                        </div>   
                        <div class="form__group">
                            <span>Dont have an Account?</span>
                            <a href="">Sign up</a>
                        </div>                        
                    </form>
                </div>
            </div>
            
        </div>


    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./js/glider.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 5,
            dots: '#resp-dots',
            arrows: { 
                prev: '.glider-prev',
                next: '.glider-next'
            },
            draggable: true,
            responsive: [
                {   
                // screens greater than >= 775px
                breakpoint: 512,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 2,
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
                }, 
                {   
                // screens greater than >= 775px
                breakpoint: 775,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 3,
                    slidesToScroll: 'auto',
                    itemWidth: 150,
                    duration: 0.25
                }
                },{
                // screens greater than >= 1024px
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    itemWidth: 150,
                    duration: 0.25
                }
                }
            ]
        });
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

    </script>
</body>

</html>