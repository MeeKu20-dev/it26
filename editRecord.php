<?php
session_start();
include("database.php");
include("functions.php");

if (isset($_POST['id'])) {
    $_SESSION['edit_id'] = $_POST['id'];
}

if(isset($_POST["edit-admission"])) {
    $adm_id=$_POST['admission-id'];
    $date=$_POST['admission_date'];
    $patID=$_POST['patient_id'];
    $docID=$_POST['doctor_id'];
    $illness=$_POST['illness'];
    
    $sql = "UPDATE `admission` SET `admdate` = '$date', `patientID` = '$patID', `doctorID` = '$docID', `illness` = '$illness' WHERE `admission`.`AdmissionNo` = '$adm_id';";
    if ($con->query($sql) === TRUE) {
        echo "<script>window.location.href = 'manageRecords.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_POST["editPres"])) {
    $pres_id=$_POST['pres-id'];
    $med_code=$_POST['med_code'];
    $dosage=$_POST['dosage'];
    
    $sql = "UPDATE `prescription` SET `medcode` = '$med_code', `dosage` = '$dosage' WHERE `prescription`.`prescription_id` = $pres_id;";
    if ($con->query($sql) === TRUE) {
        echo "<script>window.location.href = 'manageRecords.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>