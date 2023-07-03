<?php
// Start the session
session_start();

// include connection to the database
include "connection.php";

// Set a session variable
$email = $_SESSION["email"];

// Use a prepared statement to prevent SQL injection
$stmt = mysqli_prepare($con, "SELECT * FROM admin_tbl WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0) {
    // Retrieve the data
    $row = mysqli_fetch_assoc($result);
    // Access the data
    // echo $row['email'];
    // echo $row['fullname'];
    // echo $row['image'];

} else {
    echo "No results found";
}

?>
<!DOCTYPE php>
<php lang="en">
<script type="text/javascript">
document.oncontextmenu = function() {
    return false;
}
</script>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tescon CCTU</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/tescon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/tescon.png" alt="">
        <span class="d-none d-lg-block">Tescon CCTU | Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="userimage/<?= $row['image'];?>" alt="Profile" style="width: 40%; height: 150px; border-radius: 100%;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $row['fullname'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $row['fullname'];?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide active"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.php">
              <i class="bi bi-circle"></i><span>Registration</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.php">
              <i class="bi bi-circle"></i><span>Executives</span>
            </a>
          </li>
          <li>
            <a href="components-cards.php">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-badges.php">
              <i class="bi bi-circle"></i><span>Blogs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.php" class="active">
              <i class="bi bi-circle"></i><span>View Blogs</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="components-badges.php">
          <i class="bi bi-question-circle"></i>
          <span>Blogs</span>
        </a>
      </li><!-- End Blogs Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blogs Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Blogs Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="col-lg-6" style="width:100%;">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Blogs Table</h5>

            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="container-title">Tescon Blogs <span></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Blog</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       //Pagination for a page
                      // Establish a database connection
                      include "connection.php";

                      // Define the number of records to display per page
                      $records_per_page = 4;

                      // Get the current page number from the URL
                      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                      // Calculate the offset for the SQL query
                      $offset = ($current_page - 1) * $records_per_page;

                      // Retrieve the total number of records in the database
                      $total_records_query = mysqli_query($con, "SELECT COUNT(*) AS total FROM blog_tbl");
                      $total_records = mysqli_fetch_assoc($total_records_query)['total'];

                      // Calculate the total number of pages
                      $total_pages = ceil($total_records / $records_per_page);

                      // Retrieve the records for the current page
                      $records_query = mysqli_query($con, "SELECT * FROM blog_tbl LIMIT $offset, $records_per_page");
                      $counter = 0;
                      while($row = mysqli_fetch_array($records_query,MYSQLI_ASSOC)){
                             $counter++;
                             $id = $row['id'];
                             $title = $row['title'];
                             $date = $row['date'];
                             $blog = $row['blog'];
                             $image = $row['image'];

                            echo "<tr class='btnv'>
                            <td>$counter</td>
                            <td><img src = 'blogimage/$image' style = 'width: 50%; height: 60px; border-radius: 100%;'></td>
                            <td>$title </td>
                            <td>$date</td>
                            <td>$blog</td>
                            <td>
                            <a href = 'deleteblog.php?id=$id'>
                            <input type = 'submit' value = 'Delete' class = 'btn btn-outline-danger'>
                            </a>
                            </tr>";
                          }

                          ?>

                    </tbody>
                  </table>
                  <?php
                // Display the pagination links
                echo '<nav aria-label="Page navigation"';
                echo '<ul class="pagination">';

                // Previous page link
                if ($current_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page - 1) . '" style ="background-color: red; color: white;">Previous</a></li>';
                }

                // Page numbers
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<li class="page-item' . ($current_page == $i ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                // Next page link
                if ($current_page < $total_pages) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($current_page + 1) . '" style ="background-color: red; color: white;">Next</a></li>';
                }

                echo '</ul>';
                echo '</nav>';

                // Close the database connection
                mysqli_close($con);

            ?> 
                </div>

              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Tescon UCC</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="mailto:lordsicon25@gmail.com">Empire Tech</a>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</php>
