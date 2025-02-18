<?php
// fetch_ideas.php
include('include/config.php'); // Include your DB connection

function fetchIdeas($conn) {
    $stmt = $conn->prepare("SELECT * FROM posted_ideas ORDER BY id DESC"); // Adjust column names if necessary
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all posted ideas as an associative array
}
?>

