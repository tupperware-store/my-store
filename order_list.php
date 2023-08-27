<?php
include("connect.php");
include("common_function.php");

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title >Tupperware</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon"/>
</head>

<body id="bod">
    <section id="header">
    <?php
        if (isset($_GET['username'])) {
	        $username=$_GET['username'];
            $select_1=mysqli_query($con, "Select * from `cart_details`");
            $cart_number=mysqli_num_rows($select_1);
            $username=$_GET['username'];
            $select_2=mysqli_query($con, "Select * from `user_order` where order_status IN ('PENDING', 'SHIPPED OUT')");
            $order_number=mysqli_num_rows($select_2);
        echo "
        <a href='../website/index.php?username=$username'><img src='img/logo.png' class='logo' alt='' /></a>
        <div>
            
            <ul id='navbar'>
            
                <li><a id='nav-name' href='../website/index.php?username=$username'>Home</a></li>
                <li><a id='nav-name' href='../website/products.php?username=$username'>Products</a></li>
                <li><a id='nav-name' href='about.html'>About</a></li>
                <li><a id='nav-name' href='contact.html'>Contact</a> </li>                
                <li><a style='zoom: 1.5;' id='cart-bag' href='../website/cart.php?username=$username' title='See Items in cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>
                <p id='quantity_2' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$cart_number</p>
                
                <li><a style='zoom: 1.5;' id='cart-bag' href='../website/order_list.php?username=$username' title='Orders'><i class='fa fa-shopping-bag' aria-hidden='true'></i></a></li>
                <p id='quantity_1' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$order_number</p>
                <a href='#' id='close' ><i class='fa fa-times'></i></a>

            </ul>

        </div>
        <div id='mobile'>
         
                <a style='zoom: 1.5;' id='cart' href='../website/cart.php?username=$username' title='See Items in cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
                <p id='quantity_2' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$cart_number</p>
                <a style='zoom: 1.5;' id='cart' href='../website/order_list.php?username=$username' title=See status of ordered items''><i class='fa fa-shopping-bag' aria-hidden='true'></i></a>
                <p id='quantity_1' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$order_number</p>

            <i id='bar' class='fa fa-outdent'></i>
        </div>";
    }
        ?>
	</section>

<section id="list1">
<h1>PENDING ORDER</h1>
<div id="insert-pro">
	
	<br/>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Quantity</th>
				<th>Product Title</th>
				<th>Variation</th>
				<th>Total Payment</th>
				<th>Cancel</th>
				<th>  </th>
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
        if(isset($_GET['username'])){
		$get_users="Select * from `user_order` where order_status IN ('PENDING', 'SHIPPED OUT') and username='$username'";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$quantity=$row['quantity'];
			$order_status=$row['order_status'];
			$total_payment=$row['total_payment'];
			$pro_var=$row['pro_var'];
            $product_cart_id=$row['product_cart_id'];
			$number++;
			if($order_status == "SHIPPED OUT"){
				$orders = "<td><a style='color: #772b2b; zoom: 2; ' href='delivered.php?product_id=$product_cart_id&username=$username'><button id='button_order_del'>DELIVERED</button></i></a></td>";
					$cancel ="<td><a style='font-size:30px; zoom: 1.5; color: #772b2b; opacity: 0.6; pointer-events: none;' href='cancel.php?product_id=$product_cart_id&username=$username'><i class='fa fa-ban' style='zoom: 2;' aria-hidden='true'></i></a></td>";

			}else{
				$orders = "<td><a   style='zoom: 2; color: #772b2b; opacity: 0.6; pointer-events: none;' href='delivered.php?product_id=$product_cart_id&username=$username'><button id='button_order' disabled>DELIVERED</button></i></a></td>";
				$cancel = "<td><a  font-size:30px; style='color: #772b2b' href='cancel.php?product_id=$product_cart_id&username=$username'><i class='fa fa-ban' aria-hidden='true' style='zoom: 2;'></i></a></td>";
			}
			echo "<tr>
				<td style='zoom: 2.5;'>$number</td>
				<td style='zoom: 2.5;'>x$quantity</td>
				<td style='zoom: 2.5;'>$product_title</td>
				<td style='zoom: 2.5;'>$pro_var</td>
				<td class='price' style='zoom: 2.5;'>$total_payment</td>
				$cancel
				$orders
			</tr>";
		}
		}
		?>
			
		</tbody>
	</table>
    </div>
</section> 


<section id="list1" style='justify-content: center;'>
<h1>FINISHED ORDER</h1>
<div id="insert-pro">
	
	<br/>
	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Quantity</th>
				<th>Product Title</th>
				<th>Variation</th>
				<th>Total Payment</th>


			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
        if(isset($_GET['username'])){
		$username=$_GET['username'];
		$get_users="Select * from `user_order` where order_status='DELIVERED' and username='$username'";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$quantity=$row['quantity'];
			$order_status=$row['order_status'];
			$total_payment=$row['total_payment'];
			$pro_var=$row['pro_var'];
            $product_cart_id=$row['product_cart_id'];
			$number++;
			
			echo "<tr>
				<td style='zoom: 2.5;'>$number</td>
				<td style='zoom: 2.5;'>x$quantity</td>
				<td style='zoom: 2.5;'>$product_title</td>
				<td style='zoom: 2.5;'>$pro_var</td>
				<td class='price' style='zoom: 2.5;'>$total_payment</td>

			</tr>";
		}
		}
		?>
			
		</tbody>
	</table>
    </div>
</section> 

<section id="list1">
<h1>CANCELLED</h1>
<div id="insert-pro" >
	

	<table class="table">
		<thead class="tbhead">
			<tr>
				<th>No. </th>
				<th>Quantity</th>
				<th>Product Title</th>
				<th>Variation</th>
				<th>Total Payment</th>
				<th>Status</th>

				<th>  </th>
			</tr>
		</thead>
		<tbody class="tbbody">
		<?php
		include('connect.php');
        if(isset($_GET['username'])){
		$get_users="Select * from `user_order` where order_status='CANCELLED' and username='$username'";
		$results=mysqli_query($con,$get_users);
		$number=0;
		while($row=mysqli_fetch_assoc($results)){
			$product_title=$row['product_title'];
			$quantity=$row['quantity'];
			$order_status=$row['order_status'];
			$total_payment=$row['total_payment'];
			$pro_var=$row['pro_var'];
            $product_cart_id=$row['product_cart_id'];
			$number++;

			echo "<tr>
				<td style='zoom: 2.5;'>$number</td>
				<td style='zoom: 2.5;'>x$quantity</td>
				<td style='zoom: 2.5;'>$product_title</td>
				<td style='zoom: 2.5;'>$pro_var</td>
				<td class='price' style='zoom: 2.5;'>$total_payment</td>
				<td style=''>$order_status</td>
				<td style='zoom: 2.5;'><a style='color: #772b2b;' href='order_again.php?product_id=$product_cart_id&username=$username'><button id='button_order_del'>ORDER AGAIN</button></i></a></td>

			</tr>";
		}
		}
		?>
			
		</tbody>
	</table>
    </div>
</section> 

   <script>
    const productContainers = [...document.querySelectorAll('#pro-con')];
    const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];

    productContainers.forEach((item, i) => {
    let containerDimenstions = item.getBoundingClientRect();
    let containerWidth = containerDimenstions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>