<?php
// Connect to database
$con = mysqli_connect("localhost", "root", "", "tescon");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define how many results per page to display
$results_per_page = 5;

// Retrieve total number of records
$sql = "SELECT COUNT(*) AS count FROM blog_tbl";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['count'];

// Calculate total number of pages
$total_pages = ceil($total_records / $results_per_page);

// Get current page number
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset for current page
$offset = ($current_page - 1) * $results_per_page;

// Retrieve records for current page
$sql = "SELECT * FROM blog_tbl LIMIT $offset, $results_per_page";
$result = mysqli_query($con, $sql);

// Display records
while ($row = mysqli_fetch_assoc($result)) {
    // Display record details here
}

// Display pagination links
echo "<div class='pagination'>";
for ($btn = 1; $btn <= $total_pages; $btn++) {
    $active_class = ($btn == $current_page) ? 'active' : '';
    echo "<a href='index.php?page=$btn' class='$active_class'>$btn</a>";
}
echo "</div>";

// Close database connection
mysqli_close($con);
?>
