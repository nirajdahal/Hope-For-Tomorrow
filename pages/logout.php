

<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
if (session_id() != "" || isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/'); // Expire the session cookie
    session_destroy(); // Destroy the session
}

// Also clear the login cookie if it exists
if (isset($_COOKIE["loggedin"])) {
    setcookie("loggedin", "", time() - 3600, "/"); // Expire the login cookie
}

// Redirect to the homepage or login page
header("Location: ../pages/login.html");
exit();
?>