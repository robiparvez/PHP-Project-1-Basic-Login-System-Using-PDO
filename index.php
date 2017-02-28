<?php

session_start();

require 'connect.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to Login using PDO</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	</head>

	<body>


	<?php
	if (isset($_SESSION['user_id']))
	{

		?>
		<p>Welcom User !! </p>
		<a href="logout.php">Wanna Logout ??</a>
		<?php
	}
	else
	{
	?>

	<h1>Please login or register</h1>

	<a href="login.php">Login</a>
	<span>or <a href="register.php">Register</a></span>

	<?php
	}
	?>



	</body>
</html>
