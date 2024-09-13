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

// Get the project ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the project details from the database
if ($id > 0) {
    $query = "SELECT * FROM projects WHERE id = $id";
    $result = $conn->query($query);
    $project = $result->fetch_assoc();
}

// Handle project update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title'], $_POST['description'])) {
        $title = $conn->real_escape_string($_POST['title']);
        $description = $conn->real_escape_string($_POST['description']);
        
        // Handle image upload
        $image = $_FILES['image']['name'];
        if (!empty($image)) {
            $target = '../../assets/images/projects/' . basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $imageQuery = ", image = '$image'";
            } else {
                echo "Failed to upload image.";
            }
        } else {
            $imageQuery = "";
        }

        $query = "UPDATE projects SET title = '$title', description = '$description' $imageQuery WHERE id = $id";
        if ($conn->query($query)) {
            header("Location: manage-projects.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Project</title>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../../css/pages.css" />
    <link rel="stylesheet" type="text/css" href="../styles/dashboard.css" />
</head>
<body>
    <header>
        <div class="header-container">
            <h1 class="logo">Admin Panel <button class="switch-mode-button" style="background-color: transparent;" onclick="toggleMode()">
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
    <section class="get-connected container">
    <div class="get-connected-container">
    
        <?php if ($project) { ?>
            <form class="get-connected-form" enctype="multipart/form-data" method="POST" action="edit_project.php?id=<?php echo htmlspecialchars($project['id']); ?>">
            <div class="form-description">
                <h4 class="font-title">Edit Project</h4>
                <p class="font-content">Update the details of your project and upload image</p>
            </div>   
            
            <div class="input-name">
                    <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" placeholder="Project Name" required>
                </div>

                <div class="input-description">
                    <textarea name="description" rows="6" placeholder="Project Description" required><?php echo htmlspecialchars($project['description']); ?></textarea>
                </div>

                <div class="input-file">
                    <input type="file" name="image" accept="image/*">
                    <span class="file-error font-content"></span>
                    <img src="../../assets/images/projects/<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" width="100" style="display: block; margin-top: 10px;">
                </div>

                <div class="submit-button">
                    <button type="submit">Update Project</button>
                </div>
            </form>
        <?php } else { ?>
            <p>Project not found.</p>
        <?php } ?>
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
