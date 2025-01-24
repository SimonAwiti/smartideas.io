<?php
include('include/config.php'); // Database connection

// Get the user's IP address or use cookies (we'll use IP here)
$user_ip = $_SERVER['REMOTE_ADDR'];

// Check if the vote is already stored in the cookie
if (isset($_COOKIE['voted_' . $user_ip])) {
    echo "You have already voted for this idea.";
    exit;
}

// Check if a vote was submitted
if (isset($_POST['vote'])) {
    $idea_id = $_POST['idea_id'];

    // Check if the user has already voted for this idea based on their IP
    $checkVoteQuery = "SELECT * FROM votes WHERE user_ip = ? AND idea_id = ?";
    $stmt = $con->prepare($checkVoteQuery);
    $stmt->bind_param("si", $user_ip, $idea_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User has already voted for this idea
        echo "You have already voted for this idea.";
    } else {
        // Insert the vote into the votes table
        $insertVoteQuery = "INSERT INTO votes (user_ip, idea_id) VALUES (?, ?)";
        $stmt = $con->prepare($insertVoteQuery);
        $stmt->bind_param("si", $user_ip, $idea_id);
        $stmt->execute();

        // Update the votes count in the ideas table
        $updateVoteCountQuery = "UPDATE ideas SET votes = votes + 1 WHERE id = ?";
        $stmt = $con->prepare($updateVoteCountQuery);
        $stmt->bind_param("i", $idea_id);
        $stmt->execute();

        // Set a cookie to mark the user as having voted
        setcookie('voted_' . $user_ip, '1', time() + (30 * 24 * 60 * 60), "/"); // Cookie lasts for 30 days

        echo "Your vote has been successfully recorded!";
    }
}
?>
