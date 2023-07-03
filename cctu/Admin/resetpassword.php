<?php
// Start the session
session_start();

//include connection to the database
include "connection.php";

if(isset($_POST['submit'])){
    
    $email = htmlentities(filter_var($_POST['email'])); 
    $newpassword = htmlentities(filter_var($_POST['newpassword']));
    $renewpassword = htmlentities(filter_var($_POST['renewpassword']));
    
    // Check if the email exists in the database
    $stmt = mysqli_prepare($con, "SELECT * FROM admin_tbl WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0) {
        // Construct the update query using prepared statements
        $stmt = mysqli_prepare($con, "UPDATE admin_tbl SET password=? WHERE email=?");
        mysqli_stmt_bind_param($stmt, "ss", $newpassword, $email);
        mysqli_stmt_execute($stmt);

        // Check if the update was successful
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: users-profile.php");
            echo "Update successful";
        } else {
            header("Location: user-profile.php");
            echo "Update failed";
        }

        // Close the prepared statement and database connection
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }

}

?>
