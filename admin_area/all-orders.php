<section>
	<div id="insert-pro" >
	<h1 style='margin-top: -50px;'>PENDING ORDER</h1>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Username</th>
				<th>Quantity</th>
				<th>Product Title</th>
				<th>Variation</th>
				<th>Total Payment</th>				
				<th>Address</th>
				<th>Full Name</th>
				<th>Date Ordered</th>
				<th>Status</th>
				<th>  </th>
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
		$get_users="Select * from `user_order` where order_status IN ('PENDING', 'SHIPPED OUT')";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$quantity=$row['quantity'];
			$order_status=$row['order_status'];
			$total_payment=$row['total_payment'];
			$pro_var=$row['pro_var'];
            $product_cart_id=$row['product_cart_id'];
			$username=$row['username'];
			$first_name=$row['first_name'];
			$middle_name=$row['middle_name'];
			$last_name=$row['last_name'];
			$address=$row['address'];
			$product_id=$row['product_id'];
			$date=$row['date'];
			$number++;
			if($order_status == "SHIPPED OUT" or $order_status == "DELIVERED"){
				$orders = "<td><a style='color: #772b2b; opacity: 0.6; pointer-events: none;' href='ship_out.php?product_id=$product_id&username=$username'><button id='button_order' disabled>SHIP OUT</button></i></a></td>";
			}else{
				$orders = "<td><a style='color: #772b2b;' href='ship_out.php?product_id=$product_id&username=$username'><button id='button_order_del'>SHIP OUT</button></i></a></td>";

			}
			echo "<tr>
				<td>$number</td>
				<td>$username</td>
				<td>x$quantity</td>
				<td>$product_title</td>
				<td>$pro_var</td>
				<td class='price'>$total_payment</td>
				<td>$address</td>
				<td>$first_name $middle_name $last_name</td>
				<td>$date</td>
				<td>$order_status</td>
				
				$orders
			</tr>";
		}
		
		?>
			
		</tbody>
	</table>
    </div>

</section>

<section>
	<div id="insert-pro">
	<h1 style='margin-top: 0px;'>FINISHED ORDERS</h1>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Username</th>
				<th>Quantity</th>
				<th>Product Title</th>
				<th>Variation</th>
				<th>Total Payment</th>
				
				<th>Address</th>
				<th>Full Name</th>
				<th>Date Ordered</th>
				<th>Status</th>
				<th>  </th>
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
		

		$get_users="Select * from `user_order` where order_status IN ('DELIVERED')";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$quantity=$row['quantity'];
			$order_status=$row['order_status'];
			$total_payment=$row['total_payment'];
			$pro_var=$row['pro_var'];
            $product_cart_id=$row['product_cart_id'];
			$username=$row['username'];
			$first_name=$row['first_name'];
			$middle_name=$row['middle_name'];
			$last_name=$row['last_name'];
			$address=$row['address'];
			$date=$row['date'];
			$number++;
			
			echo "<tr>
				<td>$number</td>
				<td>$username</td>
				<td>x$quantity</td>
				<td>$product_title</td>
				<td>$pro_var</td>
				<td class='price'>$total_payment</td>
				<td>$address</td>
				<td>$first_name $middle_name $last_name</td>
				<td>$date</td>
				<td>$order_status</td>

			</tr>
			";
			
		}	
		?>
		</tbody>
	</table>
	<div id="totals">
	<?php
			$result_sum=mysqli_query($con, "Select SUM(quantity) AS sum_qty from `user_order` where order_status IN ('DELIVERED')");
			$row_1 = mysqli_fetch_assoc($result_sum);
			$total=$row_1['sum_qty'];
			$result_sum_1=mysqli_query($con, "Select SUM(total_payment) AS sum_pay from `user_order` where order_status IN ('DELIVERED')");
			$row_1 = mysqli_fetch_assoc($result_sum_1);
			$total_pay=$row_1['sum_pay'];
			echo "<p>Total Items Sold: <span>$total</span></p> <p>   Total Payments: <span class='price'>$total_pay</span></p>"
	?>
	</div>
    </div>

</section>

<section>
<div id="insert-pro">
	<h1 style='margin-top: 0px;'>CANCELLED ORDERS</h1>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Username</th>
				<th>Quantity</th>
				<th>Product Title</th>
				<th>Variation</th>
				<th>Total Payment</th>
				
				<th>Address</th>
				<th>Full Name</th>
				<th>Date Ordered</th>
				<th>Status</th>
				<th>  </th>
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
		$get_users="Select * from `user_order` where order_status IN ('CANCELLED')";
		
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$quantity=$row['quantity'];
			$order_status=$row['order_status'];
			$total_payment=$row['total_payment'];
			$pro_var=$row['pro_var'];
            $product_cart_id=$row['product_cart_id'];
			$username=$row['username'];
			$first_name=$row['first_name'];
			$middle_name=$row['middle_name'];
			$last_name=$row['last_name'];
			$address=$row['address'];
			$date=$row['date'];
			$number++;
			echo "<tr>
				<td>$number</td>
				<td>$username</td>
				<td>x$quantity</td>
				<td>$product_title</td>
				<td>$pro_var</td>
				<td class='price'>$total_payment</td>
				<td>$address</td>
				<td>$first_name $middle_name $last_name</td>
				<td>$date</td>
				<td>$order_status</td>

			</tr>";
			
		}
		
		?>
			
		</tbody>
	</table>
    </div>

</section>

<section>
<div id="insert-pro">
	<h1 style='margin-top: 0px;'>CUSTOMERS WISHLIST</h1>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Image</th>
				<th>Product Title</th>
				<th>Username</th>

			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
		$get_users="Select * from `wishlist`";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$username=$row['username'];
			$product_id=$row['product_id'];
			$main_image=$row['main_image'];
			$number++;
			echo "<tr>
				<td>$number</td>
				<td><img width='30%' height='70px' src='./product_images/$main_image'></td>
				<td>$product_title</td>
				<td>$username</td>
				
			</tr>";
		}
		
		?>
			
		</tbody>
	</table>
    </div>

</section>


    </script>
    <style>
    .currSign:before {
        content: "Php ";
    }
    </style>
    <script>
    let x = document.querySelectorAll(".price");
    for (let i = 0, len = x.length; i < len; i++) {
        let num = Number(x[i].innerHTML)
            .toLocaleString('en');
        x[i].innerHTML = num;
       x[i].classList.add("currSign");
    }
</script>