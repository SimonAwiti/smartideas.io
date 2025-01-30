<?php
include('include/config.php'); // Database connection

// Get the user's IP address
$user_ip = $_SERVER['REMOTE_ADDR'];

// Check if the vote was submitted
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
        echo "<script type='text/javascript'>
                alert('You have already liked this idea.');
                window.location.href = 'allideas.php'; // Redirect back to the main page
              </script>";
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

        // Set a cookie to mark the user as having voted for this idea
        $votedIdeas = isset($_COOKIE['voted_ideas_' . $user_ip]) ? json_decode($_COOKIE['voted_ideas_' . $user_ip], true) : [];

        // Add the current idea to the list of voted ideas
        $votedIdeas[] = $idea_id;

        // Update the cookie with the new list of voted ideas (convert array to JSON)
        setcookie('voted_ideas_' . $user_ip, json_encode($votedIdeas), time() + (30 * 24 * 60 * 60), "/"); // Cookie lasts for 30 days

        // Show the success message with JavaScript alert and redirect
        echo "<script type='text/javascript'>
                alert('Your like has been successfully recorded!');
                window.location.href = 'allideas.php'; // Redirect back to the main page
              </script>";
    }
}
?>
