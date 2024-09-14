<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../pages/login.php'); // Redirect to login if not authorized
    exit();
}

// Connect to the database
$conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle subscription deletion
if (isset($_POST['action']) && $_POST['action'] == 'delete_subscription') {
    $email = $_POST['email'];
    
    $delete_query = "DELETE FROM newsletter_subscriptions WHERE email = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Subscription deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting subscription."]);
    }
    $stmt->close();
    exit();
}

// Fetch subscriptions
$sql = "SELECT email FROM newsletter_subscriptions";
$result = $conn->query($sql);

$subscriptions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subscriptions[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Subscriptions</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../../css/pages.css" />
    <link rel="stylesheet" type="text/css" href="../styles/dashboard.css" />
</head>
<body>
    <!-- Header -->
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
            <h3 class="font-title">Manage Subscriptions</h3>
            <div class="table-responsive">
                <table id="user-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subscriptions as $subscription): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($subscription['email']); ?></td>
                            <td>
                                <button class="delete-btn" data-email="<?php echo htmlspecialchars($subscription['email']); ?>">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

   

    
    <script src="../../scripts/common.js"></script>
    <script src="../scripts/subscription-management.js"></script>
</body>
</html>
