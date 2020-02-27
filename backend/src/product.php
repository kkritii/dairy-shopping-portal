<!--  -->
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
                    <div class="card-data card-data-1">200</div>
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
                    <div class="card-data card-data-2">2000</div>
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
                    <div class="card-data card-data-3">Rs.1700</div>
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
               Edit Product
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
                  <form  method="POST" id="add-form">
                         <table class="modal_table">
                              <tr class="table_row table_row-category">
                                   <td><h2>Category</h2></td>
                                   <select id="category" class=" input-product-category">
                                        <option value="yogurt">Yogurt</option>
                                        <option value="cream">Cream</option>
                                        <option value="butter">Butter</option>
                                        <option value="cheese">Cheese</option>
                                   </select>
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
                                        <input type="number" name="price"  class="form_input input-product-price"/>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Size</h2></td>
                                   <td>
                                        <input type="number" name="size"  class="form_input input-product-size"/>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Description</h2></td>
                                   <td>
                                        <textarea name="message" rows="5" cols="20" class="form_input input-product-description"> </textarea>
                                   </td>
                              </tr>
                              <tr class="table_row">
                                   <td><h2>Image</h2></td>
                                   <td>
                                        <input type="file" name="image" />
                                   </td>
                              </tr>
                              <!-- <tr>
                                   <td><h2>Date</h2></td>

                                   <td>
                                        <input type="date" size="20" name="date" required class="form_input"/>
                                   </td>
                              </tr> -->
                              
                         </table>
                         <div class="modal_btn">
                              <input type="submit" class="form_btn" required name="input-product-submit" value="submit" class="input-product-submit" id="input-product-submit">
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
                    <th>Product Name</th>
                    <th>Product type</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Quantity</th>
               </tr>
               <tr>
                    <td>1</td>
                    <td>klasdhflk</td>
                    <td>hggvh</td>
                    <td>hjhj</td>
                    <td>hkgkh</td>
                    <td>jhgfhj</td>
               </tr>
               <tr>
                    <td>1</td>
                    <td>klasdhflk</td>
                    <td>hggvh</td>
                    <td>hjhj</td>
                    <td>hkgkh</td>
                    <td>jhgfhj</td>
               </tr>
               <tr>
                    <td>1</td>
                    <td>klasdhflk</td>
                    <td>hggvh</td>
                    <td>hjhj</td>
                    <td>hkgkh</td>
                    <td>jhgfhj</td>
               </tr>
               <tr>
                    <td>1</td>
                    <td>klasdhflk</td>
                    <td>hggvh</td>
                    <td>hjhj</td>
                    <td>hkgkh</td>
                    <td>jhgfhj</td>
               </tr>
          </table>
     </div>
   
</div>
</div>




<script>	
			$(document).ready(function(){
				$("#add-form").submit(function(event){
                         event.preventDefault();
					var product_name = $(".input-product-name").val();
					var category = $(".input-product-category").val(); 
					var price = $(".input-product-price").val(); 
					var size = $(".input-product-size").val(); 
					var description = $(".input-product-description").val(); 
					var product_submit = $("#input-product-submit").val(); 

					$(".form-box").load("./includes/add_item.php",{
						product_name : product_name,
						category : category,
						price : price,
						size : size,
						description : description,
						product_submit : product_submit
					})					

				}) 
			});
</script>