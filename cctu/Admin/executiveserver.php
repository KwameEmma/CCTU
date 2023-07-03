<?php
include "connection.php";
if(isset($_POST['submit'])){

    $fullname = htmlentities(filter_var($_POST['fullname']));
    $email = htmlentities(filter_var($_POST['email']));
    $contact = htmlentities(filter_var($_POST['contact']));
    $position = htmlentities(filter_var($_POST['position']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "userimage/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO executives_tbl(fullname,email,contact,position,image)
            VALUES('$fullname','$email','$contact','$position','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(fullname,email,password,image,)
        //     VALUES('$fullname','$email','$password','$filename')");

            header("Location: components-accordion.php");

        }else{
            echo "Sorry some error occured";
            header("Location: components-accordion.php");
        }

}

?>
