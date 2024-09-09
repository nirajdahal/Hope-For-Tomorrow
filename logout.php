
Here is the complete code, including the PHP pages:
Login Page (login.php)
HTML
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
		$conn = new mysqli("localhost", "root", "", "your_database_name");

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
Signup Page (signup.php)
HTML
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<h1>Signup</h1>
	<form action="signup.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>
		<input type="hidden" name="role" value="user">
		<input type="submit" value="Signup">
	</form>
	<?php
	// Check if form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$role = $_POST["role"];

		// Connect to database
		$conn = new mysqli("localhost", "root", "", "your_database_name");

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Query to insert new user
		$sql = "INSERT INTO user (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	?>
</body>
</html>
Dashboard Page (dashboard.php)
HTML
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<?php
	session_start();
	if (!isset($_SESSION["username"])) {
		header("Location: login.php");
	}
	?>
	<h1>Welcome, <?php echo $_SESSION["username"]; ?></h1>
	<p>This is the dashboard page.</p>
	<a href="logout.php">Logout</a>
</body>
</html>
Logout Page (logout.php)
PHP
<?php
session_start();
session_destroy();
header("Location: login.php");
?>