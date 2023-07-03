<?php
include "connection.php";
if(isset($_POST['submit'])){
  $fullname = htmlentities(addslashes($_POST['fullname']));
  $dob = htmlentities(addslashes($_POST['dob']));
  $gender = htmlentities(addslashes($_POST['gender']));
  $programme = htmlentities(addslashes($_POST['programme']));
  $level = htmlentities(addslashes($_POST['level']));
  $hostel = htmlentities(addslashes($_POST['hostel']));
  $email = htmlentities(addslashes($_POST['email']));
  $constituency = htmlentities(addslashes($_POST['constituency']));
  $gps = htmlentities(addslashes($_POST['gps']));
  $contact = htmlentities(addslashes($_POST['contact']));

  $filename = $_FILES["filename"]["name"];

    $tmp_name = $_FILES["filename"]["tmp_name"];

        $folder = "studentimage/";

        if (move_uploaded_file($tmp_name, $folder.$filename)) {

  $query = "INSERT INTO students_tbl(fullname,dob,gender,programme,level,hostel,email,constituency,gps,contact,image)
  VALUES('$fullname','$dob','$gender','$programme','$level','$hostel','$email','$constituency','$gps','$contact','$filename')";

  $result = mysqli_query($con, $query);

//   mysqli_query($con, "INSERT INTO users_tbl(fullname,email,password,image,)
//     VALUES('$fullname','$email','$password','$filename')");

  header("Location: components-alerts.php");

}else{
  echo "Sorry some error occured";
  header("Location: dashboard.php");
}
}

 ?>
