<?php
session_start(); // Start a session to manage user login state

// Database connection details
$host = 'localhost'; // Database host
$dbname = 'goxlog'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Connect to the database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Fetch user from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['email'] = $user['email']; // Store email in session
            header('Location: dashboard.php'); // Redirect to dashboard
            exit();
        } else {
            $error = "Invalid email or password.";
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

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/magnific-popup.css" rel="stylesheet">
        <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">

        <style>
            /* Custom styles for the login page */
            .login-section {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #535da1; /* Matching the theme color */
                padding: 20px;
            }

            .login-form {
                background: rgba(255, 255, 255, 0.1);
                padding: 40px;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                max-width: 400px;
                width: 100%;
                text-align: center;
            }

            .login-form h2 {
                color: #fff;
                margin-bottom: 20px;
            }

            .login-form .form-control {
                background: #fff;
                border: none;
                color: #333; /* Dark text for better readability */
                margin-bottom: 15px;
            }

            .login-form .form-control::placeholder {
                color: #999; /* Placeholder text color */
            }

            .login-form .form-control:focus {
                border-color: #535da1; /* Theme color for focus state */
                box-shadow: 0 0 5px rgba(83, 93, 161, 0.5); /* Subtle focus shadow */
            }

            .login-form .btn {
                width: 100%;
                background: #fff;
                color: #535da1;
                border: none;
                padding: 10px;
                font-weight: 500;
            }

            .login-form .btn:hover {
                background: #f0f0f0;
            }

            .login-form a {
                color: #fff;
                text-decoration: none;
            }

            .login-form a:hover {
                text-decoration: underline;
            }

            .error-message {
                color: #ff4d4d;
                margin-bottom: 15px;
                font-size: 14px;
            }
        </style>
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="spinner-rotate"></span>    
            </div>
        </section>

        <main>
            <!-- Login Section -->
            <section class="login-section">
                <div class="login-form">
                    <h2>Login</h2>
                    <?php if (isset($error)): ?>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="login-email" name="email" placeholder="Email address" required>
                            <label for="login-email">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                            <label for="login-password">Password</label>
                        </div>

                        <button type="submit" class="btn">Login</button>

                        <p class="mt-3 text-white">Don't have an account? <a href="register.php" class="text-white">Sign up</a></p>
                        <p class="mt-3 text-white">Back to home page <a href="index.html" class="text-white">Home</a></p>
                    </form>
                </div>
            </section>
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>