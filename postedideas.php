<?php
// Include database connection
include('include/config.php');

// Fetch posted ideas from the database
include('fetch_ideas.php'); // Include the fetch_ideas.php file
$ideas = fetchIdeas($conn); // Fetch ideas from the posted_ideas table
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
        /* Main header styling */
        .main-header {
            padding: 10px 20px;
            background-color: #14B789;
            box-shadow: 0 2px 5px rgba(0,0,0,0.0);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-header h3 {
            margin: 0;
        }

        /* Content area styling */
        .content {
            padding: 20px;
            padding-top: 70px; /* Space for the header */
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
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
            <h5 style="color:#b92504;"><img src="../images/logo.png" alt="Goxlog Logo" class="logo-img" style="height: 80px;"></h5>
        </header>

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
</body>
</html>
