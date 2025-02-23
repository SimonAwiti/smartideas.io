<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get the error message from the URL (if any)
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'An unknown error occurred.';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Failed - Goxlog.com</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Payment Failed!</h4>
                    <p>There was an issue processing your payment. Please try again.</p>
                    <hr>
                    <p class="mb-0">Error: <?php echo $error; ?></p>
                </div>
                <a href="../allideas.php" class="btn btn-primary">Back to Dashboard</a>
                <a href="post_idea.php" class="btn btn-warning">Try Again</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>