<?php
include('connect.php');
    setcookie ("first_name", "", time() - 3600);
    unset($_COOKIE);
    header("Location:admin_login.php");
    exit();
?>