<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include('../include/config.php');

// Fetch the user's information from session
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT fullname, email, country, phone FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $looking_for = $_POST['looking_for'];
    $idea_category = $_POST['idea_category'];
    $brief_description = $_POST['brief_description'];

    // Insert posted idea into the database
    $stmt = $conn->prepare("INSERT INTO posted_ideas (fullname, email, phone, country, looking_for, idea_category, brief_description) 
                            VALUES (:fullname, :email, :phone, :country, :looking_for, :idea_category, :brief_description)");
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':looking_for', $looking_for);
    $stmt->bindParam(':idea_category', $idea_category);
    $stmt->bindParam(':brief_description', $brief_description);

    if ($stmt->execute()) {
        // Success: Redirect to a confirmation page or the dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "There was an issue posting your idea. Please try again.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post your idea on Goxlog.com">
    <meta name="author" content="Simon Awiti">
    <title>Post Idea - Goxlog.com</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/magnific-popup.css" rel="stylesheet">
    <link href="../css/templatemo-first-portfolio-style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Styling for form elements */
        .form-floating select, .form-floating textarea {
            font-size: 16px;
        }

        /* Reduce checkbox size */
        .form-check-input {
            transform: scale(1.2); /* This reduces the checkbox size */
        }

        .form-check-label {
            display: inline-block;
            margin-left: 10px;
            font-size: 16px;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <main><br><br><br>
        <!-- Post Idea Section -->
        <section class="login-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="login-form bg-light p-5 rounded">
                            <h2 class="mb-4 text-center">Post Your Idea</h2>
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <form action="post_idea.php" method="POST" id="post_idea_form">
                                <!-- Full Name (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?php echo htmlspecialchars($user['fullname']); ?>" readonly>
                                    <label for="fullname">Full Name</label>
                                </div>

                                <!-- Email (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                                    <label for="email">Email address</label>
                                </div>

                                <!-- contact (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone no." value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
                                    <label for="phone">phone no.</label>
                                </div>

                                <!-- Country (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo htmlspecialchars($user['country']); ?>" readonly>
                                    <label for="country">Country</label>
                                </div>

                                <!-- Looking For Dropdown -->
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="looking_for" name="looking_for" required>
                                        <option value="" disabled selected>Select below</option>
                                        <option value="money">Money</option>
                                        <option value="partnership">Partnership</option>
                                    </select>
                                    <label for="looking_for">Looking For</label>
                                </div>

                                <!-- Idea Category Dropdown -->
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idea_category" name="idea_category" required>
                                        <option value="" disabled selected>Select below</option>
                                        <option value="farming">Farming</option>
                                        <option value="agribusiness">Agribusiness</option>
                                        <option value="entertainment">Entertainment</option>
                                        <option value="beauty">Beauty</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label for="idea_category">Idea Category</label>
                                </div>

                                <!-- Brief Description of Idea -->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="brief_description" name="brief_description" rows="6" placeholder="Describe your idea (max 150 words)" maxlength="150" required style="height: 200px;"></textarea>
                                    <label for="brief_description">Brief Description of Idea</label>
                                </div>
                                <p class="mt-3 text-center"> <a href="dashboard.php">Back to Dashboard</a></p>
                                <p class="mt-3 text-center">By clicking submit, you accept our <a href="#">Terms and Conditions</a></p>

                                <!-- Submit Button -->
                                <button style="background:#727aab;" type="submit" class="btn btn-primary w-100">Post Idea</button>
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
