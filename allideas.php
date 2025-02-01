<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ideas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aptos:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2 class="mb-0">All Posted Ideas</h2>
        <a href="user/index.php" class="btn btn-primary" style="background-color: #2A095D; color: white;">Post your idea</a>
    </div>
    <div class="table-responsive">
        <!-- Table for larger screens -->
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

                $ideas = fetchIdeas($con); // Fetch ideas (adjust fetch_ideas.php accordingly)

                if ($ideas !== null) {
                    // Loop through the results and display each row
                    while ($row = $ideas->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['contact'] . "</td>
                                <td>" . $row['country'] . "</td>
                                <td>" . $row['in_search_of'] . "</td>
                                <td>" . $row['idea_type'] . "</td>
                                <td>" . $row['brief_description'] . "</td>
                                <td>" . $row['votes'] . "</td>
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

        <!-- Box/Card Layout for Small Screens -->
        <div class="d-block d-sm-none">
            <?php
            // Fetch ideas again for small screen layout
            $ideas = fetchIdeas($con);

            if ($ideas !== null) {
                // Loop through the results and display each idea as a card
                while ($row = $ideas->fetch_assoc()) {
                    echo "<div class='card mb-3'>
                            <div class='card-body'>
                                <h5 class='card-title'>Idea #" . $row['id'] . "</h5>
                                <p><strong>Name:</strong> " . $row['name'] . "</p>
                                <p><strong>Contact:</strong> " . $row['contact'] . "</p>
                                <p><strong>Country:</strong> " . $row['country'] . "</p>
                                <p><strong>In Search of:</strong> " . $row['in_search_of'] . "</p>
                                <p><strong>Idea Type:</strong> " . $row['idea_type'] . "</p>
                                <p><strong>Description:</strong> " . $row['brief_description'] . "</p>
                                <p><strong>Likes:</strong> " . $row['votes'] . "</p>
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

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>