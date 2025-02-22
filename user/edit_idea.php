<?php
session_start();

if (!isset($_SESSION['phone'])) {
    header('Location: user/login.php');
    exit();
}

include('../include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $idea_id = $_GET['id'];
    $phone = $_SESSION['phone'];

    // Fetch the idea to be edited
    $stmt = $conn->prepare("SELECT * FROM posted_ideas WHERE id = :idea_id AND phone = :phone");
    $stmt->bindParam(':idea_id', $idea_id);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $idea = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$idea) {
        header('Location: posted_ideas.php');
        exit();
    }
}

// Handle form submission to update the idea
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idea_id = $_POST['idea_id'];
    $looking_for = $_POST['looking_for'];
    $idea_category = $_POST['idea_category'];
    $brief_description = $_POST['brief_description'];

    // Update the idea in the database
    $stmt = $conn->prepare("UPDATE posted_ideas SET looking_for = :looking_for, idea_category = :idea_category, brief_description = :brief_description WHERE id = :idea_id");
    $stmt->bindParam(':looking_for', $looking_for);
    $stmt->bindParam(':idea_category', $idea_category);
    $stmt->bindParam(':brief_description', $brief_description);
    $stmt->bindParam(':idea_id', $idea_id);

    if ($stmt->execute()) {
        // Success: Redirect to the posted ideas page
        header('Location: posted_ideas.php');
        exit();
    } else {
        $error = "There was an issue updating your idea. Please try again.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Edit your idea on Goxlog.com">
    <meta name="author" content="Simon Awiti">
    <title>Edit Idea - Goxlog.com</title>

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
        <!-- Edit Idea Section -->
        <section class="login-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="login-form bg-light p-5 rounded">
                            <h2 class="mb-4 text-center">Edit Your Idea</h2>
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <form action="edit_idea.php" method="POST" id="edit_idea_form">
                                <!-- Hidden field to store idea ID -->
                                <input type="hidden" name="idea_id" value="<?php echo $idea['id']; ?>">

                                <!-- Full Name (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?php echo htmlspecialchars($idea['fullname']); ?>" readonly>
                                    <label for="fullname">Full Name</label>
                                </div>

                                <!-- Email (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?php echo htmlspecialchars($idea['email']); ?>" readonly>
                                    <label for="email">Email address</label>
                                </div>

                                <!-- Contact (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone no." value="<?php echo htmlspecialchars($idea['phone']); ?>" readonly>
                                    <label for="phone">Phone no.</label>
                                </div>

                                <!-- Country (from session) -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo htmlspecialchars($idea['country']); ?>" readonly>
                                    <label for="country">Country</label>
                                </div>

                                <!-- Looking For Dropdown -->
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="looking_for" name="looking_for" required>
                                        <option value="" disabled>Select below</option>
                                        <option value="money" <?php echo ($idea['looking_for'] == 'money') ? 'selected' : ''; ?>>Money</option>
                                        <option value="partnership" <?php echo ($idea['looking_for'] == 'partnership') ? 'selected' : ''; ?>>Partnership</option>
                                    </select>
                                    <label for="looking_for">Looking For</label>
                                </div>

                                <!-- Idea Category Dropdown -->
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="idea_category" name="idea_category" required>
                                        <option value="" disabled>Select below</option>
                                        <option value="farming" <?php echo ($idea['idea_category'] == 'farming') ? 'selected' : ''; ?>>Farming</option>
                                        <option value="agribusiness" <?php echo ($idea['idea_category'] == 'agribusiness') ? 'selected' : ''; ?>>Agribusiness</option>
                                        <option value="entertainment" <?php echo ($idea['idea_category'] == 'entertainment') ? 'selected' : ''; ?>>Entertainment</option>
                                        <option value="beauty" <?php echo ($idea['idea_category'] == 'beauty') ? 'selected' : ''; ?>>Beauty</option>
                                        <option value="other" <?php echo ($idea['idea_category'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                    <label for="idea_category">Idea Category</label>
                                </div>

                                <!-- Brief Description of Idea -->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="brief_description" name="brief_description" rows="6" placeholder="Describe your idea (max 150 words)" maxlength="150" required style="height: 200px;"><?php echo htmlspecialchars($idea['brief_description']); ?></textarea>
                                    <label for="brief_description">Brief Description of Idea</label>
                                </div>

                                <p class="mt-3 text-center"> <a href="../allideas.php">Back to Dashboard</a></p>
                                <p class="mt-3 text-center">By clicking submit, you accept our <a href="https://docs.google.com/document/d/1lnMnHYaCE_0hx2n4CYhA8-_YR3WKigy3/edit?usp=drive_link&ouid=100446546988873442885&rtpof=true&sd=true">Terms and Conditions</a></p>

                                <!-- Submit Button -->
                                <button style="background:#727aab;" type="submit" class="btn btn-primary w-100">Update Idea</button>
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