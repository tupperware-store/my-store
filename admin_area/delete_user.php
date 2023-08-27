<?php
include('connect.php');
if (isset($_GET['delete_user'])) {
	$delete_id=$_GET['delete_user'];
	$delete_product="Delete from `user_table` where user_id='$delete_id'";
	$result_product=mysqli_query($con,$delete_product);
	if ($result_product) {
		echo "<script>window.open('./admin.php?list_of_users','_self')</script>";
}
}
?>