<script src="toastr/cdnjs/toastr.min.js"></script>
<?php
// Include the connection.php file for establishing a database connection
include "connection.php";


// Check if the 'id' parameter is present in the GET request
if (isset($_GET['id'])) {
    // Retrieve the value of the 'id' parameter
    $id = $_GET['id'];

   echo "<script>
       // Display a Toastr confirmation warning using JavaScript
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000
        };

        toastr.warning('Are you sure you want to delete this record?', 'Confirmation', {
            closeButton: true,
            timeOut: 0,
            extendedTimeOut: 0,
            tapToDismiss: false,
            onShown: function () {
                // When the Toastr warning is shown, bind the event listeners to handle the user's choice
                var yesButton = document.querySelector('.toast-warning .toast-yes-button');
                var noButton = document.querySelector('.toast-warning .toast-no-button');

                // If user clicks 'Yes', proceed with the delete operation
                yesButton.addEventListener('click', function () {
                    // Prepare the delete query
                    var request = new XMLHttpRequest();
                    request.open('GET', 'studentdelete.php?id=$id', true);
                    request.send();

                    // Redirect to another page with the 'id' parameter in the URL
                    window.location.href = 'components-alerts.php?id=$id';
                });

                // If user clicks 'No', do nothing or redirect to another page
                // For example, redirect back to the previous page
                noButton.addEventListener('click', function () {
                    window.history.back();
                });
            }
        });
    </script>";
    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM students_tbl WHERE id = ?");

    // Bind the parameter
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
        header("Location: components-alerts.php");
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($con);
?>
