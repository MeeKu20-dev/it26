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
	<style>
		* {
			margin: 0;
			padding: 0;
			outline: none;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
		}

		body {
			display: flex;
			align-items: center;
			justify-content: center;
			background: #2e2185;

		}

		.container {
			width: 330px;
			background: #fff;
			border-radius: 5px;
			text-align: center;
			padding: 30px 35px 10px 35px;
			margin-top: 20px;
		}

		.container header {
			font-size: 35px;
			font-weight: 600;
			margin: 0 0 10px 0;
		}

		.container .form-outer {
			width: 100%;
			overflow: hidden;
		}

		.form-outer form {
			display: flex;
			width: 400%;
		}

		.form-outer form .page {
			width: 25%;
			transition: margin-left 0.3s ease-in;
		}

		.form-outer form .page .title {
			text-align: left;
			font-size: 25px;
			font-weight: 500;
		}

		.form-outer form .page .field {
			height: 45px;
			width: 330px;
			margin: 45px 0;
			display: flex;
			position: relative;
		}

		.form-outer form .page .field .label {
			position: absolute;
			top: -30px;
			font-weight: 500;
		}

		.form-outer form .page .field input {
			height: 20px;
			width: 100%;
			border: 1px solid lightgray;
			border-radius: 5px;
			font-size: 18px;
			padding: 15px;
		}

		form .page .field select {
			width: 100%;
			padding-left: 10px;
			font-size: 17px;
			font-weight: 500;
		}

		.form-outer form .page .field button {
			width: 100%;
			height: calc(100% + 5px);
			margin-top: -20px;
			border: none;
			border-radius: 5px;
			background-color: #2e2185;
			color: #fff;
			font-size: 18px;
			font-weight: 500px;
			text-transform: uppercase;
			letter-spacing: 1px;
			cursor: pointer;
		}

		.form-outer form .page .field button:hover {
			background-color: #9b9aee;
		}

		.form-outer form .page .btns button {
			margin-top: -20px !important;
		}

		form .page .btns button.prev {
			margin-right: 3px;
			font-size: 17px;
		}

		form .page .btns button.next {
			margin-left: 3px;
			font-size: 17px;
		}

		.container .progress-bar {
			display: flex;
			margin: 40px 0;
		}

		.container .progress-bar .step {
			position: relative;
			text-align: center;
			width: 100%;
		}

		.progress-bar .step p {
			font-size: 18px;
			font-weight: 500;
			color: #000;
			margin-bottom: 8px;
		}

		.progress-bar .step p.active {
			color: #2e2185;
		}


		.progress-bar .step .bullet {
			position: relative;
			height: 25px;
			width: 25px;
			border: 2px solid #000;
			display: inline-block;
			border-radius: 50%;
			line-height: 25px;
			transition: 0.2s;
		}

		.progress-bar .step .bullet.active {
			border-color: #2e2185;
			background: #2e2185;
		}

		.progress-bar .step:last-child .bullet::before,
		.progress-bar .step:last-child .bullet::after {
			display: none;
		}

		.progress-bar .step .bullet:before,
		.progress-bar .step .bullet:after {
			position: absolute;
			content: '';
			bottom: 11px;
			right: -35px;
			height: 4px;
			width: 31px;
			background: #b5b3e6;
		}

		.progress-bar .step .bullet.active:after {
			background: #2e2185;
			transform: scaleX(0);
			transform-origin: left;
			animation: animate 0.3s linear forwards;

		}

		@keyframes animate {
			100% {
				transform: scale(1);
			}
		}

		.progress-bar .step .bullet span {
			font-weight: 500;
			font-size: 17px;
			line-height: 25px;
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
		}

		.progress-bar .step .bullet.active span {
			display: none;
		}

		.progress-bar .step .fa-check {
			position: absolute;
			left: 50%;
			top: 50%;
			font-size: 15px;
			transform: translate(-50%, 50%);
			display: none;
		}

		.progress-bar .step .fa-check.active {
			display: block;
			color: #fff;

		}
	</style>
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
						<input type="text" placeholder="Enter last name" name="lname" id="lname">
					</div>
					<div class="field">
						<div class="label">First Name:</div>
						<input type="text" placeholder="Enter first name" name="fname" id="fname">
					</div>
					<div class="field">
						<div class="label">Middle Initial:</div>
						<input type="text" placeholder="Enter middle name" maxlength="1" name="mid-init" id="mid-init">
					</div>
					<div class="field nextBtn">
						<button>Next</button>
					</div>
				</div>

				<div class="page">
					<div class="title">Personal Details</div>
					<div class="field">
						<div class="label">Age:</div>
						<input type="number" maxlength="3" placeholder="Enter age" name="age" id="age" required>
					</div>
					<div class="field">
						<div class="label">Birth Date:</div>
						<input type="date" name="bdate" id="bdate" required>
					</div>
					<div class="field">
						<div class="label">Gender:</div>
						<select name="gender" id="gender" required>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Others</option>
						</select>
					</div>
					<div class="field">
						<div class="label">Blood Type:</div>
						<select id="blood-type" name="blood-type" required>
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
						<input type="text" placeholder="Enter full address" name="address" id="address">
					</div>
					<div class="field">
						<div class="label">Email Address:</div>
						<input type="text" placeholder="Enter email address" name="e-mail" id="e-mail">
					</div>
					<div class="field">
						<div class="label">Phone Number:</div>
						<input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="contact" id="contact">
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
						<input type="text" placeholder="Enter full name" name="e-fullname" id="e-fullname">
					</div>
					<div class="field">
						<div class="label">Email Address:</div>
						<input type="text" placeholder="Enter email address" name="email-add" id="email-add">
					</div>
					<div class="field">
						<div class="label">Phone Number:</div>
						<input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="phone-num" id="phone-num">
					</div>

					<div class="field">
						<div class="label">Relationship:</div>
						<input type="text" placeholder="Enter relationship" name="relationship" id="relationship">
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
						<input type="text" placeholder="Enter username" name="username" id="username">
					</div>
					<div class="field">
						<div class="label">Password:</div>
						<input type="password" placeholder="Enter password" name="password" id="password">
					</div>
					<div class="field">
						<div class="label">Confirm Password:</div>
						<input type="password" name="confirm-pass" id="confirm-pass">
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
	<script>
		const slidePage = document.querySelector(".slidepage");
		const firstNextBtn = document.querySelector(".nextBtn");
		const prevBtnSec = document.querySelector(".prev-1");
		const nextBtnSec = document.querySelector(".next-1");
		const prevBtnThird = document.querySelector(".prev-2");
		const nextBtnThird = document.querySelector(".next-2");
		const prevBtnFourth = document.querySelector(".prev-3");
		const nextBtnFourth = document.querySelector(".next-3");
		const prevBtnFifth = document.querySelector(".prev-4");
		const submitBtn = document.querySelector(".submit");
		const progressText = document.querySelectorAll(".step p");
		const progressCheck = document.querySelectorAll(".step .fa-check");
		const bullet = document.querySelectorAll(".step .bullet");

		let max = 5;
		let current = 1;

		firstNextBtn.addEventListener("click", function(event) {
			event.preventDefault();

			var lastName = document.getElementById("lname").value;
			var firstName = document.getElementById("fname").value;
			var middleInitial = document.getElementById("mid-init").value;

			if (
				lastName.trim() === "" ||
				firstName.trim() === "" ||
				middleInitial.trim() === ""
			) {
				alert("Please fill all fields...");
				return;
			}

			slidePage.style.marginLeft = "-25%";
			bullet[current - 1].classList.add("active");
			progressText[current - 1].classList.add("active");
			progressCheck[current - 1].classList.add("active");
			current += 1;
		});

		nextBtnSec.addEventListener("click", function(event) {
			event.preventDefault();

			var age = document.getElementById("age").value;
			var birthDate = document.getElementById("bdate").value;
			var gender = document.getElementById("gender").value;
			var bloodType = document.getElementById("blood-type").value;

			if (
				age.trim() === "" ||
				birthDate.trim() === "" ||
				gender.trim() === "" ||
				bloodType.trim() === ""
			) {
				alert("Please fill all fields...");
				return;
			}

			slidePage.style.marginLeft = "-50%";
			bullet[current - 1].classList.add("active");
			progressText[current - 1].classList.add("active");
			progressCheck[current - 1].classList.add("active");
			current += 1;
		});

		nextBtnThird.addEventListener("click", function(event) {
			event.preventDefault();
			var address = document.getElementById("address").value;
			var email = document.getElementById("e-mail").value;
			var contact = document.getElementById("contact").value;

			if (address.trim() === "" || email.trim() === "" || contact.trim() === "") {
				alert("Please fill all fields...");
				return;
			}
			slidePage.style.marginLeft = "-75%";
			bullet[current - 1].classList.add("active");
			progressText[current - 1].classList.add("active");
			progressCheck[current - 1].classList.add("active");
			current += 1;
		});
		nextBtnFourth.addEventListener("click", function(event) {
			event.preventDefault();

			var fullname = document.getElementById("e-fullname").value;
			var phoneNum = document.getElementById("phone-num").value;
			var emailAdd = document.getElementById("email-add").value;
			var relationship = document.getElementById("relationship").value;

			if (
				fullname.trim() === "" ||
				phoneNum.trim() === "" ||
				emailAdd.trim() === "" ||
				relationship.trim() === ""
			) {
				alert("Please fill all fields...");
				return;
			}
			slidePage.style.marginLeft = "-100%";
			bullet[current - 1].classList.add("active");
			progressText[current - 1].classList.add("active");
			progressCheck[current - 1].classList.add("active");
			current += 1;
		});

		submitBtn.addEventListener("click", function(event) {
			event.preventDefault();
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var confirmPass = document.getElementById("confirm-pass").value;

			if (
				username.trim() === "" ||
				password.trim() === "" ||
				confirmPass.trim() === ""
			) {
				alert("Please fill all fields...");
				return;
			}

			if (password !== confirmPass) {
				alert("Passwords do not match");
				return;
			} else {
				const firstname = document.querySelector("#fname").value;
				const middleInit = document.querySelector("#mid-init").value;
				const lastname = document.querySelector("#lname").value;
				const age = document.querySelector("#age").value;
				const bdate = document.querySelector("#bdate").value;
				const gender = document.querySelector("#gender").value;
				const blood_type = document.querySelector("#blood-type").value;
				const address = document.querySelector("#address").value;
				const email = document.querySelector("#e-mail").value;
				const phone_num1 = document.querySelector("#contact").value;
				const fullname = document.querySelector("#e-fullname").value;
				const eme_email = document.querySelector("#email-add").value;
				const phone_num2 = document.querySelector("#phone-num").value;
				const relationship = document.querySelector("#relationship").value;

				const xhr = new XMLHttpRequest();
				xhr.open("POST", "save_user.php");
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhr.onload = function() {
					if (xhr.status === 200) {
						console.log(xhr.responseText);
						alert("You're successfully registered!");
						document.location = "login.php";
					}
				};
				xhr.send(
					`fname=${firstname}&mid-init=${middleInit}&lname=${lastname}&age=${age}&bdate=${bdate}&gender=${gender}&blood-type=${blood_type}&address=${address}&e-mail=${email}&contact=${phone_num1}&e-fullname=${fullname}&email-add=${eme_email}&phone-num=${phone_num2}&relationship=${relationship}&username=${username}&password=${password}`
				);
			}
		});

		prevBtnSec.addEventListener("click", function(event) {
			event.preventDefault();
			slidePage.style.marginLeft = "0%";
			bullet[current - 2].classList.remove("active");
			progressText[current - 2].classList.remove("active");
			progressCheck[current - 2].classList.remove("active");
			current -= 1;
		});
		prevBtnThird.addEventListener("click", function(event) {
			event.preventDefault();
			slidePage.style.marginLeft = "-25%";
			bullet[current - 2].classList.remove("active");
			progressText[current - 2].classList.remove("active");
			progressCheck[current - 2].classList.remove("active");
			current -= 1;
		});
		prevBtnFourth.addEventListener("click", function(event) {
			event.preventDefault();
			slidePage.style.marginLeft = "-50%";
			bullet[current - 2].classList.remove("active");
			progressText[current - 2].classList.remove("active");
			progressCheck[current - 2].classList.remove("active");
			current -= 1;
		});
		prevBtnFifth.addEventListener("click", function(event) {
			event.preventDefault();
			slidePage.style.marginLeft = "-75%";
			bullet[current - 2].classList.remove("active");
			progressText[current - 2].classList.remove("active");
			progressCheck[current - 2].classList.remove("active");
			current -= 1;
		});
	</script>

</body>

</html>