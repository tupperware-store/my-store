<?php
include("connect.php");




function getproducts(){
    global $con;
	if (!isset($_GET['category'])) {
        if(isset($_GET['username'])){
            $username=$_GET['username'];
	        $select_query="Select * from `products_table` order by RAND() ";
            $result_query=mysqli_query($con,$select_query);    
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_des=$row['product_des'];
            $product_promo=$row['product_promo'];
            $product_bprice=$row['product_bprice'];
            $product_price=$row['product_price'];
            $product_dis=$row['product_dis'];
            $product_stock=$row['product_stock'];
                    if ($product_promo == ''){
                        $dis_promo="<div><p style='padding-bottom: 22px;'></p></div>";
                        $image="<img style='margin-top: -20px;' src='./admin_area/product_images/$product_image1' alt='' />";
                    }else{
                        $dis_promo="<p class='discount-tag'>$product_promo</p>";
                        $image="<img style='margin-bottom: 5px;' src='./admin_area/product_images/$product_image1' alt='' />";
                    }

                    if ($product_dis == ''){
                        $dis_pro="<br/>";
                    }else{
                        $dis_pro="<p class='discount-tag-1'>$product_dis</p>";
                    }
                    if ($product_bprice == ''){
                        $dis_bprice="";
                    }else{
                        $dis_bprice="<span style='margin-top: 7px; margin-left: 7px; font-size: 15px;'>$product_bprice</span>";
                    }
                    if($product_stock == 0){
                        echo "
                    <div class='pro'>
                    <div class='des'>
                        <p style=' margin-top: -20px; margin-bottom: 0px;'>Product is currently out of stock</p>
                        $dis_pro
                        $image
                        <div class='discount-tag-grp'>
                            $dis_promo
                        </div>
                        
                        <h5 style='margin-top: 10px; margin-bottom: -5px; font-weight: 900;'>$product_title </h5>
                        <div style='display: flex'>
                        <h4 class='price' >$product_price </h4>$dis_bprice
                        </div>
                        <a href='wishlist.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Wishlist</a>
                    </div>
                    </div>";
                    }else{
                    echo "
                        <div class='pro'>
                        <div class='des'>
                        $dis_pro
                        $image
                        <div class='discount-tag-grp'>
                        $dis_promo
                        </div>
                        <h5 style='margin-top: 10px; margin-bottom: -5px; font-weight: 900;'>$product_title </h5>
                        <div style='display: flex'>
                        <h4 class='price' >$product_price </h4>$dis_bprice
                        </div>
                        <a href='cart_product.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Cart</a>
                        </div>
                        </div>";
                }
        }
        }
    }
}
        
