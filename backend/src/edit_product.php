<?php
$p_id = @$_GET['id'];
// if (!isset($p_id)) {
// 	header('Location: product.php');
// }
require_once("../includes/db_connect.php");
$sql = "SELECT * FROM `product` WHERE `product_id`='$p_id' Limit 0, 10";
$result = mysqli_query($conn, $sql);
$prev_data = mysqli_fetch_assoc($result);


if (isset($_POST['add_product'])) {
	$p_id = $_GET['id'];
	$p_name=$_POST['product_name'];
	$c = $_POST['category'];
    $pr = $_POST['price'];
    $s = $_POST['size'];
    $d = $_POST['description'];
	$st = $_POST['stock'];
	$ph=$_POST['photo'];
	

	$sql = "UPDATE `product` SET `product_name`='$p_name', `category`='$c', `unit_price`='$pr', `size`='$s', `description`='$d', `stock`='$st', `image_source`='$st' WHERE `product_id`='$p_id';";
	require_once("../includes/db_connect.php");

	if (mysqli_query($conn, $sql)) {
		header('Location:../index.php');
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>
<html>
<head>
<link rel="stylesheet" href="./css/modal-add.css" />
</head>
<body>




	<h1>Update product#<?= $prev_data['product_id'];?></h1>
	<form action="" method="POST" name="product">
		<table>
		    <tr>
				<td>photo</td>
				<td><input type="file" name="photo"></td>
			</tr>
			<tr>
				<td>Product-name</td>
				<td><input type="text" name="product_name" placeholder="Enter product name" required="required" value="<?= $prev_data['product_name'];?>"></td>
			</tr>
			<tr>
				<td>Category</td>
				<td>
			<select name="category" required="required" value="<?= $prev_data['category'];?>">
                                             <option value="yogurt">Yogurt</option>
                                             <option value="cake">Cake</option>
                                             <option value="butter">Butter</option>
                                             <option value="cheese">Cheese</option>
                                        </select>


               </td>
				<!-- <td>Category</td>
				<td><input type="text" name="category" required="required" value="<?= $prev_data['category'];?>"></td> -->
			</tr>
            <tr>
				<td>Price</td>
				<td><input type="number" name="price" required="required" value="<?= $prev_data['unit_price'];?>"></td>
			</tr>
            <tr>
				<td>Size</td>
				<td><input type="text" name="size" required="required" value="<?= $prev_data['size'];?>"></td>
			</tr>
            <tr>
				<td>Description</td>
				<td><input type="text" name="description" required="required" value="<?= $prev_data['description'];?>"></td>
			</tr>
            <tr>
				<td>Stock</td>
				<td><input type="text" name="stock" required="required" value="<?= $prev_data['stock'];?>"></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="add_product" value="UPDATE"></td>
			</tr>
		</table>
	</form>
	</body>
	</html>

