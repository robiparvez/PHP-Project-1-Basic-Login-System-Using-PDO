<?php
session_start();

require 'connect.php';

if (isset($_SESSION['user_id']))
{

    header("Location: index.php");
}

if (!empty($_POST['email']) && !empty($_POST['password']))
{
    $records = $con->prepare("SELECT * FROM users where email = :email");
    $records->bindParam(":email", $_POST['email']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';
    if (count($result > 0) && password_verify($_POST['password'], $result['password']))
    {

        $_SESSION['user_id'] = $result['id'];
        header("Location: index.php");
        // header("Location: connect.php");
    }
    else
    {
        // die("Invalid credentials. Do no match with database.");
        // $message = "Sorry. Credentials do not match";
    }

}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login below</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	</head>
	<body>


<div class="header">
	<a href="index.php">Home page</a>

<?php
if (!empty($message))
{
    ?>
				<p><?php echo $message; ?></p>
			<?php
}
?>

</div>
	<h1>Login</h1>
	<span>or <a href="register.php">Register</a></span>

	<form action="login.php" method="post">
		<input type="text" name="email" placeholder="enter email">
		<input type="password" name="password" placeholder="enter password">
		<input type="submit">


	</form>

	</body>
</html>
