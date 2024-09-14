<?php
session_start();



// Create connection
$conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Redirect to login if not logged in or not an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../pages/login.html");
    exit();
}

// Handle project addition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'], $_POST['description'], $_FILES['image'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $description = $conn->real_escape_string($_POST['description']);
        $image = $_FILES['image']['name'];
        $target = '../../assets/images/projects/' . basename($image);

        // Upload the image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $query = "INSERT INTO projects (title, description, image, created_at) VALUES ('$title', '$description', '$image', NOW())";
            if ($conn->query($query)) {
                header("Location: manage-projects.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    }
}

// Fetch projects from the database
$query = "SELECT * FROM projects";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Projects</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../../css/pages.css" />
    <link rel="stylesheet" type="text/css" href="../styles/dashboard.css" />
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
               
            <section class="get-connected container">

    <div class="get-connected-container">
        <form class="get-connected-form" enctype="multipart/form-data" method="POST" action="manage-projects.php">
            <div class="form-description">
                <h4 class="font-title">Add Project</h4>
                <p class="font-content">Enter the details of your project and upload image</p>
            </div>

            <div class="input-name">
                <input type="text" name="title" placeholder="Project Name" required>
            </div>

            <div class="input-description">
                <textarea name="description" placeholder="Project Description" rows="6" required></textarea>
            </div>

            <div class="input-file">
                <input type="file" name="image" required>
                <span class="file-error font-content"></span>
            </div>

            <div class="submit-button">
                <button type="submit">Submit</button>
            </div>
        </form>

        
    </div>

</section>
<section class="dashboard-container">
    <h3 class="font-title">Manage Projects</h3>
    <div class="table-responsive">
        <table id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                 
                    <td><?php echo htmlspecialchars(substr($row['title'], 0, 50)) . '...'; ?></td>
                    <td><?php echo htmlspecialchars(substr($row['description'], 0, 10)) . '...'; ?></td>
                    <td><img src="../../assets/images/projects/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" width="100"></td>
                    <td>
                        <a href="edit_project.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="edit-btn">Edit</a>
                        <a href="delete_project.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

    </main>

   
    <script src="../../scripts/common.js"></script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
