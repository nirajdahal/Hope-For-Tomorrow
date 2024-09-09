<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<form action="login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>
	<?php
	// Check if form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		// Connect to database
		$conn = new mysqli("localhost", "root", "", "hopefortomorrow_db");

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query to check username and password
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);

		// Check if user exists
		if ($result->num_rows > 0) {
			// Set session variables
			session_start();
			$_SESSION["username"] = $username;
			$_SESSION["role"] = $result->fetch_assoc()["role"];
			header("Location: dashboard.php");
		} else {
			echo "Invalid username or password";
		}

		$conn->close();
	}
	?>
</body>
</html>