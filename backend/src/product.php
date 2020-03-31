<script>	
	$(document).ready(function(){
        $(".message-box").load("./includes/popup_message.php")
	});
</script>

<link rel="stylesheet" href="./css/modal-add.css" />
<div class="content-wrapper">
     <div class="row-1">
          <div class="heading">
               <h1 class="heading__primary--main">Products</h1>
               <h3 class="heading__primary--sub">
                    All the Products are displayed in below Table. Lorem ipsum dolor sit amet consectetur.
               </h3>
          </div>
     </div>
     <div class="cards">
          <div class="card card--1">
               <div class="card_title">Total Products</div> 
               <div class="card-group">
                    <i class="card-icon"> 
                         <svg class="icon-big">
                              <use xlink:href="./img/SVG1/sprite.svg#icon-shopping-bag"></use>
                         </svg>
                    </i>
                    <div class="card-data card-data-1">
                         <?php
                              require_once("../includes/db_connect.php");
                              $sql = "SELECT `product_id` FROM product";
                              if ($result=mysqli_query($conn,$sql))
                              {
                                   $rowcount=mysqli_num_rows($result);
                                   echo $rowcount;
                                   mysqli_free_result($result);
                              }
                         ?>
                    </div>
               </div>
          </div>
          <div class="card card--1">
               <div class="card_title">Total Products Sold</div> 
               <div class="card-group">
                    <i class="card-icon"> 
                         <svg class="icon-big">
                              <use xlink:href="./img/SVG1/sprite.svg#icon-shopping-basket"></use>
                         </svg>
                    </i>
                    <div class="card-data card-data-2">0</div>
               </div>
          </div>
          <div class="card card--1">
               <div class="card_title">Total Profits</div> 
               <div class="card-group">
                    <i class="card-icon"> 
                         <svg class="icon-big">
                              <use xlink:href="./img/SVG1/sprite.svg#icon-shopping-bag"></use>
                         </svg>
                    </i>
                    <div class="card-data card-data-3">Rs.0</div>
               </div>
          </div>
     </div>
     <div class="btn-row">
          <button id="modalBtn" class="button">
               <svg class="icon">
                    <use xlink:href="./img/SVG1/sprite.svg#icon-circle-with-plus"></use>
               </svg>
               Add Product
          </button>
          <button id="modalBtn" class="button">
               <svg class="icon">
                    <use xlink:href="./img/SVG1/sprite.svg#icon-pencil"></use>
               </svg>
               Manage Product
          </button>
          <button id="modalBtn" class="button">
               <svg class="icon">
                    <use xlink:href="./img/SVG1/sprite.svg#icon-circle-with-plus"></use>
               </svg>
               Add Product Category
          </button>
          <button id="modalBtn" class="button">
               <svg class="icon">
                    <use xlink:href="./img/SVG1/sprite.svg#icon-circle-with-plus"></use>
               </svg>
               Add Product
          </button>
     </div>

     <div id="simpleModal" class="modal">
          <div class="modal-content">
               <span class="closeBtn">&times;</span>
               <div class="modal-header">
                    Add product
                    <hr />
               </div>
               <div class="modal-form">
               <!--  -->
                  <form  action="./includes/add_product.php" method="POST" enctype="multipart/form-data">
                         <table class="modal_table">
                             <tr class="table_row table_row-category">
                                   <div>
                                        <td><h2>Category</h2></td>
                                   </div>
                                   <td>
                                        <select id="category" name="category" class="input-product-category">
                                             <option value="yogurt">Yogurt</option>
                                             <option value="cake">Cake</option>
                                             <option value="butter">Butter</option>
                                             <option value="cheese">Cheese</option>
                                        </select>
                                   </td>       
                              </tr>
                              
                              <tr class="table_row">
                                   <td><h2>Product Name</h2></td>
                                   <td>
                                        <input type="text" size="20" name="product_name"  class="form_input input-product-name" />
                                   </td>
                              </tr>  
                              <tr class="table_row">
                                   <td><h2>Price</h2></td>
                                   <td>
                                        <input type="text" name="price"  class="form_input input-product-price"/>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Size</h2></td>
                                   <td>
                                        <input type="text" name="size"  class="form_input input-product-size"/>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Quantity</h2></td>
                                   <td>
                                        <input type="text" name="quantity"  class="form_input input-product-quantity"/>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Description</h2></td>
                                   <td>
                                        <textarea  name="description" rows="5" cols="20" class="form_input input-product-description"> </textarea>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Upload an image</h2></td>
                                   <td>
                                        <input type="file" name="file"/>
                                   </td>
                              </tr>
                         </table>
                         <div class="modal_btn">
                              <input type="submit" class="form_btn" required name="input-product-submit" value="submit" class="input-product-submit" id="input-product-submit">
                              <!-- <input type="submit" class="form_btn" required name="input-product-submit" value="submit" class="input-product-submit" id="but_upload"> -->
                              <input type="reset" class="form_btn"/>
                         </div>
                    </form>
               </div>
          </div>
     </div>
     <script src="./js/modal.js"></script>

     <div class="row-discription">
         
     </div>

     <div class="product-list">
          <table class="product_table">
                <tr>
                    <th>S.No</th>    
                    <th>Img</th>                     
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Unit price</th>
                    <th>Size</th>
                    <th>Description</th>
                    <th>Rating</th>
                    <th>Stock</th>
                    <th>Quantity sold</th>
                    <th>Actions</th>
                </tr>
               <?php
                    require_once("../includes/db_connect.php");
                    $i = 1;
                    $error = false;
                    $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`size`,`description`,`rating`,`stock`,`quantity_sold`,`image_source` FROM product LIMIT 10";
                    $result = mysqli_query($conn,$sql);             
                    if(mysqli_num_rows($result)>0){
                         while($row = mysqli_fetch_assoc($result)) {
               ?>
                         <tr>
                              <td><?=$i++?></td>
                              <td><img class='table-img' src='./uploads/<?=$row['image_source']?>'></img></td>
                              <td><?=$row['product_name']?></td>
                              <td><?=$row['category']?></td>
                              <td><?=$row['unit_price']?></td>
                              <td><?=$row['size']?></td>
                              <td><?=$row['description']?></td>
                              <td><?=$row['rating']?></td>
                              <td><?=$row['stock']?></td>
                              <td><?=$row['quantity_sold']?></td>
                              <div>
                                   <td>
                                   <a href="src/edit_product.php?id=<?= $row['product_id'];?>">
                                             <svg class='icon table-icon table-icon-pencil'>
                                                  <use xlink:href='./img/SVG1/sprite.svg#icon-pencil'></use>
                                             </svg></a>
                                             <a onclick="return confirm('Are you sure you want to delete this entry?')" href="src/delete_product.php?id=<?= $row['product_id'];?>"><img class='table-icon ' src='./icons/trash.png'></img></a>
                                             <!-- <a href=''><img class='table-icon ' src='./icons/trash.png'></img></a> -->
                                        
                                   </td>
                              </div>
                         </tr>
               <?php
                    }
                    $message = "Products Loaded successfully";
                    } else{
                         $message = "No any product in database";
                         $error = true;
                    }
                    $_SESSION['message'] = $message;
                    $_SESSION['error'] = $error;
               ?>
          </table>
     </div>
     <button class="button-load button">Load More</button></br></br></br></br>
   
</div>
</div>

          

<script>	


	$(document).ready(function(){
		// $("#add-form").submit(function(event){
          //      event.preventDefault();
		// 	var product_name = $(".input-product-name").val();
     	// 	var category = $(".input-product-category").val(); 
		// 	var price = $(".input-product-price").val(); 
		// 	var size = $(".input-product-size").val();
		// 	var quantity = $(".input-product-quantity").val(); 
		// 	var description = $(".input-product-description").val();
		// 	var product_submit = $("#input-product-submit").val(); 
		// 	$(".message-box").load("./includes/add_item.php",{
		// 		product_name : product_name,
		// 		category : category,
		// 		price : price,
		// 		size : size,
          //           files:files,
		// 		quantity : quantity,
		// 		description : description,
		// 		product_submit : product_submit
		// 	})
		// }) 
           $(".message-box").load("./includes/popup_message.php");
          var displayCount = 10;
          $(".button-load").click(function(){
               displayCount += 10;
               $(".product_table").load("./includes/display_items.php",{
                  item_to_display: displayCount
               })
              
           })
	});
</script>
  <!-- echo "<script>alert('$limit')</script>"; -->
