<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="styles/signUp.css?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<title>Sign Up</title>
</head>

<body>
	<div class="container">
		<header>Patient Register</header>
		<div class="progress-bar">
			<div class="step">
				<p>INFO</p>
				<div class="bullet">
					<span>1</span>
				</div>
				<i class="fa-solid fa-check"></i>
			</div>
			<div class="step">
				<p>INFO</p>
				<div class="bullet">
					<span>2</span>
				</div>
				<i class="fa-solid fa-check"></i>
			</div>
			<div class="step">
				<p>INFO</p>
				<div class="bullet">
					<span>3</span>
				</div>
				<i class="fa-solid fa-check"></i>
			</div>
			<div class="step">
				<p>I.C.E</p>
				<div class="bullet">
					<span>4</span>
				</div>
				<i class="fa-solid fa-check"></i>
			</div>
			<div class="step">
				<p>ACCT</p>
				<div class="bullet">
					<span>5</span>
				</div>
				<i class="fa-solid fa-check"></i>
			</div>
			
		</div>
		<div class="form-outer">
			<form class="form" action="#">
				<div class="page slidepage">
					<div class="title">Personal Details</div>
					<div class="field">
						<div class="label">Last Name:</div>
						<input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>
					</div>
					<div class="field">
						<div class="label">First Name:</div>
						<input type="text" placeholder="Enter First Name" name="fname" id="fname" required>
					</div>
					<div class="field">
						<div class="label">Middle Initial:</div>
						<input type="text" placeholder="Enter Middle Name" name="mid-init" id="mid-init" required>
					</div>
					<div class="field nextBtn">
						<button>Next</button>
					</div>
				</div>

				<div class="page">
					<div class="title">Personal Details</div>
					<div class="field">
						<div class="label">Age:</div>
						<input type="number">
					</div>
					<div class="field">
						<div class="label">Birth Date:</div>
						<input type="date">
					</div>
					<div class="field">
						<div class="label">Gender:</div>
						<select name="gender" id="gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Others</option>
						</select>
					</div>
					<div class="field">
						<div class="label">Blood Type:</div>
						<select id="blood-type" name="blood-type">
							<option value="">--Please select--</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
						</select>
					</div>
					<div class="field btns">
						<button class="prev-1 prev">Previous</button>
						<button class="next-1 next">Next</button>
					</div>
				</div>

				<div class="page">
					<div class="title">Personal Details</div>
					<div class="field">
						<div class="label">Full Address:</div>
						<input type="text">
					</div>
					<div class="field">
						<div class="label">Email Address:</div>
						<input type="text">
					</div>
					<div class="field">
						<div class="label">Contact Number:</div>
						<input type="text">
					</div>
					<div class="field btns">
						<button class="prev-2 prev">Previous</button>
						<button class="next-2 next">Next</button>
					</div>
				</div>


				<div class="page">
					<div class="title">Emergency Contact</div>
					<div class="field">
						<div class="label">Full Name:</div>
						<input type="text">
					</div>
					<div class="field">
						<div class="label">Email Address:</div>
						<input type="text">
					</div>
					<div class="field">
						<div class="label">Contact Number:</div>
						<input type="text">
					</div>

					<div class="field">
						<div class="label">Relationship:</div>
						<input type="text">
					</div>
					<div class="field btns">
						<button class="prev-3 prev">Previous</button>
						<button class="next-3 next">Next</button>
					</div>
				</div>

				<div class="page">
					<div class="title">Create Account</div>
					<div class="field">
						<div class="label">Username:</div>
						<input type="text">
					</div>
					<div class="field">
						<div class="label">Password:</div>
						<input type="text">
					</div>
					<div class="field">
						<div class="label">Confirm Password:</div>
						<input type="text">
					</div>
					<div class="field btns">
						<button class="prev-4 prev">Previous</button>
						<button class="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="styles/signUp.js"></script>
</body>

</html>