<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap"
    />
    <link rel="stylesheet" href="signUp.css?v=<?php echo time(); ?>">
    <title>Sign Up</title>
</head>
<body>
	<form method="post" action="save_user.php">
        <div class="logo-name">
            <img src="logo.ico" class="logo" />
            <h2>St. Kerby Hospital</h2>
          </div>

		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>
		
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		
		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" required>
		
		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" required>
		
		<label for="middle_initial">Middle Initial:</label>
		<input type="text" id="middle_initial" name="middle_initial" maxlength="1" required>
		
		<label for="gender">Gender:</label>
		<select id="gender" name="gender" required>
			<option value="">Select Gender</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select>
		
		<a href="login.php"><input  type="button" value="Cancel"></a>
        <input type="submit" value="Sign Up">
	</form>


</body>
</html>