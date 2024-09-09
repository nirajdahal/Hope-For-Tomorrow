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