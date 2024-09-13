<?php
session_start();

// Redirect to login if not logged in or not an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../pages/login.html"); // Redirect to login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../../css/pages.css" />
    <link rel="stylesheet" type="text/css" href="../styles/dashboard.css" />
</head>
<body>
<body>
    <header>
    <div class="header-container">
        <h1 class="logo">Admin Panel  <button class="switch-mode-button" style="background-color: transparent;" onclick="toggleMode()">
                        <svg class="theme-icon sun" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Sun -->
                            <circle cx="12" cy="12" r="5"></circle>
                            <line x1="12" y1="1" x2="12" y2="3"></line>
                            <line x1="12" y1="21" x2="12" y2="23"></line>
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                            <line x1="1" y1="12" x2="3" y2="12"></line>
                            <line x1="21" y1="12" x2="23" y2="12"></line>
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                        </svg>
                        <svg class="theme-icon moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Moon -->
                            <path d="M21 12.79A9 9 0 0111.21 3 7.5 7.5 0 1021 12.79z"></path>
                        </svg>
                    </button></h1>
        <nav>
            <ul class="nav-links">
            <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage-users.php">Manage Users</a></li>
                <li><a href="manage-projects.php">Manage Projects</a></li>
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../../pages/logout.php">Logout</a></li>
                </ul>
        </nav>
    </div>
</header>

    <main>
        <section class="dashboard-container">
            <h2>Dashboard</h2>
            <!-- Additional dashboard content goes here -->
        </section>
    </main>
    <script src="../../scripts/common.js"></script>
</body>
</html>
