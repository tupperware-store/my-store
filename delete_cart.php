<?php
include('connect.php');
if (isset($_GET['delete_cart'])) {
	if (isset($_GET['username'])) {
		$username=$_GET['username'];
		$delete_cart=$_GET['delete_cart'];
		$delete_carts="Delete from `cart_details` where cart_id=$delete_cart";
		$result_product=mysqli_query($con,$delete_carts);
		if ($result_product) {
			
			echo "<script>window.open('./cart.php?username=$username','_self')</script>";
}
}
}
?>