<?php

session_start();
require 'connect.php';

if (isset($_SESSION['user_id']))
{

	header("Location: index.php");
}

$msg = "";

if (!empty($_POST['email']) && !empty($_POST['password']))
{
    $sql  = "INSERT INTO users(email,password) VALUES (:email,:password)";
    $stmt = $con->prepare($sql);

    $stmt->bindParam(":email", $_POST['email']);
    $stmt->bindParam(":password", password_hash($_POST['password'], PASSWORD_BCRYPT));

    if ($stmt->execute())
    {
        # code...
        $msg = "Inserted into database successfully";
    }
    else
    {
        # code...
        $msg = "Sorry, we can't find your data";
    }

}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Register below
        </title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
            </link>
        </link>
    </head>
    <body>
        <div class="header">
            <a href="index.php">
                Home page
            </a>
        </div>

	<?php
	if (!empty($msg))
	{
    ?>
			<p><?php echo $msg; ?></p>
		<?php
	}
	?>

        <h1>
            Register
        </h1>
        <span>
            or
            <a href="login.php">
                Login
            </a>
        </span>
        <form action="register.php" method="post">

            <input type="text" 		name="email" 		placeholder="enter email" 		/>
            <input type="password" 	name="password" 	placeholder="enter password"  	/>
            <input type="password" 	name="password" 	placeholder="Confirm password"  />

			<input type="submit">
        </form>
    </body>
</html>
