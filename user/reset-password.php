<?php
session_start(); // Start the session

// Include the database connection
include('../include/config.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate inputs
    if (empty($phone) || empty($new_password) || empty($confirm_password)) {
        $error = "Please fill in all fields.";
    } else {
        // Check if new password and confirm password match
        if ($new_password !== $confirm_password) {
            $error = "Passwords do not match.";
        } else {
            // Check if phone number exists in the database
            $stmt = $conn->prepare("SELECT * FROM users WHERE phone = :phone");
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Hash the new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $update_stmt = $conn->prepare("UPDATE users SET password = :password WHERE phone = :phone");
                $update_stmt->bindParam(':password', $hashed_password);
                $update_stmt->bindParam(':phone', $phone);
                $update_stmt->execute();

                $success = "Password has been successfully reset.";
            } else {
                $error = "Phone number not found.";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Simon Awiti">
    <title>Reset Password - Goxlog.com</title>

    <!-- CSS FILES -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/templatemo-first-portfolio-style.css" rel="stylesheet">
</head>

<body>
    <main><br><br><br>
        <!-- Reset Password Section -->
        <section class="reset-password-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="reset-password-form bg-light p-5 rounded">
                            <h2 class="mb-4 text-center">Reset Password</h2>
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <?php if (isset($success)): ?>
                                <div class="alert alert-success"><?php echo $success; ?></div>
                            <?php endif; ?>
                            <form action="reset-password.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                                    <label for="phone">Phone number</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="new-password" name="new_password" placeholder="New Password" required>
                                    <label for="new-password">New Password</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required>
                                    <label for="confirm-password">Confirm Password</label>
                                </div>

                                <button  style="background:#727aab;" type="submit" class="btn btn-primary w-100">Reset Password</button>

                                <p class="mt-3 text-center"><a href="login.php">Back to Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
