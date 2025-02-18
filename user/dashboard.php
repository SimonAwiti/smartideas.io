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

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/magnific-popup.css" rel="stylesheet">
        <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">

        <style>
            /* Custom styles for the dashboard */
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background-color: #f8f9fa;
                margin: 0;
            }

            /* Header */
            .header {
                background-color: #535da1;
                color: #fff;
                padding: 15px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .header .logo {
                font-size: 24px;
                font-weight: 500;
                color: #fff;
                text-decoration: none;
            }

            .header .menu-toggle {
                display: none;
                background: none;
                border: none;
                color: #fff;
                font-size: 24px;
                cursor: pointer;
            }

            .header .nav-links {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .header .nav-links a {
                color: #fff;
                text-decoration: none;
                font-size: 16px;
                transition: opacity 0.3s;
            }

            .header .nav-links a:hover {
                opacity: 0.8;
            }

            /* Sidebar */
            .sidebar {
                width: 250px;
                background-color: #535da1;
                color: #fff;
                padding: 20px;
                min-height: calc(100vh - 60px); /* Adjust for header height */
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }

            .sidebar h2 {
                color: #fff;
                margin-bottom: 20px;
                text-align: center;
                font-size: 22px;
                font-weight: 500;
            }

            .sidebar ul {
                list-style: none;
                padding: 0;
            }

            .sidebar ul li {
                margin-bottom: 15px;
            }

            .sidebar ul li a {
                color: #fff;
                text-decoration: none;
                display: flex;
                align-items: center;
                padding: 10px;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .sidebar ul li a:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }

            .sidebar ul li a i {
                margin-right: 10px;
                font-size: 18px;
            }

            .logout-link {
                color: #fff;
                background-color: #ff4d4d;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
                display: block;
                margin-top: 20px;
                text-decoration: none;
                transition: background-color 0.3s;
            }

            .logout-link:hover {
                background-color: #ff1a1a;
            }

            /* Main Content */
            .main-content {
                flex: 1;
                padding: 20px;
                background-color: #fff;
                margin-left: 250px; /* Adjust for sidebar width */
                transition: margin-left 0.3s ease;
            }

            .main-content h1 {
                color: #535da1;
                margin-bottom: 20px;
                font-size: 28px;
                font-weight: 600;
            }

            .main-content p {
                color: #333;
                font-size: 16px;
                line-height: 1.6;
            }

            .main-content .card {
                background-color: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .main-content .card h3 {
                color: #535da1;
                margin-bottom: 10px;
                font-size: 20px;
                font-weight: 500;
            }

            .main-content .card p {
                color: #666;
                font-size: 14px;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .header .menu-toggle {
                    display: block;
                }

                .sidebar {
                    position: fixed;
                    top: 60px; /* Adjust for header height */
                    left: -250px; /* Hide sidebar by default */
                    z-index: 1000;
                    height: calc(100vh - 60px);
                }

                .sidebar.active {
                    left: 0; /* Show sidebar when active */
                }

                .main-content {
                    margin-left: 0;
                }
            }
        </style>
    </head>
    
    <body>

        <!-- Header -->
        <header class="header">
            <a href="index.html" class="logo">Goxlog.com</a>
            <button class="menu-toggle" id="menu-toggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="nav-links">
                <a href="index.html">Home</a>
                <a href="login.html">Log Out</a>
            </div>
        </header>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li>
                    <a href="#">
                        <i class="bi bi-lightbulb"></i> All Posted Ideas
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-plus-circle"></i> Post an Idea
                    </a>
                </li>
                <li>
                    <a href="login.html" class="logout-link">
                        <i class="bi bi-box-arrow-left"></i> Log Out
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <h1>Welcome to Your Dashboard</h1>
            <p>Here, you can manage your ideas, view all posted ideas, and post new ones. Use the sidebar to navigate.</p>

            <!-- Example Content -->
            <div class="card">
                <h3>Idea 1: E-commerce Platform for Artisans</h3>
                <p>A platform where artisans can showcase and sell their handmade products to a global audience.</p>
            </div>

            <div class="card">
                <h3>Idea 2: Water Intake Tracker App</h3>
                <p>A mobile app that helps users track their daily water intake and stay hydrated.</p>
            </div>

            <div class="card">
                <h3>Idea 3: Community Recycling Initiative</h3>
                <p>A community-driven program to promote recycling and reduce waste in local neighborhoods.</p>
            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/custom.js"></script>

        <script>
            // Toggle sidebar on mobile
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (event) => {
                if (window.innerWidth <= 768 && !sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            });
        </script>

    </body>
</html>