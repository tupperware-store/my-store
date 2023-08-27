<form action="" method="post" class="form">
    <div class="text-group">

        <h4 >Please Enter a Category.</h4>
    </div>
    
    <div class="input-group">

        <input type="text" style="padding-left: 10px" class="form-control1" name="cat_title" placeholder="Enter Category" >
    </div>
    <div class="input-group-button">
        <input type="submit" class="form-control2" name="insert_cat" value="Submit"
               class="bg-info" />
    </div>

</form>


<?php
include("connect.php");
if (isset($_POST['insert_cat'])) {
	$category_title=$_POST['cat_title'];
    

    $insert_query="insert into `categories` (category_title) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if ($result) {
        echo "<script>alert('Category has been inserted successfully')</script>";
	}
}

?>