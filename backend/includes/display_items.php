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
    require_once("./db_connect.php");
    session_start();
    $message="";
    $error = false;
    // echo "<script>alert('Fuck you Bitch')</script>";
    if(isset($_POST["item_to_display"])){
        $i=1;
        $limit = $_POST["item_to_display"];
        $sql = "SELECT `product_id`,`product_name`,`category`,`unit_price`,`size`,`description`,`rating`,`stock`,`quantity_sold`,`image_source` FROM product LIMIT $limit";

        // $sql = "SELECT `product_name`,`category`,`unit_price`,`size`,`description`,`rating`,`stock`,`quantity_sold` FROM product LIMIT $limit";

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
                           <a href=''>
                                <svg class='icon table-icon table-icon-pencil'>
                                     <use xlink:href='./img/SVG1/sprite.svg#icon-pencil'></use>
                                </svg>
                                <a href=''><img class='table-icon ' src='./icons/trash.png'></img></a>
                           </a>
                      </td>
                 </div>
            </tr>
  <?php
       }
            $error = false;
            $message="successsfully loaded";
         }
    }
    $_SESSION['message'] = $message;
    $_SESSION['error'] = $error;
    
?>

<script>	
	$(document).ready(function(){
        $(".message-box").load("./includes/popup_message.php")
	});
</script>