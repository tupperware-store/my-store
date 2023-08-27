<?php
    include("connect.php");
    
    if (isset($_GET['username'])) {
        $username=$_GET['username'];
        if (isset($_GET['cart_adding'])) {
	    

            $main_image=$_FILES['main_image']['name'];
            $temp_image1=$_FILES['product_image1']['tmp_name'];
            $product_title=$_POST['product_title'];
            $product_stock=$_POST['product_var'];
            $quantity=$_POST['quantity'];
            move_uploaded_file($temp_image1,".admin_area/order_images/$main_image");
            $total_payment=['total_payment'];
            $insert_products="insert into `cart_details` (username, main_image, product_title, product_var, quantity, 
            total_payment) values ('$username', '$main_image', '$product_title', '$product_var', '$quantity', '$total_payment')";
            $result_query=mysqli_query($con,$insert_products);
            if ($result_query) {
                echo "<script>alert('Successfully entered the products.')</script>";
            
                header("Refresh:0");
            }else {
                echo "<script>alert('Something went wrong.')</script>";
             header("Refresh:0");
            }
        }
    }  
?>
