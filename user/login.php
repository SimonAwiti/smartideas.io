<?php
session_start(); // Start a session to manage user login state

// Include the database connection from config.php
include('../include/config.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($phone) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Fetch user from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE phone = :phone");
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['phone'] = $user['phone']; // Store email in session
            header('Location: ../allideas.php'); // Redirect to dashboard
            exit();
        } else {
            $error = "Invalid phone number or password.";
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
        <title>Login - Goxlog.com</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/magnific-popup.css" rel="stylesheet">
        <link href="../css/templatemo-first-portfolio-style.css" rel="stylesheet">
    
    </head>
    
    <body>
        <main><br><br><br>
            <!-- Login Section -->
            <section class="login-section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-12">
                            <div class="login-form bg-light p-5 rounded">
                                <h2 class="mb-4 text-center">Login</h2>
                                <?php if (isset($error)): ?>
                                    <div class="alert alert-danger"><?php echo $error; ?></div>
                                <?php endif; ?>
                                <form action="login.php" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="contact" class="form-control" id="login-email" name="phone" placeholder="phone no." required>
                                        <label for="login-phone">Phone number</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                                        <label for="login-password">Password</label>
                                    </div>

                                    <p class="mt-3 text-center"><a href="reset-password.php">Forgot your password?</a></p>


                                    <button style="background:#727aab;" type="submit" class="btn btn-primary w-100">Login</button>

                                    <p class="mt-3 text-center">Don't have an account? <a href="register.php">Sign up</a></p>
                                    <p class="mt-3 text-center">Back to home page <a href="../index.php">Home</a></p>
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
        <script src="../js/jquery.sticky.js"></script>
        <script src="../js/click-scroll.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/magnific-popup-options.js"></script>
        <script src="../js/custom.js"></script>
    </body>
</html>
