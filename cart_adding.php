<?php
if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_product_id=$_GET['add_to_cart'];
        $select_query="Select * from `products_table` where product_id=$get_product_id";
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
<body>
    <section id="header">
        <a href="../website/index.php"><img src="img/logo.png" class="logo" alt="" /></a>
        <div>
            <ul id="navbar">
                <li><a id="nav-name" href="../website/index.php" >Home</a></li>
                <li><a id="nav-name" href="../website/products.php">Products</a></li>
                <li><a id="nav-name" href="about.html">About</a></li>
                <li><a id="nav-name" href="contact.html">Contact</a> </li>
                <li><a id="cart-bag" href="#"><img src="img/cart.png" class="cart" /></a></li>
                <!--<li><a id="cart-bag" ><img src="img/user.png" class="cart" /></a></li>-->

            </ul>

        </div>
        <div id="mobile">

            <a href="cart.html"><img src="img/cart.png" class="cart" /></a>
            <i id="bar" class="fa fa-outdent"></i>
        </div>
    </section>


    <section id="cart-det">
    <form action="" method="post" class="form" enctype="multipart/form-data" autocomplete="off">

        
        
    </form>

    </section>

    <script>
        function detailssubmit() {
            alert("Your details were Submitted");
        }
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type == "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        function myFunction2() {
            var x = document.getElementById("myInput2");
            if (x.type == "password") {
                x.type = "text";
            }
            else {
                x.type = "password";
            }
        }
    </script>

    
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