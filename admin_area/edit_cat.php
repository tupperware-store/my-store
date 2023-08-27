
<?php
include("connect.php");
if (isset($_GET['edit_category'])) {
	$edit_category=$_GET['edit_category'];
    $select_data="Select * from `categories` where category_id='$edit_category'";
    $result=mysqli_query($con,$select_data);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
}
if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    
    $update_category="Update `categories` set category_title='$cat_title' where category_id=$edit_category";

    $result_update=mysqli_query($con,$update_category);
    if ($result_update) {
        
        echo "<script>window.open('./admin.php?view-categories','_self')</script>";
}

}
?>
<form action="" method="post" class="form">
    <div class="text-group">

        <h4 >Please Enter a Category.</h4>
    </div>
    
    <div class="input-group">

        <input type="text" class="form-control1" style="padding-left: 10px" value='<?php echo $category_title;?>' name="category_title" placeholder="Enter Category" >
    </div>
    <div class="input-group-button">
        <input type="submit" class="form-control2" name="edit_cat" value="Update"
               class="bg-info" />
    </div>

</form>

<?php
include("connect.php");

    
?>