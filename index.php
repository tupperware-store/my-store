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
    <link href="/website/style.css" rel="stylesheet" />
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
        ?>
    </section>

    <section class="hero">
        <h4>Tupperware Brands</h4>
        <h2>Join the Tupperware</h2>
        <h1>Family</h1>
        <p>Host the perfect favorite dishes anytime, anywhere</p>
        <button ><a class="shop-btn" href='../website/products.php?username=<?php $username?>'>Shop Now</a></button>
    </section>
           <?php
                include("connect.php");
                //$select_query="Select * from `products_table` where products_cat= 'Featured Products'";
                if (isset($_GET['username'])) {
	                $username=$_GET['username'];
                    $query="Select * from `main_cat` where status='active'";
                    $select=mysqli_query($con, $query);
                    while($fetch=mysqli_fetch_assoc($select)){
                        $category_title=$fetch['category_title'];
                        
                        $select_main=mysqli_query($con,"Select * from `products_table` where main_page='Main Page' and product_cat='$category_title'");
                        $row_1=mysqli_fetch_assoc($select_main);

                            $main_page_1=$row_1['main_page'];
                            $product_cat_1=$row_1['product_cat'];
                            echo "  <section id='fproduct' class='pro-con'>
                                    <div id='headings'>
                                    <h2>$product_cat_1</h2>
                                    <p>Tupperware bundles and more</p>
                                    </div>
                                    <div id='pro-con'>";
                            $select_query="Select * from `products_table` where product_cat='$product_cat_1' and main_page='Main Page' order by RAND()";
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
                                $product_cat=$row['product_cat'];
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
                        
                            echo "  </div>
                                    
                                    </section>";
                        }
                }
                
                else{
                  
                }
                
                    
                
        ?>


    

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
    <script>
        const productContainers = [...document.querySelectorAll("#pro-con")];
        const nxtBtn = [...document.querySelectorAll(".next-btn")];
        const preBtn = [...document.querySelectorAll(".pre-btn")];
        productContainers.forEach((item, i) => {
            let containerDimentions = item.getBoundingClientRect();
            let containerWidth = containerDimentions.width;
            nxtBtn[i].addEventListener('click', () => {
                item.scrollLeft += containerWidth;
            })
            preBtn[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
        })
    })
    </script>
</body>
</html>