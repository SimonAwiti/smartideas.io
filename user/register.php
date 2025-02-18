<?php
session_start(); // Start the session

// Include database connection
include('../include/config.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Password hashing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the phone number already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE phone = :phone");
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $error = "This phone number is already registered.";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, country, password, phone) VALUES (:fullname, :email, :country, :password, :phone)");
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':phone', $phone);

        if ($stmt->execute()) {
            // Registration successful, redirect to login
            header('Location: login.php');
            exit();
        } else {
            $error = "There was an issue with the registration. Please try again.";
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
    <title>Register - Goxlog.com</title>

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
        <!-- Registration Section -->
        <section class="login-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="login-form bg-light p-5 rounded">
                            <h2 class="mb-4 text-center">Register</h2>
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <form action="register.php" method="POST">
                                <!-- Full Name -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                                    <label for="fullname">Full Name</label>
                                </div>

                                <!-- Email -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                                    <label for="email">Email address</label>
                                </div>

                                <!-- Country -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
                                    <label for="country">Country</label>
                                </div>

                                <!-- Phone Number -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                                    <label for="phone">Phone number</label>
                                </div>

                                <!-- Password -->
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100">Register</button>

                                <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
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
