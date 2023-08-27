<?php
include("connect.php");
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up - Tupperware</title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/icon.png" type="image/x-icon" />
</head>
<body id="reg-bg">

    <section id="reg-hd">
        <img src="img/reg-hd.png" alt="" />
    </section>
    <section id="sign-up-head">
        <h1>Sign Up</h1>
    </section>
    <form action="" method="post" class="form" enctype="multipart/form-data" autocomplete="off">
        <section id="reg-head">
            <div class="regis-form2">
                <div class="regis-form">

                    <div class="text-group">
                        <h3>Usename</h3>
                    </div>
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control1" name="username" placeholder="Enter Username" required="required">
                    </div>
                    <div class="text-group">
                        <h3>First Name</h3>
                    </div>
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control1" name="fname" placeholder="Enter First Name" required="required">
                    </div>
                    <div class="text-group">
                        <h3>Middle Name</h3>
                    </div>
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control1" name="mname" placeholder="Enter Middle Name" required="required">
                    </div>
                    <div class="text-group">
                        <h3>Last Name</h3>
                    </div>
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control1" name="lname" placeholder="Enter Last Name" required="required">
                    </div>
                    <div class="text-group">
                        <h3>Contact Number</h3>
                    </div>
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control1" name="contact_num" onkeypress="return onlyNumberKey(event)"
                               maxlength="11" placeholder="09123456789" />

                    </div>
                    <div class="text-group">
                        <h3>Address</h3>
                    </div>
                    <div class="input-group">
                        <input type="text" autocomplete="off" class="form-control1" name="address" placeholder="Enter Full Address" required="required">
                    </div>
                    <div id="gen-bday">
                        <div class="gender">
                            <div class="text-group">
                                <h3>Gender</h3>
                            </div>
                            <div class="input-group">
                                <select id="gender-btn" name="gender" autocomplete="off">
                                    <option value="" disabled selected>-Select Gender-</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-group">
                        <h3>Password</h3>
                    </div>
                    <div class="input-group">
                        <input type="password" autocomplete="off" class="form-control1" id="myInput" name="password" placeholder="Enter Password">
                        <br />

                        <input type="checkbox" onclick="myFunction()" id="check" />
                        <label class="show-pass">Show Password</label>
                    </div>
                    <div class="text-group">
                        <h3>Confirm Password</h3>
                    </div>
                    <div class="input-group">
                        <input type="password" autocomplete="off" class="form-control1" id="myInput2" placeholder="Enter Password">
                        <br />

                        <input type="checkbox" onclick="myFunction2()" id="check" />
                        <label class="show-pass">Show Password</label>
                    </div>
                </div>
            </div>
            <div class="submit-btn">
                <button type="submit" name="user_register" id="submit-btn" >Sign Up &#10004; </button>
            </div>
        </section>
        <section id="no-acc">
            <h3>Already have an account? Login <a href="login.php"> here</a>.</h3> 
        </section>
    </form>

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
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        var password = document.getElementById("myInput")
        var confirm_password = document.getElementById("myInput2");

        function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>

<?php
if (isset($_POST['user_register'])) {
	$username=$_POST['username'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $contact_num=$_POST['contact_num'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    
$select_query="Select * from `user_table` where username='$username'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username already exist.')</script>";
    header("Refresh:0");
}
else {
    echo ("<script>location.href='../website/login.php'</script>");
	$insert_query="insert into `user_table` (username, fname, mname, lname, contact_num, address, gender, password) 
    values('$username', '$fname', '$mname', '$lname', '$contact_num', '$address', '$gender', '$password')";
    $sql_execute=mysqli_query($con,$insert_query);
    header("Refresh:0");
    
}



}


?>