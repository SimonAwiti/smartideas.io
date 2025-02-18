<?php
session_start(); // Start the session

// Destroy all session data
session_unset();  // Unsets all session variables
session_destroy(); // Destroys the session

// Redirect to login page or homepage
header('Location: login.php'); // Or 'Location: index.php' if you want to redirect to the home page
exit();
?>
