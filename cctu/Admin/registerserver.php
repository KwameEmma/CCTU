<?php
include "connection.php";
if(isset($_POST['submit'])){

    $fullname = htmlentities(filter_var($_POST['fullname']));
    $email = htmlentities(filter_var($_POST['email']));
    $password = htmlentities(filter_var($_POST['password']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "userimage/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO admin_tbl(fullname,email,password,image)
            VALUES('$fullname','$email','$password','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(fullname,email,password,image,)
        //     VALUES('$fullname','$email','$password','$filename')");

            header("Location: dashboard.html");

        }else{
            echo "Sorry some error occured";
            header("Location: index.html");
        }

}

?>
