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

// Handle role update
if (isset($_POST['action']) && $_POST['action'] == 'update_role') {
    $user_id = intval($_POST['user_id']);
    $new_role = $_POST['new_role'];
    
    // Prevent admin from changing their own role
    if ($_SESSION['user_id'] == $user_id && $new_role !== 'admin') {
        echo json_encode(["success" => false, "message" => "You cannot change your own role to non-admin."]);
        exit();
    }
    
    $update_query = "UPDATE user SET role = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $new_role, $user_id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Role updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error updating role."]);
    }
    $stmt->close();
    exit();
}

// Handle user deletion
if (isset($_POST['action']) && $_POST['action'] == 'delete_user') {
    $user_id = intval($_POST['user_id']);
    
    // Prevent admin from deleting themselves
    if ($_SESSION['user_id'] == $user_id) {
        echo json_encode(["success" => false, "message" => "You cannot delete your own account."]);
        exit();
    }
    
    $delete_query = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "User deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error deleting user."]);
    }
    $stmt->close();
    exit();
}

// Fetch users
$sql = "SELECT id, username, email, role FROM user";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Users</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../../css/pages.css" />
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css" />
</head>
<body>
    <!-- Header -->
    <header id="header">
        <h1>Manage Users</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../pages/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard-container">
            <h2>Manage Users</h2>
            <table id="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <select class="role-select" data-user-id="<?php echo $user['id']; ?>">
                                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                            </select>
                        </td>
                        <td>
                            <button class="delete-btn" data-user-id="<?php echo $user['id']; ?>">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Footer -->
    <footer id="footer">
        <p>&copy; 2024 Hope for Tomorrow Foundation</p>
    </footer>

    <script src="../scripts/user-management.js"></script>
</body>
</html>
