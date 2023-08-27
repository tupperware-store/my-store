<?php
include("connect.php");
if (isset($_POST['insert_product'])) {

	$product_cat=$_POST['product_cat'];
    $product_title=$_POST['product_title'];
    $product_des=$_POST['product_des'];
    $product_keyword=$_POST['product_keyword'];
    $product_categories=$_POST['product_categories'];
    $product_dis=$_POST['product_dis'];
    $product_promo=$_POST['product_promo'];
    $product_bprice=$_POST['product_bprice'];
    $product_var=$_POST['product_var'];
    $main_page=$_POST['main_page'];

    //access image
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $product_image4=$_FILES['product_image4']['name'];

    //access image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    $temp_image4=$_FILES['product_image4']['tmp_name'];

    $product_price=$_POST['product_price'];
    $product_stock=$_POST['product_stock'];
    $product_fee=$_POST['product_fee'];
    
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");
    move_uploaded_file($temp_image4,"./product_images/$product_image4");
    $select = "Select * from `products_table` where product_title='$product_title'";
    $result=mysqli_query($con,$select);
    $rows_count=mysqli_num_rows($result);
    if ($rows_count == 1){
        echo "<script>alert('Product title is already in shop.')</script>";
    }
    else{
        $insert_inventory="insert into `product_inventory` (product_title, product_stock) values ('$product_title', '$product_stock')";
        mysqli_query($con, $insert_inventory);
        $insert_products="insert into `products_table` (product_cat, product_title, product_des, product_keyword, product_categories, product_dis, product_promo, product_bprice, product_image1, product_image2, product_image3, product_image4, 
            product_price, product_stock, product_fee, product_var, main_page) values ('$product_cat', '$product_title', '$product_des', '$product_keyword', 
            '$product_categories', '$product_dis', '$product_promo', '$product_bprice', '$product_image1', '$product_image2', '$product_image3', '$product_image4', '$product_price',
            '$product_stock', '$product_fee', '$product_var','$main_page')";
        $result_query=mysqli_query($con, $insert_products);
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

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Products - Admin</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon" />
</head>
<body>
    <div id="insert-pro">
        <h1>INSERT PRODUCT</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form1" id="add_form">
        <div>
                <br />
                <select name="main_page" id="" class="pro-input" >
                    <option value="" disabled selected>Select if it goes to the main page or in All products </option>
                    <option value='Main Page'> Main Page </option>
                    <option value=''> All Products </option>
                </select>
            </div>
            <div>
                <br />
                <select name="product_cat" id="" class="pro-input" >
                    <option value="" disabled selected>Select Main Category</option>
                    <?php
                        $select_query="Select * from `main_cat`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $type_name=$row['category_title'];
                            echo "<option value='$type_name'> $type_name </option>";
                        }
                    ?>
                    <option value=''> No Category </option>
                </select>
            </div>
            <div>
                <label for="product_title" class="pro-label">Product Title</label>
                <br />
                <input type="text" class="pro-input" name="product_title" id="product_title"
                       placeholder="Insert Name of Product" autocomplete="off" required="required" />
            </div>

            <div>
                <label for="product_des" class="pro-label">Product Description</label>
                <br />
                <textarea class="pro-input" name="product_des" id="product_des"
                       placeholder="Insert Description of Product" autocomplete="off" required="required"></textarea>
            </div>
            <div style='margin-bottom: 0px;'>
                <br />
                <select name="product_var" id="" class="pro-input">
                    <option value="" disabled selected>Select Variation</option>
                    <?php
                        $select_query="Select * from `var_name`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $type_name=$row['type_name'];
                            echo "<option value='$type_name'> $type_name </option>";
                        }
                        
                    ?>
                    <option value=''> No Variety </option>

                </select>
                <div style='margin-top: -10px; margin-left: -30px; margin-bottom: 10px;'>
                <?php
                    include('connect.php');
		            $select_query="Select * from `var_name`";
		            $exec= mysqli_query($con, $select_query);
		            while($row=mysqli_fetch_assoc($exec)){
			            $type_name=$row['type_name'];
			            $select_var= "Select * from `variety` where type_name= '$type_name'";
			            $exec_select= mysqli_query($con, $select_var);
			            echo "
				            <div class='pro' style='border-radius: 10px; border: 4px solid grey; width: 200px; display: table; justify-content: center; flex-wrap: wrap; margin: 30px; padding: 15px 15px 15px 15px; '>
				            <p style='margin-top: 30px; font-weight: 900; margin-top: 0px; font-size: 30px;'>$type_name</p>";
			            while($row_1=mysqli_fetch_assoc($exec_select)){
				            $name_var=$row_1['name_var'];				
				            echo "<p style='color: black; font-size: 20px; font-weight: 900;'>$name_var</p>";
			}
			echo "</div>";
		}
                ?>
                </div>
            </div>
            <div>
                <label for="product_key" class="pro-label" style='margin-top: -20px;'>Keyword</label>
                <br />
                <input type="text" class="pro-input" name="product_keyword" id="product_key"
                       placeholder="Insert Product Key" autocomplete="off" required="required" />
            </div>

            <div>
                <br />
                <select name="product_categories" id="" class="pro-input" required="required" >
                    <option value="" disabled selected>Select Other Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'> $category_title</option>";
                        }
                    ?>


                </select>
            </div>
           
            <br/>

            <div id="discount-page">
                
                <div id="sec">
                <label for="product_dis" id="pro-label">Discount</label>
                <input type="text" class="pro-input" name="product_dis" id="product_key"
                       placeholder="Insert Product Discount" autocomplete="off"  />
                </div>
                <div id="sec">
                <label for="product_promo" id="pro-label">Promo</label>
                <input type="text" class="pro-input" name="product_promo" id="product_key"
                       placeholder="Insert Product Promo" autocomplete="off" />
                </div>
                <div id="sec">          
                <label for="product_bprice" id="pro-label">Product Before Discount</label>
                <input type="text" class="pro-input" name="product_bprice" id="product_key" placeholder="Insert Price Before Discount" autocomplete="off" />
                </div>
                
            </div>


            <div>
                <div>
                    <label for="product_image1" class="pro-label">Image 1</label><br />
                    
                    <input type="file" name="product_image1" id="product_image1"
                           class="pro-img" required="required" />
                </div>
                <div>
                    <label for="product_image2" class="pro-label">Image 2</label><br />
                    
                    <input type="file" name="product_image2" id="product_image2"
                           class="pro-img" required="required" />
                </div>
                <div>
                    <label for="product_image3" class="pro-label">Image 3</label><br />
                    
                    <input type="file" name="product_image3" id="product_image3"
                           class="pro-img" required="required" />
                </div>

                <div>
                    <label for="product_image4" class="pro-label">Image 4</label><br />
                    
                    <input type="file" name="product_image4" id="product_image4"
                           class="pro-img" required="required" />
                </div>
            </div>
            
            <div>
                <div>
                    <label for="product_price" class="pro-label">Price</label>
                    <br />
                    <input type="text" class="pro-input" name="product_price" id="product_price"
                           placeholder="Insert Product Price" autocomplete="off" required="required" />
                </div>
                <div id="discount-page">
                    <div id="sec">
                    <label for="product_stock" class="pro-label">Stock</label>
                    
                    <input type="text" class="pro-input" name="product_stock" id="product_stock"
                           placeholder="Insert Product Stock" autocomplete="off" required="required"/>
                
                    </div>
                    <div id="sec" class="fee">
                    <label for="product_fee" class="pro-label">Delivery Fee</label>
                    
                    <input type="text" class="pro-input" name="product_fee" id="product_fee"
                           placeholder="Insert Fee" autocomplete="off" required="required"/>
                
                    </div>
                </div>
            </div>
            


            <div class="input-group-button">
                <input type="submit"  name="insert_product" value="Submit" class="submit-button" id="add_btn"/>
            </div>

        </form>
    </div>
    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

    

</body>
</html>