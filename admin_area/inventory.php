<section>
<div id="insert-pro">
	<h1>TOTAL ORDER PER ITEM</h1>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Product Title</th>
				<th>No. of items sold</th>
				<th>Product Stock</th>
				<th>Total Payments</th>
				
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
		$get_users="Select * from `product_inventory`";
		
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$total_sold=$row['total_sold'];
			$product_stock=$row['product_stock'];
            $total_income=$row['total_income'];
			$number++;
			echo "<tr>
				<td>$number</td>
				<td>$product_title</td>
				<td>$total_sold</td>
				<td>$product_stock</td>
				<td class='price'>$total_income</td>
				
			</tr>";
			
		}

		
		?>
			
		</tbody>
	</table>
	<div id="totals">
	<?php
			$result_sum=mysqli_query($con, "Select SUM(total_income) AS sum_income from `product_inventory`");
			$row_1 = mysqli_fetch_assoc($result_sum);
			$total=$row_1['sum_income'];
			$result_sum_1=mysqli_query($con, "Select SUM(total_sold) AS sum_qty from `product_inventory`");
			$row_1 = mysqli_fetch_assoc($result_sum_1);
			$total_pay=$row_1['sum_qty'];
			$result_sum_2=mysqli_query($con, "Select SUM(product_stock) AS sum_stock from `product_inventory`");
			$row_2 = mysqli_fetch_assoc($result_sum_2);
			$total_stock=$row_2['sum_stock'];
			echo "<p style='margin-top: 50px'>Total Items on stock: <span>$total_stock</span></p><p>Total Items Sold: <span>$total_pay</span> <p>Total Payments: <span class='price'>$total</span></p>"
	?>
	</div>
    </div>

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