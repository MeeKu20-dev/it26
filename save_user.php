<?php
    include("database.php");
    include("functions.php");

	if(isset($_POST)) {
		//personal details
		$firsname= $_POST['fname'];
		$middleInit=$_POST['mid-init'];
		$lastname=$_POST['lname'];
		$age=$_POST['age'];
		$bdate=$_POST['bdate'];
		$gender=$_POST['gender'];
		$blood_type=$_POST['blood-type'];
		//contact info
		$address=$_POST['address'];
		$email=$_POST['e-mail'];
		$phone_num1=$_POST['contact'];
		//emergency contact
		$fullname=$_POST['e-fullname'];
		$eme_email=$_POST['email-add'];
		$phone_num2=$_POST['phone-num'];
		$relationship=$_POST['relationship'];
		//account info
		$username=$_POST['username'];
		$password=$_POST['password'];

		$query = "SELECT ( SELECT COUNT(*) FROM patient ) AS 'pat_total',( SELECT COUNT(*) FROM contact_info ) AS 'cont_total' ,( SELECT COUNT(*) FROM emergency_contact ) AS 'eme_total' FROM DUAL WHERE 1;";
		$result = mysqli_query($con, $query);
		if ($result) {
			$user_data = mysqli_fetch_assoc($result);
			$pat_id = "px" . ($user_data['pat_total'] + 1);
			$cont_id = "cont" . ($user_data['cont_total'] + 1);
			$eme_id = "eme_cont" . ($user_data['eme_total'] + 1);
		}
		if ($step1 = mysqli_query($con,"INSERT INTO `contact_info` (`contactId`, `address`, `email`, `phone_number`, `archived`) VALUES ('$cont_id', '$address', '$email', '$phone_num2', 'false')")) {
			if ($step2 = mysqli_query($con,"INSERT INTO `emergency_contact` (`em_contactId`, `fullname`, `email`, `phone_number`, `relationship`) VALUES ('$eme_id', '$fullname', '$eme_email', '$phone_num1', '$relationship')")) {
				$step3 = mysqli_query($con,"INSERT INTO `patient` (`patientID`, `ln`, `fn`, `mi`, `birthday`, `age`, `gender`, `blood_type`, `contactID`, `em_contactId`) VALUES ('$pat_id', '$lastname', '$firsname', '$middleInit', '$bdate', '$age', '$gender', '$blood_type', '$cont_id', '$eme_id');");
				if ($step3) {
					$step3 = mysqli_query($con,"INSERT INTO `users` (`user_id`, `username`, `password`, `patientID`, `role`, `archived`) VALUES (NULL, '$username', '$password', '$pat_id', 'patient', 'false');");
				}
			}
		}
	}

?>