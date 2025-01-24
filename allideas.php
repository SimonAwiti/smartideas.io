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
    <style>
        body {
            font-family: 'Aptos', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 25px;
            max-width: 90%;
            margin: 50px auto;
            overflow-x: auto;
        }
        h1 {
            color: #2A095D;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        table.table-striped.table-bordered {
            width: 100%;
            margin-top: 50px;
            border-radius: 20px;
            border-collapse: collapse;
            border: 2px solid #2A095D;
        }
        table.table-striped.table-bordered th,
        table.table-striped.table-bordered td {
            vertical-align: middle;
            padding: 17px;
            text-align: left;
            font-size: 1.0rem;
            border: 2px solid #2A095D;
        }
        table.table-striped.table-bordered th {
            background-color: #F3C611;
            color: #333;
            font-weight: 600;
            text-align: center;
            letter-spacing: 1px;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:hover td {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }
        .page-item.active .page-link {
            background-color: #2A095D;
            border-color: #2A095D;
            color: white;
        }
        .page-link {
            color: #2A095D;
        }
        .page-link:hover {
            background-color: #2A095D;
            color: white;
        }
        .pagination .page-item {
            border-radius: 5px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 1.5rem;
            }
            table.table-striped.table-bordered th,
            table.table-striped.table-bordered td {
                padding: 12px;
                font-size: 0.9rem;
            }
        }
    </style>
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
