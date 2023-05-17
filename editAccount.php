<?php
include("database.php");
include("functions.php");

if (isset($_COOKIE['mycookie'])) {
    $id = $_COOKIE['mycookie'];
    $result = mysqli_query($con, "SELECT `contactID`, `em_contactId` FROM `patient` WHERE `patientID` = '$id';");
    $user_data = mysqli_fetch_assoc($result);
}

if($user_data) {
    $contact_id = $user_data['contactID'];
    $eme_id = $user_data['em_contactId'];
}

if(isset($_POST['editPerson'])) {
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $bdate = $_POST["bdate"];
    $gender = $_POST["gender"];
    $bloodtype = $_POST["blood-type"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["e-mail"];

    $sql = "UPDATE `patient` SET `ln` = '$lastname', `fn` = '$firstname', `mi` = '$middlename', `birthday` = '$bdate', `age` = '$age', `gender` = '$gender', `blood_type` = '$bloodtype' WHERE `patient`.`patientID` = '$id';";
    if ($con->query($sql) === TRUE) {
        $sql = "UPDATE `contact_info` SET `address` = '$address', `email` = '$email', `phone_number` = '$contact' WHERE `contact_info`.`contactId` = '$contact_id';";
        if ($con->query($sql) === TRUE) {
            header('location:manageAcc.php');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if(isset($_POST['editEme'])) {
    $fullname = $_POST['e-fullname'];
    $phone_num = $_POST['phone-num'];
    $email = $_POST['email-add'];
    $relationship = $_POST['relationship'];

    $sql = "UPDATE `emergency_contact` SET `fullname` = '$fullname', `email` = '$email', `phone_number` = '$phone_num', `relationship` = '$relationship' WHERE `emergency_contact`.`em_contactId` = '$eme_id';";
    if ($con->query($sql) === TRUE) {
        header('location:manageAcc.php');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>