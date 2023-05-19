<?php
    include("database.php");
    include("functions.php");
	

	$count = mysqli_query($con,"SELECT COUNT(*) as total FROM `admission` WHERE 1;");
	$user_data = mysqli_fetch_assoc($count);
    $total = $user_data['total'] + 1;

	if(isset($_POST["admit"])) {

		$adm_id = "ad0".$total;
		$adm_date=$_POST['admission_date'];
		$pat_id=$_POST['patient_id'];
		$doc_id=$_POST['doctor_id'];
		$illness=$_POST['illness'];
		
		$sql = "insert into admission (AdmissionNo, admdate, patientID, doctorID, illness) values ('$adm_id', '$adm_date', '$pat_id', '$doc_id', '$illness')";
		if ($con->query($sql) === TRUE) {
			echo "<script>alert('Patient Successfully Admitted...'); window.location.href = 'addRecords.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}

	if(isset($_POST["prescribe"])) {
		$adm_id=$_POST['admission_id'];
		$med_id=$_POST['med_code'];
		$dosage=$_POST['dosage'];
		
		$sql = "INSERT INTO `prescription` (`AdmissionNo`, `medcode`, `dosage`) VALUES ('$adm_id', '$med_id', '$dosage')";
		if ($con->query($sql) === TRUE) {
			echo "<script>alert('Prescription Successfully Added...'); window.location.href = 'addRecords.php';</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	if(isset($_POST["delete"])) {
		if (isset($_COOKIE['id'])) {
			$id = $_COOKIE['id'];
			$sql = "DELETE FROM prescription WHERE `prescription_id` = $id";
			if ($con->query($sql) === TRUE) {
				echo "<script>alert('Prescription Successfully Deleted...'); window.location.href = 'manageRecords.php';</script>";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
?>