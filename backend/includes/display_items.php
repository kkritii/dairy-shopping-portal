<!-- <tr> -->
    <th>S.No</th>                     
    <th>Product Name</th>
    <th>Category</th>
    <th>Unit price</th>
    <th>Size</th>
    <th>Description</th>
    <th>Rating</th>
    <th>Stock</th>
    <th>Quantity sold</th>
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
        $sql = "SELECT `product_name`,`category`,`unit_price`,`size`,`description`,`rating`,`stock`,`quantity_sold` FROM product LIMIT $limit";

         $result = mysqli_query($conn,$sql);

         if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                        <td>".$i++."</td>
                        <td>".$row['product_name']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['unit_price']."</td>
                        <td>".$row['size']."</td>
                        <td>".$row['description']."</td>
                        <td>".$row['rating']."</td>
                        <td>".$row['stock']."</td>
                        <td>".$row['quantity_sold']."</td>
                    </tr>
                ";
            }
            $error = false;
            $message="successsfully loaded";
         }
    }
    $_SESSION['message'] = $message;
    $_SESSION['error'] = $error;
?>