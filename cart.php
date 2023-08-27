<?php    
        include('connect.php');
        if (isset($_GET['add_to_cart'])) {	
            $get_product_id=$_GET['add_to_cart'];
            if (isset($_GET['user_name'])) {
                global $con;
                $username=$_GET['user_name'];
                $select_query="SELECT * from `products_table` where product_id=$get_product_id";
                $result_query=mysqli_query($con,$select_query);
        
                while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_cat=$row['product_cat'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_image2=$row['product_image2'];
                $product_image3=$row['product_image3'];
                $product_image4=$row['product_image4'];
                $product_des=$row['product_des'];
                $product_promo=$row['product_promo'];
                $product_bprice=$row['product_bprice'];
                $product_price=$row['product_price'];
                $product_dis=$row['product_dis'];
                $product_stock=$row['product_stock'];
                }
            }
        }
        ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart - Tupperware</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon" />

</head>
<body id="bod">
    <section id="header">
       <?php
        if (isset($_GET['username'])) {
	        $username=$_GET['username'];
            $select_1=mysqli_query($con, "Select * from `cart_details` where username='$username'");
            $cart_number=mysqli_num_rows($select_1);
            $username=$_GET['username'];
            $select_2=mysqli_query($con, "Select * from `user_order` where username='$username' and order_status IN ('PENDING', 'SHIPPED OUT') ");
            $order_number=mysqli_num_rows($select_2);
        echo "
        <a href='../website/index.php?username=$username'><img src='img/logo.png' class='logo' alt='' /></a>
        <div>
            
            <ul id='navbar'>
            
                <li><a id='nav-name' href='../website/index.php?username=$username' >Home</a></li>
                <li><a id='nav-name' href='../website/products.php?username=$username'>Products</a></li>
                <li><a id='nav-name' href='about.html'>About</a></li>
                <li><a id='nav-name' href='contact.html'>Contact</a> </li>                
                <li><a style='zoom: 1.5;' id='cart-bag' href='../website/cart.php?username=$username' title='See Items in cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>
                <p id='quantity_2' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$cart_number</p>
                
                <li><a style='zoom: 1.5;' id='cart-bag' href='../website/order_list.php?username=$username' title=See status of ordered items''><i class='fa fa-shopping-bag' aria-hidden='true'></i></a></li>
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

<section id="prodetails1" >
    <?php

    if (isset($_GET['username'])) {
	$username=$_GET['username'];
    $select_query="SELECT * from `cart_details` where username='$username'";
    $result_query=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result_query);
        if ($rows_count == 0){
            echo "<h1 style='margin: 200px 10px 0px 10px'>Oops! you do not have any items in your cart yet. <a class='shop' href='products.php?username=$username'>Click here to shop now!</a> </h1>";
        }
        else{
            while($row=mysqli_fetch_assoc($result_query)){
                $main_image=$row['main_image'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
                $cart_id=$row['cart_id'];
                $quantity=$row['quantity'];
                $pro_var=$row['pro_var'];
                $product_id=$row['product_id'];
                $product_fee=$row['product_fee'];
                $total= ($product_price * $quantity) + $product_fee;
                echo "<div class='cart_1'>
                <div class='cart_5'>
                <span >Qty: $quantity</span>
                </div>
                <div class='cart_2'>
                <img name='main_image' src='./admin_area/product_images/$main_image' id='MainImg' alt='' />
                </div>
                <div class='cart_3'>
                <h4>$product_title</h4><span>Total:</span><span class='price' style='font-weight: 900'>$total</span><span style='margin-left: 20px'>Variation: $pro_var</span>
                </div>
                <div class='cart_4'>
                <td><a title='Checkout' href='checkout.php?checkout_id=$product_id&username=$username'><i class='fa fa-shopping-basket' aria-hidden='true'></i></a></td>
                </div>
                <div class='cart_4'>
                <td><a title='Delete item from cart' href='delete_cart.php?delete_cart=$cart_id&username=$username'><i class='fa fa-times' aria-hidden='true'></i></a></td>
                </div>
                </div>";
        }
        }
    }
        ?>


</section>




    
    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function () {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function () {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function () {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function () {
            MainImg.src = smallimg[3].src;
        }

        const sizeBtns = document.querySelectorAll('.bundle-radio-btn');
        let checkedBtn = 0;
        sizeBtns.forEach((item, i) => {
            item.addEventListener('click', () => {
                sizeBtns[checkedBtn].classList.remove('check');
                item.classList.add('check');
                checkedBtn = i;
            })
        })
    </script>
    <style>
    .currSign:before {
        content: "Php ";
    }
    </style>
    <script src="script.js"></script>
    <script>
    let x = document.querySelectorAll(".price");
    for (let i = 0, len = x.length; i < len; i++) {
        let num = Number(x[i].innerHTML)
            .toLocaleString('en');
        x[i].innerHTML = num;
       x[i].classList.add("currSign");
    }
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
</body>
</html>


<?php
    include("connect.php");
        if (isset($_GET['username'])) {
            if (isset($_GET['cart_adding'])) {
            
                $username=$_GET['username'];
                $get_product_id=$_GET['cart_adding'];
                $get_data="Select * from `products_table` where product_id='$get_product_id'";
                $result=mysqli_query($con,$get_data);
                $row=mysqli_fetch_assoc($result);
                $main_image=$row['product_image1'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
            
                $quantity=$_POST['quantity'];
                $insert_products="insert into `cart_details` (main_image, product_title, product_price, quantity, username) values ('$main_image', '$product_title', '$product_price', '$quantity', '$username')";
                $result_query=mysqli_query($con,$insert_products);

                if ($result_query) {
                    echo "<script>alert('Successfully entered the products.')</script>";
                    echo "<script>window.open('./index.php?username=$username','_self')</script>";
                    header("Refresh:0");
                }else {
                    echo "<script>alert('Something went wrong.')</script>";
                header("Refresh:0");
                }
            }
        }     
    
?>