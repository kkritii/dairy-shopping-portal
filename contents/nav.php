 <!-- Navigation -->
 <nav class="section-nav">
            <div class="nav-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <img class="nav__icon" src="./imgs/logo-cow.svg" alt="">
                    </a>
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
                                <div class="arrow-top"></div>
                                <div class="menu-lv-1">
                                    <ul>
                                        <li class="">
                                            <a href="" class="category__link">Yogurt (Dahi)</a>
                                        </li>
                                        <li class=""><a href="" class="category__link">Cake</a></li>
                                        <li class=""><a href="" class="category__link">Butter</a></li>
                                        <li class=""><a href="" class="category__link">Cheese</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        


                        <li class="nav__list-items" id="contactus" class="contactus">
                            <a href="#" class="nav__links">Contact Us</a>
                        </li>
                        <li class="nav__list-items" id="checkRate" class="checkrate">
                            <a href="#" class="nav__links">Check rate</a>
                        </li>

                        <li class="nav__list-items nav__links--cart"  id="cart">
                            <a href="#" class="nav__links nav__links--cart">
                                <svg class="nav__icon-cart">
                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart"></use>
                                </svg>
                                <?php
                                 $count_cart_items =  count($_SESSION['cart']);  
                                // echo "<script>alert('".$count_cart_items."')</script>";
                            ?>
                                <span class="nav__icon-cart--data"><?=$count_cart_items?></span>
                            </a>
                            <div class="shopping-cart">
                           
                                <div class="shopping-cart-header">
                                    <i class="cart-icon"></i><span class="badge"> <?=$count_cart_items?> </span>
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
                                <a href="./checkout.php?action=checkout" class="button">Go to Cart</a>
                                <!-- end of header -->
                                <ul class="shopping-cart-items">
                                <?php
                                  
                                    if(count($_SESSION['cart']) != 0){
                                        $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`image_source` FROM product";
                                        $result = mysqli_query($conn,$sql);
                                        $product_id = array_column($_SESSION['cart'],'product_id');
                                        while($row = mysqli_fetch_assoc($result)){
                                            foreach($product_id as $id){
                                                if($row['product_id'] == $id){
                                                    
                                ?>
                                                    <li class="clearfix rel-pos">
                                                        <img class="item-img" src="./backend/uploads/<?=$row['image_source']?>"
                                                            alt="item1" />
                                                        <span class="item-name"><?=$row['product_name'];?></span>
                                                        <span class="item-price">Rs.<?=$row['unit_price'];?></span>
                                                        <span class="item-quantity"><?=$row['category']?></span>
                                                        <span class="">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                                <button type="submit" class="remove btn-remove" name="remove">
                                                                    <svg class="icon-remove">
                                                                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                                                                    </svg>
                                                                </button>
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

                                    
                        

                        <?php
                            if(isset($_SESSION['user_id'])){
                                $session_id = $_SESSION['user_id'];
                                $sql = "SELECT fullname FROM customer WHERE customer_id = '$session_id'";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($result);
                                $firstname =  explode(' ',trim($row['fullname']));
                        ?>
                        <li class="nav__list-items u-margin-left-small">
                            
                            <div class="category">
                                <a href="" class=" nav__list nav__links">
                                    <svg class="nav__icon--down">
                                        <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-down"></use>
                                    </svg>
                                    <?=$firstname[0]?>
                                </a>
                                <div class="account-menu-lv-1">
                                    <ul>
                                        <?php
                                            $user_id = $_SESSION['user_id'];
                                        ?>
                                        <li class="">
                                            <a href="./account.php?action=viewAccount&userId=<?=$user_id?>" class="category__link">Account</a>
                                        </li>
                                       
                                        <li class=""><a href="./account.php?action=history&userId=<?=$user_id;?>" class="category__link">Purchase History </a></li>
                                        <li class=""><a href="./includes/signout.php" class="category__link">Sign Out</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php
                                
                            } else{
                        ?>
                        <li class="nav__list-items u-margin-left-small" id="signin">
                            <a href="#" class="nav__links nav--4">Sign in</a>
                        <?php        
                            }
                        ?>
                        </li>
                    </ul>
                </nav>



            </div>

        </nav>