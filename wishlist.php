<?php
    include("connect.php");
        if (isset($_GET['user_name'])) {
            if (isset($_GET['add_to_cart'])) {
                
                $username=$_GET['user_name'];
                $get_product_id=$_GET['add_to_cart'];
                $get_data="Select * from `products_table` where product_id='$get_product_id'";
                $result=mysqli_query($con,$get_data);
                $row=mysqli_fetch_assoc($result);
                $type_var=$row['product_var'];
                $main_image=$row['product_image1'];
                $product_title=$row['product_title'];
                $product_price=$row['product_price'];
                
                
                $select_query="Select * from `wishlist` where product_id='$get_product_id'";
                $results=mysqli_query($con, $select_query);
                $rows_count=mysqli_num_rows($results);
                if ($rows_count == 0) {
                    $insert_products="insert into `wishlist` (main_image, product_title, username, product_id, number_of_items) values ('$main_image', '$product_title', '$username', '$get_product_id', 1)";
                    $result_query=mysqli_query($con,$insert_products);
                    echo "<script>alert('Successfully added to wishlist.')</script>";
                    echo "<script>window.open('./index.php?username=$username','_self')</script>";
                }else {
                    $select_query_1="Select * from `wishlist` where product_id='$get_product_id'";
                    $results_1=mysqli_query($con, $select_query_1);
                    $rows_counts=mysqli_num_rows($results_1);
                    if ($rows_counts == 0){
                        $insert_products="insert into `wishlist` (main_image, product_title, username, product_id, number_of_items) values ('$main_image', '$product_title', '$username', '$get_product_id', 1)";
                        $result_query=mysqli_query($con,$insert_products);
                        echo "<script>alert('Successfully added to wishlist.')</script>";
                        echo "<script>window.open('./index.php?username=$username','_self')</script>";
                    }
                    else{
                        

                        $select_query_2="Select * from `wishlist` where product_id='$get_product_id'";
                        $results_2=mysqli_query($con, $select_query_2);
                        while($fetch=mysqli_fetch_assoc($results_2)){
                        
                        $number=$fetch['number_of_items'];
                        
                        $update="Update `wishlist` set number_of_items=$number + 1 where product_id = '$get_product_id'";
                        mysqli_query($con, $update);
                        }
                        echo "<script>alert('Successfully added to wishlist.')</script>";
                        echo "<script>window.open('./index.php?username=$username','_self')</script>";
                    }
                    
                    

                    
                }
            }
        }     
    
?>