function get_unique_categories(){
    global $con;
	if (isset($_GET['category'])) {
        if(isset($_GET['username'])){
            $username=$_GET['username'];
            $category_id=$_GET['category'];
	    $select_query="Select * from `products_table` where product_categories='$category_id' order by RAND()";
        $result_query=mysqli_query($con,$select_query);    
        while($row=mysqli_fetch_assoc($result_query)){
            $product_title=$row['product_title'];
            $product_id=$row['product_id'];
            $product_image1=$row['product_image1'];
            $product_des=$row['product_des'];
            $product_promo=$row['product_promo'];
            $product_bprice=$row['product_bprice'];
            $product_price=$row['product_price'];
            $product_dis=$row['product_dis'];
            $product_stock=$row['product_stock'];
            if ($product_promo == ''){
                        $dis_promo="<div><p style='padding-bottom: 22px;'></p></div>";
                        $image="<img style='margin-top: -20px;' src='./admin_area/product_images/$product_image1' alt='' />";
                    }else{
                        $dis_promo="<p class='discount-tag'>$product_promo</p>";
                        $image="<img style='margin-bottom: 5px;' src='./admin_area/product_images/$product_image1' alt='' />";
                    }

                    if ($product_dis == ''){
                        $dis_pro="<br/>";
                    }else{
                        $dis_pro="<p class='discount-tag-1'>$product_dis</p>";
                    }
                    if ($product_bprice == ''){
                        $dis_bprice="";
                    }else{
                        $dis_bprice="<span style='margin-top: 7px; margin-left: 7px; font-size: 15px;'>$product_bprice</span>";
                    }
                    if($product_stock == 0){
                        echo "
                    <div class='pro'>
                    <div class='des'>
                        <p style=' margin-top: -20px; margin-bottom: 0px;'>Product is currently out of stock</p>
                        $dis_pro
                        $image
                        <div class='discount-tag-grp'>
                            $dis_promo
                        </div>
                        
                        <h5 style='margin-top: 10px; margin-bottom: -5px; font-weight: 900;'>$product_title </h5>
                        <div style='display: flex'>
                        <h4 class='price' >$product_price </h4>$dis_bprice
                        </div>
                        <a href='wishlist.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Wishlist</a>
                    </div>
                    </div>";
                    }else{
                    echo "
                        <div class='pro'>
                        <div class='des'>
                        $dis_pro
                        $image
                        <div class='discount-tag-grp'>
                        $dis_promo
                        </div>
                        <h5 style='margin-top: 10px; margin-bottom: -5px; font-weight: 900;'>$product_title </h5>
                        <div style='display: flex'>
                        <h4 class='price' >$product_price </h4>$dis_bprice
                        </div>
                        <a href='cart_product.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Cart</a>
                        </div>
                        </div>";
                }
        }
        }
    }
}

function search_product(){
    global $con;
    if (isset($_POST['search_product_data'])) {
	    $username=$_GET['username'];
        $search_data_value=$_POST['search_data'];
        $search_query="Select * from `products_table` where product_keyword like '%$search_data_value%' order by RAND()";
        $result_query=mysqli_query($con, $search_query);    
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_des=$row['product_des'];
            $product_promo=$row['product_promo'];
            $product_bprice=$row['product_bprice'];
            $product_price=$row['product_price'];
            $product_dis=$row['product_dis'];
            $product_stock=$row['product_stock'];
            if ($product_promo == ''){
                        $dis_promo="<div><p style='padding-bottom: 22px;'></p></div>";
                        $image="<img style='margin-top: -20px;' src='./admin_area/product_images/$product_image1' alt='' />";
                    }else{
                        $dis_promo="<p class='discount-tag'>$product_promo</p>";
                        $image="<img style='margin-bottom: 5px;' src='./admin_area/product_images/$product_image1' alt='' />";
                    }

                    if ($product_dis == ''){
                        $dis_pro="<br/>";
                    }else{
                        $dis_pro="<p class='discount-tag-1'>$product_dis</p>";
                    }
                    if ($product_bprice == ''){
                        $dis_bprice="";
                    }else{
                        $dis_bprice="<span style='margin-top: 7px; margin-left: 7px; font-size: 15px;'>$product_bprice</span>";
                    }
                    if($product_stock == 0){
                        echo "
                    <div class='pro'>
                    <div class='des'>
                        <p style=' margin-top: -20px; margin-bottom: 0px;'>Product is currently out of stock</p>
                        $dis_pro
                        $image
                        <div class='discount-tag-grp'>
                            $dis_promo
                        </div>
                        
                        <h5 style='margin-top: 10px; margin-bottom: -5px; font-weight: 900;'>$product_title </h5>
                        <div style='display: flex'>
                        <h4 class='price' >$product_price </h4>$dis_bprice
                        </div>
                        <a href='wishlist.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Wishlist</a>
                    </div>
                    </div>";
                    }else{
                    echo "
                        <div class='pro'>
                        <div class='des'>
                        $dis_pro
                        $image
                        <div class='discount-tag-grp'>
                        $dis_promo
                        </div>
                        <h5 style='margin-top: 10px; margin-bottom: -5px; font-weight: 900;'>$product_title </h5>
                        <div style='display: flex'>
                        <h4 class='price' >$product_price </h4>$dis_bprice
                        </div>
                        <a href='cart_product.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Cart</a>
                        </div>
                        </div>";
                }
        }
    }

}





 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  


?>