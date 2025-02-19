<?php
// Include the database connection from config.php
include('../include/config.php');

// Get the token from the URL
$token = $_GET['token'] ?? '';

// Check if the token is valid
if ($token) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_password = $_POST['password'];

        if (empty($new_password)) {
            $error = "Please enter a new password.";
        } else {
            // Update password and clear the reset token
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = :password, reset_token = NULL WHERE reset_token = :token");
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            $success = "Your password has been reset successfully. You can now log in with your new password.";
        }
    }
} else {
    $error = "Invalid reset token.";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Simon Awiti">
    <title>Set New Password - Goxlog.com</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main>
    <section class="login-section d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="login-form bg-light p-5 rounded">
                        <h2 class="mb-4 text-center">Set New Password</h2>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <?php if (isset($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>

                        <form action="reset-password-form.php?token=<?php echo $token; ?>" method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="new-password" name="password" placeholder="New Password" required>
                                <label for="new-password">New Password</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Set New Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
