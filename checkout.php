<?php
include('connect.php');
if (isset($_GET['username'])) {
	if (isset($_GET['checkout_id'])) {
		$username=$_GET['username'];
		$product_id=$_GET['checkout_id'];
		$select_query_1="Select * from `products_table` where product_id='$product_id'";
		$results_1=mysqli_query($con, $select_query_1);
		
		$select_query_2="Select * from `cart_details` where product_id='$product_id'";
		$results_2=mysqli_query($con, $select_query_2);
		
		$select_query_3="Select * from `user_table` where username='$username'";
		$results_3=mysqli_query($con, $select_query_3);
		
		

		$row_1=mysqli_fetch_assoc($results_1);
		$product_title=$row_1['product_title'];
		$product_stock=$row_1['product_stock'];

		$row_2=mysqli_fetch_assoc($results_2);
		$quantity=$row_2['quantity'];
		$pro_var=$row_2['pro_var'];
		$product_price=$row_2['product_price'];
		$cart_id=$row_2['cart_id'];



		$row_3=mysqli_fetch_assoc($results_3);
		$first_name=$row_3['fname'];
		$middle_name=$row_3['mname'];
		$last_name=$row_3['lname'];
		$address=$row_3['address'];
		$total_payment=$product_price*$quantity;

		
		

		

		

		$insert_order="insert into `user_order` (product_title, product_id, username, first_name, middle_name, last_name, address,
						total_payment, quantity, pro_var, order_status) values ('$product_title', '$product_id', '$username', '$first_name',
						'$middle_name', '$last_name', '$address', '$total_payment', '$quantity', '$pro_var', 'PENDING')";
		
		$result_insert=mysqli_query($con, $insert_order);
		if($result_insert){
			
			$delete_query="Delete from `cart_details` where cart_id='$cart_id'";
			mysqli_query($con, $delete_query);
			echo "<script>window.open('../website/order_list.php?username=$username','_self')</script>";
		}
		else{
			echo "<script>alert('Something went wrong.')</script>";
		}
	}
}


?>