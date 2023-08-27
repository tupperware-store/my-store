<?php
    include("connect.php");
        if (isset($_GET['username'])) {
            if (isset($_GET['cart_adding'])) {
                
                $username=$_GET['username'];
                $get_product_id=$_GET['cart_adding'];
                $get_data="Select * from `products_table` where product_id='$get_product_id'";
                $result=mysqli_query($con,$get_data);
                $row=mysqli_fetch_assoc($result);
                $type_var=$row['product_var'];
                $main_image=$row['product_image1'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
                $quantity=$_POST['quantity'];
                $pro_var=$_POST['pro_var'];
                $product_fee=$row['product_fee'];
                
                $select_query="Select * from`cart_details` where username='$username' and product_title='$product_title' and pro_var='$pro_var'";
                $result_1=mysqli_query($con, $select_query);
                $rows_count=mysqli_num_rows($result_1);

                if ($rows_count>0) {
                    echo "<script>alert('Product Already Exist in cart.')</script>";
                    echo "<script>window.open('./cart.php?username=$username','_self')</script>";
                }else {
                    $insert_products="insert into `cart_details` (main_image, product_title, product_price, quantity, username, pro_var, type_var, product_id, product_fee) values ('$main_image', '$product_title', '$product_price', '$quantity', '$username', '$pro_var', '$type_var', '$get_product_id', '$product_fee')";
                    $result_query=mysqli_query($con,$insert_products);
                    
                    echo "<script>window.open('./cart.php?username=$username','_self')</script>";
                    
                }
            }
        }     
    
?>