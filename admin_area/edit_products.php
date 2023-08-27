    <?php
    include('connect.php');
if(isset($_GET['edit_products'])){
	$edit_id=$_GET['edit_products'];
	$get_data="Select * from `products_table` where product_id='$edit_id'";
    $result=mysqli_query($con,$get_data);
    
    $row=mysqli_fetch_assoc($result);
    $product_cat=$row['product_cat'];
    $product_title=$row['product_title'];
    
    $product_des=$row['product_des'];
    $product_keyword=$row['product_keyword'];
    $product_categories=$row['product_categories'];
    $product_dis=$row['product_dis'];
    $product_promo=$row['product_promo'];
    $product_bprice=$row['product_bprice'];
    $product_var=$row['product_var'];
    
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_image4=$row['product_image4'];

    $product_price=$row['product_price'];
    $product_stock=$row['product_stock'];
    $main_page=$row['main_page'];
    $product_fee=$row['product_fee'];
    $product_stock=$row['product_stock'];
    $product_var=$row['product_var'];
                    
}
?>
<?php
include('connect.php');
?>
<div id="insert-pro">
        <h1>EDIT PRODUCT</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form1">
                <div>
                    <?php
                    if($main_page == ''){
                        echo "<select name='main_page' id='' class='pro-input' value='All Products'>
                    <option value='' disabled >Select if it goes to the main page or in All products </option>
                    <option value='Main Page'> Main Page </option>
                    <option value=''> All Products </option>
                    </select>";
                    }
                    else{
                        echo "<select name='main_page' id='' class='pro-input' value='Main Page'>
                    <option value='' disabled >Select if it goes to the main page or in All products </option>
                    <option value='Main Page'> Main Page </option>
                    <option value=''> All Products </option>
                    </select>";
                    }
                    ?>
                    
                </div>
            
            <div>
                <br />
                
                    
                    <?php
                        if($product_cat == ''){
                            echo "<select name='product_cat' id='' class='pro-input' value='$product_cat' >
                                  <option value='' disabled selected>Select Main Category</option>";
                            $select_query="Select * from `main_cat`";
                            $result_query=mysqli_query($con,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                            $type_name=$row['category_title'];
                            echo "<option value='$type_name'> $type_name </option>";
                            }
                            echo "</select>";
                        }
                        else{
                            echo "<select name='product_cat' id='' class='pro-input' value='$product_cat' >
                                  <option value='' disabled>Select Main Category</option>";
                            $select_query="Select * from `main_cat`";
                            $result_query=mysqli_query($con,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                            $type_name=$row['category_title'];
                            echo "<option value='$type_name'> $type_name </option>";
                        }
                        echo "</select>";
                        }
                    ?>
                
            </div>
            <div>
                <label for="product_title" class="pro-label">Product Title</label>
                <br />
                <input type="text" class="pro-input" name="product_title" id="product_title"
                       placeholder="Insert Name of Product" value="<?php echo $product_title ?>" autocomplete="off" required="required" />
            </div>

            <div>
                <label for="product_des" class="pro-label">Product Description</label>
                <br />
                <textarea class="pro-input" name="product_des" id="product_des"
                       placeholder="Insert Description of Product" value="<?php echo $product_des?>" autocomplete="off" required="required"></textarea>
            </div>
            <div>
                <br />
                <select name="product_var" value="<?php echo $product_var?>" id="" class="pro-input">
                    <option value="" disabled>Select Variation</option>
                    <?php
                        $select_query="Select * from `var_name`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $type_name=$row['type_name'];
                            echo "<option value='$type_name'> $type_name </option>";
                        }
                    ?>


                </select>
            </div>
            <div>
                <label for="product_key" class="pro-label">Keyword</label>
                <br />
                <input type="text" class="pro-input" name="product_keyword" id="product_key"
                       placeholder="Insert Product Key" value="<?php echo $product_keyword?>" autocomplete="off" required="required" />
            </div>

            <div>
                <br />
                <select name="product_categories" value="<?php echo $product_categories?>" id="" class="pro-input" required="required" >
                    <option value="" disabled>Select Other Category</option>
                    <?php
                        include('connect.php');
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
                       placeholder="Insert Product Discount" value="<?php echo $product_dis?>" autocomplete="off"  />
                </div>
                <div id="sec">
                <label for="product_promo" id="pro-label">Promo</label>
                <input type="text" class="pro-input" name="product_promo" id="product_key"
                       placeholder="Insert Product Promo" value="<?php echo $product_promo?>" autocomplete="off" />
                </div>
                <div id="sec">          
                <label for="product_bprice" id="pro-label">Product Before Discount</label>
                <input type="text" class="pro-input" name="product_bprice" value="<?php echo $product_bprice?>" id="product_key" placeholder="Insert Price Before Discount" autocomplete="off" />
                </div>
            </div>


            <div>
                <div>
                    <label for="product_image1" class="pro-label">Image 1</label><br />
                    <div class="pics">
                        <div>
                            <input type="file" name="product_image1" id="product_image1"
                           class="pro-img" required="required"  />
                           </div>
                        <div>
                           <img width="100" src='./product_images/<?php echo $product_image1?>'>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="product_image2" class="pro-label">Image 2</label><br />
                    
                    <div class="pics">
                        <div>
                            <input type="file" name="product_image2" id="product_image2"
                           class="pro-img" required="required" />
                           </div>
                        <div>
                           <img width="100" src='./product_images/<?php echo $product_image2?>'>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="product_image3" class="pro-label">Image 3</label><br />
                    
                    <div class="pics">
                        <div>
                            <input type="file" name="product_image3" id="product_image3"
                           class="pro-img" required="required" />
                           </div>
                        <div>
                           <img width="100" src='./product_images/<?php echo $product_image3?>'>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="product_image4" class="pro-label">Image 4</label><br />
                    
                    <div class="pics">
                        <div>
                            <input type="file" name="product_image4" id="product_image4"
                           class="pro-img" required="required"  />
                           </div>
                        <div>
                           <img width="100" src='./product_images/<?php echo $product_image4?>'>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <div>
                    <label for="product_price" class="pro-label">Price</label>
                    <br />
                    <input type="text" class="pro-input" name="product_price" id="product_price"
                           placeholder="Insert Product Price" value="<?php echo $product_price?>" autocomplete="off" required="required" />
                </div>

                <div id="discount-page">
                    <div id="sec">
                    <label for="product_stock" class="pro-label">Stock</label>
                    <br />
                    <input type="text" class="pro-input" name="product_stock" id="product_stock"
                           placeholder="Insert Product Stock" value="<?php echo $product_stock?>" autocomplete="off" required="required"/>
                    </div>

            
                      <div id="sec" class="fee">
                    <label for="product_fee" class="pro-label">Delivery Fee</label>
                    
                    <input type="text" class="pro-input" name="product_fee" id="product_fee" value='<?php echo $product_fee?>'
                           placeholder="Insert Fee" autocomplete="off" required="required"/>
                
                    </div>
                </div>

            <div class="input-group-button">
                <input type="submit"  name="edit_products" value="Update" class="submit-button" />
            </div>

        </form>
    </div>
<?php
    if(isset($_POST['edit_products'])){
        $product_cat=$_POST['product_cat'];
        $product_title=$_POST['product_title'];
        $product_des=$_POST['product_des'];
        $product_keyword=$_POST['product_keyword'];
        $product_categories=$_POST['product_categories'];
        $product_dis=$_POST['product_dis'];
        $product_promo=$_POST['product_promo'];
        $product_bprice=$_POST['product_bprice'];

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

        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        move_uploaded_file($temp_image4,"./product_images/$product_image4");
        $update_products="Update `products_table` set product_cat='$product_cat', product_title='$product_title', 
        product_des='$product_des', product_keyword='$product_keyword', product_categories='$product_categories', product_dis='$product_dis', 
        product_promo='$product_promo', product_bprice='$product_bprice', product_image1='$product_image1', 
        product_image2='$product_image2', product_image3='$product_image3', product_image4='$product_image4', 
        product_price='$product_price', product_stock='$product_stock' where product_id='$edit_id'";

    $result_update=mysqli_query($con,$update_products);
    if ($result_update) {
       
        echo "<script>window.open('./admin.php?view_products','_self')</script>";
    }

    }
    
    ?>