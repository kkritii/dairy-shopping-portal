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
                <!-- <svg class="slider-icon">
                    <use xlink:href="./imgs/icons/sprite.svg#icon-cart-arrow-down"></use>
                </svg> -->
                <form action="" method="POST">
                    <input type="hidden" name="product_id" value="<?=$row['product_id']?>">
                    <button type="submit" name="add">Add to Cart</button>
                </form>
        </div>
        </div>
        </div>
</div>