<?php
include("database.php");
include("functions.php");

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM prescription WHERE `prescription_id` = $id";
    if ($con->query($sql) === TRUE) {
        echo "Prescription Successfully Deleted...";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_POST['ad'])) {
    $id = $_POST['ad'];
    $sql = "DELETE FROM admission WHERE `AdmissionNo` = '$id'";
    if ($con->query($sql) === TRUE) {
        echo "Prescription Successfully Deleted...";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>