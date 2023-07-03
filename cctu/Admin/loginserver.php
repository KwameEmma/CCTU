<?php
session_start();
include "connection.php";
if(isset($_POST['submit'])){
    
    $email = htmlentities(filter_var($_POST['email']));
    $password = htmlentities(filter_var(($_POST['password'])));

    $result = mysqli_query($con, "SELECT * FROM admin_tbl WHERE email = '{$email}' AND password = '{$password}'");

    $num = mysqli_num_rows($result);
    if($num > 0){
        $row = mysqli_fetch_row($result);
        $_SESSION['email'] = $email; // set the email address to the session variable
        header("Location: dashboard.php");
        exit();
    }
    else{
        header("Location: index.php");
        echo "Wrong credentials";
        exit();
    }
}
?>