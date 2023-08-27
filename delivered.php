<?php
include('connect.php');
if (isset($_GET['username'])) {
	if(isset($_GET['product_id']))
	$product_id=$_GET['product_id'];
	$username=$_GET['username'];
	$update="Update `user_order` set order_status='DELIVERED' where product_cart_id='$product_id' and username='$username'";
	$result_product=mysqli_query($con,$update);
	if ($result_product) {
		echo "<script>window.open('../website/order_list.php?username=$username&product_id=$product_id','_self')</script>";
}
}
?>