<?php
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"] ?? 'user'; // Default role to 'user'

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

    if ($conn->connect_error) {
        $response['message'] = "Connection failed: " . $conn->connect_error;
        echo json_encode($response);
        exit();
    }

    $email_check_query = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($email_check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response['message'] = "This email is already registered!";
    } else {
        $sql = "INSERT INTO user (username, password, email, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $hashed_password, $email, $role);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "New record created successfully";
        } else {
            $response['message'] = "Error: " . $stmt->error;
        }
    }

    $conn->close();
}

echo json_encode($response);
?>
