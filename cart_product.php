
<?php    
        include('connect.php');
        if (isset($_GET['add_to_cart'])) {	
            $get_product_id=$_GET['add_to_cart'];
            if (isset($_GET['username'])) {
                global $con;
                $username=$_GET['username'];
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
                $product_var=$row['product_var'];
                $product_categories=$row['product_categories'];
                $product_fee=$row['product_fee'];
                
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
    <title>Add to Cart</title>
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
            if (isset($_GET['add_to_cart'])) {
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
            
                <li><a id='nav-name' href='../website/index.php?username=$username' class='active'>Home</a></li>
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
        }
        ?>
    </section>

<section id="prodetails" >

                <div class='single-pro-image'>
                    <img name='main_image' src='./admin_area/product_images/<?php echo $product_image1?>' id='MainImg' alt='' />

                    <div class='small-img-group'>
                        <div class='small-img-col'>
                            <img src='./admin_area/product_images/<?php echo $product_image1?>' width='100%' class='small-img' alt='' />
                        </div>
                        <div class='small-img-col'>
                            <img src='./admin_area/product_images/<?php echo $product_image2?>' width='100%' class='small-img' alt='' />
                        </div>
                        <div class='small-img-col'>
                            <img src='./admin_area/product_images/<?php echo $product_image3?>' width='100%' class='small-img' alt='' />
                        </div>
                        <div class='small-img-col'>
                            <img src='./admin_area/product_images/<?php echo $product_image4?>' width='100%' class='small-img' alt='' />
                        </div>
                    </div>
                </div>
                <form action="add_to_cart.php?cart_adding=<?php echo $product_id?>&username=<?php echo $username?>" method="post" enctype="multipart/form-data" class="form1">
                    <div class='single-pro-details'>
                        <?php 
                            if($product_cat==''){
                                $product = "Product";
                            }
                            else{
                                $product = $product_cat;
                            }
                        ?>
                        <h6><?php echo $product?> / Tupperware</h6>
                        <div class='discount-tag-grp'>
                            <?php
                            if ($product_dis == '') {
                                echo "<br/>";
                            }
                            else {
                                echo " <p class='discount-tag'>$product_dis</p>";
                                }
                            ?>
                            
                            <?php
                            if ($product_promo == '') {
                                
                            }
                            else {
                                echo " <p class='discount-tag'>$product_promo</p>";
	
                                }
                            ?>

                        </div>
                        <h4 style='font-weight: 900;'><?php echo $product_title?></h4>
                        <span><?php echo $product_bprice?></span>
                        
                        <h2 class='price' id='price'  value='product_price'> <?php echo $product_price?></h2>
                        <p id="stock" style="zoom: 1.3;">Stock: <?php echo $product_stock?></p>
                        <input type="number" name="quantity" value='1' min='1' max='<?php echo $product_stock?>'id="quantity" class="quantity"/>
                        
                        <?php
                        $select_query="Select * from `variety` where type_name='$product_var'";
                        $result_query=mysqli_query($con,$select_query);
                        $select="Select * from `products_table` where product_id='$product_id'";
                        $result=mysqli_query($con,$select);
                        $rows=mysqli_fetch_assoc($result);
                        $pro_var=$rows['product_var'];
                        if($pro_var == ''){
                            echo "<div id='variation1'></div>";
                        }else{
                            echo "<br/><br/><h3>Variations:</h3>
                        <div id='variation'>
                            <br />
                       <select name='pro_var' id='var_select' class='pro-input' required>
                        <option value='' disabled selected>Select Variation</option>";
                        while($row=mysqli_fetch_assoc($result_query)){
                            $name_var=$row['name_var'];
                            echo "<option value='$name_var'> $name_var </option>";
                        }
                        echo "</select>";
                        }
                        ?>
                
                        </div>
                        <h3 class='pro-det'>Product Details</h3>
                        <p class='span-des' ><?php echo $product_des?></><br/>
                        <p id="fee" style="zoom: 1.3; margin-bottom: 0px; ">Delivery Fee: <?php echo $product_fee?></p>
                        <div id="cont" style="justify-content: center; display: flex;">
                       <input type="submit" title="Add to your cart" style=" margin: auto;
    justify-content: center;
    padding: 10px 10px 10px 10px;
    background: #6b0000;
    border-radius: 5px;
    font-weight: 900;
    font-size: 30px;
    color: white;
    transition: 0.7s;
    margin-left: 0px;
    margin-top: 30px;
    height: 70px;
    width: 500px;"  value="ADD TO CART" id='cart-btn'/>
                        </div>
                    </div>
    </form>
    <style>
        #cart-btn:hover{
    border: 1px solid #6b0000 ;
    color: #6b0000;
    background: white;
}
    </style>
</section>

<section id="fproduct" class="pro-con">
        <h2>Related Products</h2>
        <p>Tupperware bundles and more</p>
        <div id="pro-con" style='display: flex;'>
        
        <?php
        include("connect.php");
	    $select_query="Select * from `products_table` where product_categories=$product_categories";
        $result_query=mysqli_query($con,$select_query);    
        while($row1=mysqli_fetch_assoc($result_query)){
            $product_title=$row1['product_title'];
            $product_id=$row1['product_id'];
            $product_image1=$row1['product_image1'];
            $product_des=$row1['product_des'];
            $product_promo=$row1['product_promo'];
            $product_bprice=$row1['product_bprice'];
            $product_price=$row1['product_price'];
            $product_dis=$row1['product_dis'];
            $product_stock=$row1['product_stock'];
            if ($product_promo == ''){
                                    $dis_promo="<div><p style='padding-top: 10px;'></p></div>";
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
                        
                                        <h5 style='margin-top: 10px; margin-bottom: -5px;'>$product_title </h5>
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
                        
                                        <h5 style='margin-top: 10px; margin-bottom: -5px;'>$product_title </h5>
                                        <div style='display: flex'>
                                            <h4 class='price' >$product_price </h4>$dis_bprice
                                        </div>
                                        <a href='cart_product.php?add_to_cart=$product_id&username=$username' id='add-cart-btn' >Add to Cart</a>
                                        </div>
                                        </div>";
                                }
            }
        
        ?>
           
        </div>
    </section>
    <!--<footer class="section-p1">
        <div class="col">
            <img src="img/logo.png" class="logo" alt="" />
            <p><strong>Address: </strong></p>
            <p><strong>Phone: </strong></p>
            <p><strong>Open Hours: </strong></p>
            <div class="follow">
                <h4>Follow Us!</h4>
                <div class="icon">
                    <i class="fa fa-facebook-f"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>

                </div>

            </div>
        </div>
        <div class="col">
            <h4>About us</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms and Condition</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Help</a>
        </div>



    </footer>-->

    
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


