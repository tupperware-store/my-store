<?php 
 $connect = mysqli_connect("localhost", "root", "", "onlinestore");
 $number = count($_POST["name_var"]);
 if($number > 0) { 
     $message = false;
     for($i=0; $i<$number; $i++) {
         if(trim($_POST["name_var"][$i] != '')) { 
             $sql = "INSERT INTO variety (name_var, type_name) VALUES('".$_POST["name_var"][$i]."', '".$_POST["name_var"][$i]."')";
             mysqli_query($connect, $sql);
             $message = true;
         } else {
             echo "Please Enter Name";
         }
     }
     if($message == true){
         echo "Inserted Successfully!";
     }
 } else { 
     echo "Something we are wrong!";  
 }
?>