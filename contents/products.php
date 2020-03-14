  
        <!-- Section yogurt -->
        <div class="section-yogurt section-product" id="section-yogurt">
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
                                            <?php
                                                            if(in_array($row['product_id'],$product_id)){
                                                        ?>
                                                                <p>Added</p>
                                                        <?php
                                                            } else{
                                                        ?>
                                                                <button type="submit" name="add">
                                                                <!-- <svg class="slider-icon">
                                                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                                                </svg> -->
                                                                Add to Cart
                                                                </button>
                                                        <?php
                                                            }
                                                        ?>
                                        </form>
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
           </div>
        </div>
        <!-- end of section yogurt -->

        <!--Others Product section -->
        <div class="section-others section-product "> 
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
                        $alreadyExist = false;
                        if (mysqli_num_rows($output) > 0) {
                            $roww = mysqli_fetch_assoc($output);
                            $max = $roww['max_sold'];
                        } 
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                 
                        $product_id = array_column($_SESSION['cart'],'product_id');

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
                                                <div class="slider-icon-box">
                                                    
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                                        <?php
                                                            if(in_array($row['product_id'],$product_id)){
                                                        ?>
                                                                 <p>Added</p>
                                                        <?php
                                                            } else{
                                                        ?>
                                                                <button type="submit" name="add">
                                                                <!-- <svg class="slider-icon">
                                                                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                                                </svg> -->
                                                                Add to Cart
                                                                </button>
                                                        <?php
                                                            }
                                                        ?>
                                                    </form>
                                                </div>
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
                                <div class="slider-icon-box">
                                        <!-- <svg class="slider-icon">
                                            <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                                        </svg> -->
                                        <form action="" method="POST">
                                            <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                                          
                                        </form>
                                       

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
                </div>
                <!-- end of tab content -->
            </div> 
            <!-- end of tab -->
         
        </div>
        <div class="u-margin-top-large">
        </div>
        <!-- end of section others product -->
