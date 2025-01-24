<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ideas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts for Aptos -->
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
                    <th>Votes</th> <!-- New Votes column -->
                    <th>Vote</th> <!-- New Vote column -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>USA</td>
                    <td>Tech</td>
                    <td>AI-driven platform to improve healthcare accessibility. Integrating machine learning models for diagnosis.</td>
                    <td>10</td> <!-- Example vote count -->
                    <td><button class="btn btn-primary">Vote</button></td> <!-- Vote button -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alice Smith</td>
                    <td>alice.smith@example.com</td>
                    <td>UK</td>
                    <td>Health</td>
                    <td>Wearable device to monitor heart health in real-time, alerting users about irregularities.</td>
                    <td>5</td> <!-- Example vote count -->
                    <td><button class="btn btn-primary">Vote</button></td> <!-- Vote button -->
                </tr>
                <tr>
                    <td>3</td>
                    <td>Bob Johnson</td>
                    <td>bob.johnson@example.com</td>
                    <td>Canada</td>
                    <td>Environment</td>
                    <td>Recycling system using AI to sort waste automatically, improving waste management in cities.</td>
                    <td>8</td> <!-- Example vote count -->
                    <td><button class="btn btn-primary">Vote</button></td> <!-- Vote button -->
                </tr>
                <tr>
                    <td>4</td>
                    <td>Mary Lee</td>
                    <td>mary.lee@example.com</td>
                    <td>Australia</td>
                    <td>Education</td>
                    <td>Interactive learning app for primary school students, integrating gamification for better engagement.</td>
                    <td>12</td> <!-- Example vote count -->
                    <td><button class="btn btn-primary">Vote</button></td> <!-- Vote button -->
                </tr>
                <tr>
                    <td>5</td>
                    <td>James Williams</td>
                    <td>james.williams@example.com</td>
                    <td>USA</td>
                    <td>Business</td>
                    <td>Blockchain-powered platform for secure business contracts, making transactions faster and more transparent.</td>
                    <td>3</td> <!-- Example vote count -->
                    <td><button class="btn btn-primary">Vote</button></td> <!-- Vote button -->
                </tr>
                <!-- More rows can be added similarly -->
            </tbody>
        </table>
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

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
