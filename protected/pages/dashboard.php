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
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css" />
</head>
<body>
<body>
   <!-- Header -->
   <header id="header">
        <h1>Welcome, Admin</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage-users.php">Manage Users</a></li>
                <li><a href="../../index.html">Home</a></li>
                <li><a href="../../pages/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-container">
            <h2>Dashboard</h2>
            <!-- Additional dashboard content goes here -->
        </section>
    </main>

    <!-- Footer -->
    <footer id="footer">
        <p>&copy; 2024 Hope for Tomorrow Foundation</p>
    </footer>

   
</body>
</html>
