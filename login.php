<?php
session_start();
include("database.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($username) && !empty($password) && !is_numeric($username)) {
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$result = mysqli_query($con, $query);
		if($result) {
			if($result && mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);
				if($user_data['password'] === $password) {
					$_SESSION['user_id'] = $user_data['user_id'];
					echo '<script>alert("Logged In")</script>';
					header('location:adminMain.php');
					die;
				}
			}
		}
		echo '<script>alert("Invalid Credentials!")</script>';
	} else {
		echo '<script>alert("Please Enter some Valid Information!")</script>';
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hospital - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap"
    />
    <link rel="stylesheet" href="loginCss.css?v=<?php echo time(); ?>">
  </head>
  <body>

	<div class="container">
		<div class="logo-name">
			<img class="logo"src="logo.ico">	
			<h1>St. Kerby Hospital </h1>
		</div>
		
		<form method="post">
        	<label for="username">Username:</label>
        	<input type="text" id="username" name="username" required />
        	<label for="password">Password:</label>
        	<input type="password" id="password" name="password" required />
        	<input type="submit" value="Login" />
        	<a href="signUp.php"><input type="button" value="Sign Up" /></a>
      	</form>
	</div>

</body>
</html>
