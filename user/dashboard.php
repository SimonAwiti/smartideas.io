<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include('../include/config.php');

// Fetch the user's information
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT fullname FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Simon Awiti">
    <title>Dashboard - Goxlog.com</title>

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
        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #14B789;
            padding-top: 120px; /* Space for the header */
            z-index: 90;
            transition: all 0.3s ease;
        }

        .sidebar .welcome-msg {
            padding-left: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .sidebar .nav-link {
            padding: 10px 20px;
            font-size: 16px;
            color: #333;
        }

        .sidebar .nav-link:hover {
            background-color: #727aab;;
        }

        /* Main header styling */
        .main-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px 20px;
            background-color: #14B789;
            box-shadow: 0 2px 5px rgba(0,0,0,0.0);
            z-index: 101; /* Ensure header is above the sidebar */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-header h3 {
            margin: 0;
        }

        /* Hamburger button styling */
        .hamburger-btn {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        /* Content area styling */
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
            padding-top: 70px; /* Space for the header */
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }

            .sidebar.active {
                width: 250px;
            }

            .content {
                margin-left: 0;
            }

            .hamburger-btn {
                display: block;
            }
        }
    </style>
</head>

<body>
    <main>
        <!-- Main Header -->
        <header class="main-header">
            <!-- Hamburger Button for Small Screens -->
            <span class="hamburger-btn" id="hamburger-btn">&#9776;</span>
            <h5 style="color:#b92504;"><img src="../images/logo.png" alt="Goxlog Logo" class="logo-img" style="height: 80px;"></h5>
        </header>

        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="welcome-msg">
                <h7 style="color:white;">Welcome, <?php echo htmlspecialchars($user['fullname']); ?></h7>
            </div>

            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a style="color:white;" class="nav-link active" href="../index.php">
                        <i class="bi bi-house-door-fill"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="posted_ideas.php">
                        <i class="bi bi-lightbulb-fill"></i> All Posted Ideas
                    </a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="post_idea.php">
                        <i class="bi bi-pencil-square"></i> Post Idea
                    </a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
<!-- Main Content -->
<div class="content" id="content"><br><br><br>

    <!-- Example for displaying posted ideas -->
    <div class="row">
        <!-- First Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Posted Ideas Manager</h5>
                    <p class="card-text">You can edit your posted idea here.</p>
                    <a style="background:#727aab;" href="#" class="btn btn-primary">Edit posted ideas</a>
                </div>
            </div>
        </div>

        <!-- Second Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">New Idea Submissions</h5>
                    <p class="card-text">Review and approve or reject new idea submissions here.</p>
                    <a style="background:#727aab;" href="#" class="btn btn-primary">Manage Submissions</a>
                </div>
            </div>
        </div>

        <!-- Third Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Feedback</h5>
                    <p class="card-text">Review feedback and comments from users on ideas.</p>
                    <a style="background:#727aab;" href="#" class="btn btn-primary">View Feedback</a>
                </div>
            </div>
        </div>



    </div>
</div>


    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/click-scroll.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/magnific-popup-options.js"></script>
    <script src="../js/custom.js"></script>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        // Handle sidebar toggle for small screens
        document.getElementById("hamburger-btn").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("active");
            document.getElementById("content").classList.toggle("active");
        });
    </script>
</body>
</html>