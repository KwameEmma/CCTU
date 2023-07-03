<?php
session_start();

$con = mysqli_connect("localhost","root","","tescon");

if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $con->prepare("SELECT email, password FROM admin_tbl WHERE email= $email AND password= $password");

  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows === 1)
  {
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $row['email'];
    header("Location: dashboard.php");
    exit();
  }
  else
  {
    $error_message = "Invalid email or password!";
    header("Location: index.php");
  }
}
?>



<section class="section">
<div class="row align-items-top">

  <?php
  include "connection.php";
  $result = mysqli_query($con, "SELECT * FROM students_tbl");
  $counter = 0;
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
         $counter++;
         $id = $row['id'];
         $fullname = $row['fullname'];
         $dob = $row['dob'];
         $programme = $row['programme'];
         $constituency = $row['constituency'];
         $image = $row['image'];
         ?>
    <!-- Card with an image overlay -->
    <div class="card" style = "width: 47%; height: 200px;">
      <img src="assets/img/tescon.png" class="card-img-top" alt="..." style = "width: 100%; height: 200px;">
      <div class="card-img-overlay">
        <div class="container"  style="position: relative; right: 6%; bottom: 7%;">
          <img src="userimage/<?=$image?>" alt="" style = "width: 30%; height: 100px;">
          <h5 class="card-title" style="position: relative; left: 32%; bottom: 120px; color: red;">Tescon Membership Card</h5>
          <div class="container" style="position: relative; left: 29%; bottom: 140px;">
            <strong class="card-text">Name: <span style="color: blue;"> <?=$fullname?></span></strong> <br>
            <strong class="card-text">Date of Birth: <span style="color: blue;"><?=$dob?></span></strong><br>
            <strong class="card-text">Constituency: <span style="color: blue;"><?=$constituency?></span></strong> <br>
            <strong class="card-text">Programme: <span style="color: blue;"><?=$programme?></span></strong>
          </div>
          <div class="" style="position: relative; left: 10%; bottom: 118px;">
            <em style="color: red;">Please return to any Tescon office if found. Thank you.</em>
          </div>
        </div>
      </div>
    </div><!-- End Card with an image overlay -->

  </div>
<?php
  }
 ?>
   </div>
</div>
</section>


