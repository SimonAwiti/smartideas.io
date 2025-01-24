<?php
include('include/config.php'); // Include the database connection file

function fetchIdeas($con) {
    $sql = "SELECT * FROM ideas ORDER BY id ASC"; // Query to fetch all ideas
    $result = $con->query($sql);

    // Check if any data was returned
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return null; // No data found
    }
}
?>
