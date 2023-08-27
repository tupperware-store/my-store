<?php
include("connect.php");
include("common_function.php")
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tupperware - Products</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon" />
</head>
<body id="pro-bod">

    <section id="header" style="zoom: 0.7;">
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
                <li><a id='nav-name' href='../website/products.php?username=$username' class='active'>Products</a></li>
                <li><a id='nav-name' href='about.html'>About</a></li>
                <li><a id='nav-name' href='contact.html'>Contact</a> </li>                
                <li><a style='zoom: 1.5;' id='cart-bag' href='../website/cart.php?username=$username' title='See Items in cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>
                <p id='quantity_2' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$cart_number</p>
                
                <li><a style='zoom: 1.5;' id='cart-bag' href='../website/order_list.php?username=$username' title=See status of ordered items''><i class='fa fa-shopping-bag' aria-hidden='true'></i></a></li>
                <p id='quantity_1' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$order_number</p>
                <a href='#' id='close' ><i class='fa fa-times'></i></a>
                
            </ul>
            <form class='form' action='search.php?username=$username' method='post' id='search'>
                    <div class='search '>
                            <input type='texts' class='search-box' name='search_data' placeholder='Search' aria-label='Search'/>
                            <input type='submit' class='search-btn' name='search_product_data' value='Search' placeholder='Search'>
                    </div>
            </form>
        </div>
            
        <div id='mobile' style='width: 100%;'>
            <div style='display: flow; width: 100%;' >
                <div style='margin-left: 37%;'>
                    <a style='zoom: 1.5;' id='cart_1' href='../website/cart.php?username=$username' title='See Items in cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
                    <p id='quantity_2' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$cart_number</p>
                    <a style='zoom: 1.5;' id='cart_2' href='../website/order_list.php?username=$username' title=See status of ordered items''><i class='fa fa-shopping-bag' aria-hidden='true'></i></a>
                    <p id='quantity_1' style='background: white; color: black; border-radius: 15px; padding: 0px 0px 0px 0px; width: 20px; height=30px; text-align: center;'>$order_number</p>
                    <i id='bar' class='fa fa-outdent' style='position: absolute; right: 50px; top: 50px; font-size: 30px;'></i>
                </div>
                
            </div>
                <form style='margin-top: 20px; width: 0px;' class='form' action='search.php?username=$username' method='post' style='zoom: 0.9;'>
                    <div class='search' style=''>
                            <input style=' font-size: 150%' type='text' class='search-box' name='search_data' placeholder='ENTER KEYWORD' aria-label='Search'/>
                            <input style='' type='submit' class='search-btn' name='search_product_data' value='SEARCH'>
                            </span>
                    </div>
                </form>
        </div>";
    }
        ?>
        
    </section>


<section id="page-header3">
    </section>

    <section id="header-cat" style="zoom: 0.8;">
        <div  class="underline">
            <div>
                
                <ul id="cat">
                    <h4>Categories|      </h4>
                    <?php
                    if(isset($_GET['username'])){
                        $username=$_GET['username'];
                        $select_categories="Select * from `categories`";
                        $result_categories=mysqli_query($con,$select_categories);
                        while($row_data=mysqli_fetch_assoc($result_categories)){
                        $category_title=$row_data['category_title'];
                        $category_id=$row_data['category_id'];
                            echo "<li><a href='products.php?category=$category_id&username=$username'>$category_title</a></li>";
                    }
                    }
                    ?>
                    <li><a href='../website/products.php?username=<?php echo $username?>'>All Products</a></li>
                </ul>
            </div> 
        </div>
    </section>


 


    <section id="fproduct" class="section-p1" style="zoom:0.5; margin-bottom: 100px;">
        <div class="pro-container">
        <div id='pro-con' style="justify-content: center;
    display: flex;
    text-align: center;
    margin-top: 0px;
    flex-wrap: wrap;
    zoom: 0.72;">
        <?php
        search_product();
        ?>

         

        <!----<div class="pro" onclick="window.location.href = '1product.html';">---->
        </div>
        </div>
    </section>
    

    <!--<section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa fa-arrow-right"></i></a>
    </section>-->

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
    <script src="script.js"></script>

</body>
</html>


<?php ?>