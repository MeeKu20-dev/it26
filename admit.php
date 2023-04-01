<?php
    include("database.php");
    include("functions.php");
	
	$adm_id=$_POST['admission_id'];
	$adm_date=$_POST['admission_date'];
	$pat_id=$_POST['patient_id'];
	$doc_id=$_POST['doctor_id'];
	$illness=$_POST['illness'];
	
	mysqli_query($con,"insert into admission (AdmissionNo, admdate, patientID, doctorID, illness) values ('$adm_id', '$adm_date', '$pat_id', '$doc_id', '$illness')");
	header('location:adminMain.php');

?>