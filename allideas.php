<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include('include/config.php');

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
    <title>All Posted Ideas - Goxlog.com</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">
    
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
            background-color: #727aab;
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

            /* Hide the table in mobile view */
            .table-responsive {
                display: none;
            }

            /* Display cards in mobile view */
            .card-layout {
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
                    <a style="color:white;" class="nav-link" href="../index.php">
                        <i class="bi bi-house-door-fill"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link active" href="../allideas.php">
                        <i class="bi bi-lightbulb-fill"></i> All Posted Ideas
                    </a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="user/post_idea.php">
                        <i class="bi bi-pencil-square"></i> Post Idea
                    </a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="user/logout.php">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content" id="content"><br><br><br>

            <div class="container">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2 class="mb-0">All Posted Ideas</h2>
                </div>

                <!-- Table for larger screens (hidden on mobile) -->
                <div class="table-responsive d-none d-sm-block">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Contact <br>Phone/Email</th>
                                <th>Country</th>
                                <th>Looking for</th>
                                <th>Idea Type</th>
                                <th>Brief Description of Idea</th>
                                <th>Likes</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('fetch_ideas.php'); // Include the fetch_ideas.php file

                            // Fetch posted ideas from database
                            $ideas = fetchIdeas($conn); // Fetch ideas from the posted_ideas table

                            if ($ideas !== null && count($ideas) > 0) {
                                // Loop through the results and display each row
                                foreach ($ideas as $row) {
                                    echo "<tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['fullname'] . "</td>
                                            <td>" . $row['phone'] . " / " . $row['email'] . "</td>
                                            <td>" . $row['country'] . "</td>
                                            <td>" . $row['looking_for'] . "</td>
                                            <td>" . $row['idea_category'] . "</td>
                                            <td>" . $row['brief_description'] . "</td>
                                            <td>" . $row['likes'] . "</td>
                                            <td>
                                                <form method='POST' action='vote.php'>
                                                    <input type='hidden' name='idea_id' value='" . $row['id'] . "'>
                                                    <button type='submit' name='vote' class='btn btn-primary' style='background-color: #2A095D; color: white;'>Like</button>
                                                </form>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center'>No ideas available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Box/Card Layout for Small Screens (visible only on mobile) -->
                <div class="d-block d-sm-none card-layout">
                    <?php
                    // Fetch ideas again for small screen layout
                    $ideas = fetchIdeas($conn);

                    if ($ideas !== null && count($ideas) > 0) {
                        // Loop through the results and display each idea as a card
                        foreach ($ideas as $row) {
                            echo "<div class='card mb-3'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>Idea #" . $row['id'] . "</h5>
                                        <p><strong>Name:</strong> " . $row['fullname'] . "</p>
                                        <p><strong>Contact:</strong> " . $row['phone'] . " / " . $row['email'] . "</p>
                                        <p><strong>Country:</strong> " . $row['country'] . "</p>
                                        <p><strong>Looking For:</strong> " . $row['looking_for'] . "</p>
                                        <p><strong>Idea Category:</strong> " . $row['idea_category'] . "</p>
                                        <p><strong>Description:</strong> " . $row['brief_description'] . "</p>
                                        <p><strong>likes:</strong> " . $row['likes'] . "</p>
                                        <form method='POST' action='vote.php'>
                                            <input type='hidden' name='idea_id' value='" . $row['id'] . "'>
                                            <button type='submit' name='vote' class='btn btn-primary'>Like</button>
                                        </form>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "<p>No ideas available</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/custom.js"></script>

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
