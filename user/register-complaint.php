<?php
session_start();
include('include/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['id']) || strlen($_SESSION['id']) == 0) {
    header('location:index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $uid = $_SESSION['id'];
    $name = trim($_POST['name']);
    $contact = trim($_POST['contact']);
    $country = trim($_POST['country']);
    $in_search_of = trim($_POST['in_search_of']);
    $idea_type = trim($_POST['idea_type']);
    $brief_description = trim($_POST['brief_description']);
    $votes = 0;

    $stmt = $con->prepare("INSERT INTO ideas (name, contact, country, in_search_of, idea_type, brief_description, votes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("ssssssi", $name, $contact, $country, $in_search_of, $idea_type, $brief_description, $votes);

    if ($stmt->execute()) {
        echo '<script>alert("Your idea has been successfully posted!");</script>';
    } else {
        echo '<script>alert("Something went wrong. Please try again.");</script>';
        echo "Execute failed: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>smartidea.io || Post Idea</title>
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../admin/assets/css/style.css">
</head>

<body class="">
    <?php include('include/sidebar.php'); ?>
    <?php include('include/header.php'); ?>

    <!-- [ Main Content ] Start -->
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ Breadcrumb ] Start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Post Idea</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="post-idea.php">Post Idea</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Breadcrumb ] End -->
            <!-- [ Main Content ] Start -->
            <div class="row">
                <!-- [ Form Element ] Start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Post Your Idea</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" name="postIdea" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Enter your contact number" required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control" required>
                                        <option value="">Select Country</option>
                                        <?php
                                        $sql = mysqli_query($con, "SELECT stateName FROM state");
                                        while ($rw = mysqli_fetch_array($sql)) {
                                            echo '<option value="' . htmlentities($rw['stateName']) . '">' . htmlentities($rw['stateName']) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="in_search_of">Seeking For?</label>
                                    <select name="in_search_of" class="form-control" required>
                                        <option value="Partnership">Partnership</option>
                                        <option value="Funding">Funding</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="idea_type">Idea Type</label>
                                    <input type="text" name="idea_type" class="form-control" placeholder="Enter the type of your idea" required>
                                </div>
                                <div class="form-group">
                                    <label for="brief_description">Brief Description</label>
                                    <textarea name="brief_description" class="form-control" rows="5" maxlength="2000" placeholder="Describe your idea in detail" required></textarea>
                                </div>
                                <div class="terms-condition">
                                 <p>By posting your idea, you agree to our <a href="https://docs.google.com/document/d/1lnMnHYaCE_0hx2n4CYhA8-_YR3WKigy3/edit?usp=sharing&ouid=100446546988873442885&rtpof=true&sd=true" target="_blank">Terms and Conditions</a>.</p>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Post Idea</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ Form Element ] End -->
            </div>
            <!-- [ Main Content ] End -->

        </div>
    </section>

    <!-- Required JS -->
    <script src="../admin/assets/js/vendor-all.min.js"></script>
    <script src="../admin/assets/js/plugins/bootstrap.min.js"></script>
</body>

</html>
