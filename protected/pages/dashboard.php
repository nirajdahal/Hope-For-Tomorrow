<?php
session_start();

// Redirect to login if not logged in or not an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../pages/login.html"); // Redirect to login page
    exit();
}

// Connect to the database
$conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user/admin counts
$query_users = "SELECT role, COUNT(*) as count FROM user GROUP BY role";
$result_users = $conn->query($query_users);
$user_data = [];
while ($row = $result_users->fetch_assoc()) {
    $user_data[$row['role']] = $row['count'];
}
$user_count = isset($user_data['user']) ? $user_data['user'] : 0;
$admin_count = isset($user_data['admin']) ? $user_data['admin'] : 0;

// Fetch subscription users and projects counts
$query_subscriptions = "SELECT COUNT(*) as count FROM newsletter_subscriptions";
$result_subscriptions = $conn->query($query_subscriptions);
$subscription_count = $result_subscriptions->fetch_assoc()['count'];

$query_projects = "SELECT COUNT(*) as count FROM projects";
$result_projects = $conn->query($query_projects);
$project_count = $result_projects->fetch_assoc()['count'];

// Close the database connection
$conn->close();
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<header>
    <div class="header-container">
        <h1 class="logo"> <button class="switch-mode-button" style="background-color: transparent;" onclick="toggleMode()">
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
                <li><a href="manage-users.php">Users</a></li>
                <li><a href="manage-projects.php">Projects</a></li>
                <li><a href="manage-subscriptions.php">Subscriptions</a></li>
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../../pages/logout.php">Logout</a></li>

           
               
                  
            
                </ul>
        </nav>
    </div>
</header>

<main>
    <section class="dashboard-container">
        <h2 class="font-title">Dashboard</h2>

        <div class="charts">

        <!-- User/Admin Chart -->
        <div class="chart-container">
            <canvas id="userChart"></canvas>
        </div>

        <!-- Subscription/Projects Chart -->
        <div class="chart-container">
            <canvas id="subscriptionChart"></canvas>
        </div>
</div>
    </section>
</main>

<script>
    // Data for the User/Admin Chart
    const userChart = new Chart(document.getElementById('userChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Users', 'Admins'],
            datasets: [{
                label: 'Number of Users and Admins',
                data: [<?= $user_count ?>, <?= $admin_count ?>],
                backgroundColor: ['#FF6384', '#36A2EB'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB']
            }]
        },
        options: {
            responsive: true
        }
    });

    // Data for the Subscription/Projects Chart
    const subscriptionChart = new Chart(document.getElementById('subscriptionChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Subscriptions', 'Projects'],
            datasets: [{
                label: 'Count',
                data: [<?= $subscription_count ?>, <?= $project_count ?>],
                backgroundColor: ['#4BC0C0', '#FFCE56'],
                hoverBackgroundColor: ['#4BC0C0', '#FFCE56']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script src="../../scripts/common.js"></script>
</body>
</html>
