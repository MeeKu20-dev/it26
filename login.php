<?php
session_start();
include("database.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password) && !is_numeric($username)) {
		$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
		$result = mysqli_query($con, $query);
		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);
				if ($user_data['password'] === $password) {
					$_SESSION['user_id'] = $user_data['user_id'];
					echo '<script>alert("Logged In")</script>';
					if ($user_data['role'] === "admin") {
						header('location:adminMain.php');
					} elseif ($user_data['role'] === "patient") {
						$id = $user_data['patientID'];
						setcookie("mycookie", $id, time() + 3600, "/");
						header('location:patientUser.php');
					}
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" />
	<link rel="stylesheet" href="styles/loginCss.css?v=<?php echo time(); ?>">
	<style>
		* {
			font-family: Verdana, Geneva, Tahoma, sans-serif;
		}

		body {
			margin: 0;
			padding: 0;
			font-family: "Montserrat", sans-serif;
			background: #2e2185;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.container {
			background-color: rgba(255, 255, 255, 0.9);
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			padding: 50px;
			border-radius: 10px;
			width: 500px;
			max-width: 90%;
			text-align: center;
		}

		.logo-name {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.logo-name h1 {
			padding-bottom: 50px;
			font-size: 30px;
			color: #333;
		}

		.logo {
			width: 100px;
			padding-bottom: 50px;
		}

		form {
			text-align: left;
			padding-bottom: 20px;
		}

		label {
			display: block;
			font-size: 18px;
			font-weight: 500;
			margin-bottom: 10px;
			color: #333;
		}

		input[type="text"],
		input[type="password"] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: none;
			border-bottom: 2px solid #ddd;
			font-size: 18px;
			font-weight: 500;
			font-family: "Montserrat", sans-serif;
			background-color: transparent;
		}

		input[type="submit"] {
			background-color: #2e2185;
			color: white;
			padding: 14px 20px;
			margin-top: 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 18px;
			font-weight: 500;
			font-family: "Montserrat", sans-serif;
		}

		input[type="button"] {
			background-color: #2e2185;
			color: white;
			padding: 14px 20px;
			margin-top: 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 18px;
			font-weight: 500;
			font-family: "Montserrat", sans-serif;
		}

		input[type="submit"]:hover {
			background-color: #555;
		}

		input[type="button"]:hover {
			background-color: #555;
		}

		@media (max-width: 767px) {
			form {
				padding: 30px;
			}
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="logo-name">
			<img class="logo" src="logo.ico">
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