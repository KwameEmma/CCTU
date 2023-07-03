<?php
include "connection.php";
if(isset($_POST['submit'])){

    $title = htmlentities(filter_var($_POST['title']));
    $date = htmlentities(filter_var($_POST['date']));
    $blog = htmlentities(filter_var($_POST['blog']));

    $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "blogimage/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

            $query = "INSERT INTO blog_tbl(title,date,blog,image)
            VALUES('$title','$date','$blog','$filename')";

            $result = mysqli_query($con, $query);

        //   mysqli_query($con, "INSERT INTO users_tbl(fullname,email,password,image,)
        //     VALUES('$fullname','$email','$password','$filename')");

            header("Location: components-badges.php");

        }else{
            echo "Sorry some error occured";
            header("Location: components-badges.php");
        }

}

?>
