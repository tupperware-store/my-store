<?php
include('connect.php');
if (isset($_GET['delete_product'])) {
	$delete_id=$_GET['delete_product'];
	$delete_product="Delete from `products_table` where product_id=$delete_id";
	$result_product=mysqli_query($con,$delete_product);
	if ($result_product) {
		echo "<script>window.open('./admin.php?view_products','_self')</script>";
}
}
?>