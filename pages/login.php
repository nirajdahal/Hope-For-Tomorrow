<?php
session_start(); // Make sure session is started

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
        exit();
    }

    // Check if the email exists
    $email_check_query = "SELECT id, username, password, role FROM user WHERE email = ?";
    $stmt = $conn->prepare($email_check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Set a cookie to indicate the user is logged in
            setcookie("loggedin", "true", time() + 3600, "/"); // Expires in 1 hour

            // Determine redirect URL based on role
            $redirectUrl = $user['role'] === 'admin' ? '../protected/pages/dashboard.php' : '../index.html';
            
            echo json_encode([
                "success" => true,
                "message" => "Login successful!",
                "redirect" => $redirectUrl
            ]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid password."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Email not registered."]);
    }

    $conn->close();
}
?>
