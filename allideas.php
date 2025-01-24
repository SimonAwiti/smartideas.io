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
    <h1>All Posted Ideas</h1>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Country</th>
                    <th>Idea Type</th>
                    <th>Brief Description of Idea</th>
                    <th>Votes</th>
                    <th>Vote</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('fetch_ideas.php'); // Include the fetch_ideas.php file

                $ideas = fetchIdeas($con);

                if ($ideas !== null) {
                    // Loop through the results and display each row
                    while ($row = $ideas->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['contact'] . "</td>
                                <td>" . $row['country'] . "</td>
                                <td>" . $row['idea_type'] . "</td>
                                <td>" . $row['brief_description'] . "</td>
                                <td>" . $row['votes'] . "</td>
                                <td>
                                    <form method='POST' action='vote.php'>
                                        <input type='hidden' name='idea_id' value='" . $row['id'] . "'>
                                        <button type='submit' name='vote' class='btn btn-primary'>Vote</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No ideas available</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>

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
