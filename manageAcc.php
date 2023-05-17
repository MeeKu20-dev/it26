<?php
include("database.php");
include("functions.php");

if (isset($_COOKIE['mycookie'])) {
    $id = $_COOKIE['mycookie'];
    $result = mysqli_query($con, "SELECT * FROM (SELECT x.patientID, y.fullname AS 'patname', age AS 'age', birthday AS 'bday', gender AS 'gen', blood_type AS 'btype', address AS 'add', y.phone_number AS 'patnum', y.email AS 'patemail', x.fullname AS 'emename', x.phone_number AS 'emenum', x.email AS 'emeemail', relationship AS 'relation' FROM (SELECT patient.patientID, emergency_contact.fullname, emergency_contact.phone_number, emergency_contact.email, emergency_contact.relationship FROM emergency_contact INNER JOIN patient ON emergency_contact.em_contactId=patient.em_contactId) AS x INNER JOIN (SELECT patient.patientID, CONCAT( patient.fn, ' ', patient.mi, '. ', patient.ln) AS 'fullname', patient.age, patient.birthday, patient.gender, patient.blood_type, contact_info.address, contact_info.phone_number, contact_info.email FROM patient INNER JOIN contact_info ON patient.contactID=contact_info.contactId) AS y ON x.patientID=y.patientID) AS z WHERE z.patientID='$id';");
    $user_data = mysqli_fetch_assoc($result);
    $name_data = mysqli_fetch_assoc(mysqli_query($con,"SELECT `fn`, `mi`, `ln` FROM `patient` WHERE patientID='$id';"));
    $firstname = $name_data['fn'];
    $middlename = $name_data['mi'];
    $lastname = $name_data['ln'];
}
if($user_data) {
    $patid = $user_data['patientID'];
    $patname = $user_data['patname'];
    $age = $user_data['age'];
    $bday = $user_data['bday'];
    $gender = $user_data['gen'];
    $btype = $user_data['btype'];
    $address = $user_data['add'];
    $patnum = $user_data['patnum'];
    $patmail = $user_data['patemail'];
    $emename = $user_data['emename'];
    $emenum = $user_data['emenum'];
    $ememail = $user_data['emeemail'];
    $relation = $user_data['relation'];
}
setcookie("mycookieID", $patid, time() + 3600, "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles/manageAcc.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="logo">
                            <img src="images/logo.ico" alt="" />
                        </span>
                        <span class="logo-name">St. Kerby Hospital</span>
                    </a>
                </li>

                <li>
                    <a href="patientUser.php">
                        <span class="icon">
                            <i class="fa-solid fa-clipboard-user"></i>
                        </span>
                        <span class="title">Personal Information</span>
                    </a>
                </li>

                <li>
                    <a href="medicinePatient.php">
                        <span class="icon">
                            <i class="fa-solid fa-tablets"></i>
                        </span>
                        <span class="title">Medicine</span>
                    </a>
                </li>

                <li>
                    <a href="doctorPatient.php">
                        <span class="icon">
                            <i class="fa-solid fa-user-doctor"></i>
                        </span>
                        <span class="title">Doctor</span>
                    </a>
                </li>
                <li>
                    <a href="manageAcc.php">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-gear"></i>
                        </span>
                        <span class="title">Manage Account</span>
                    </a>
                </li>

                <li id="dashboard">
                    <a href="main.php">
                        <span class="icon">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        <span class="title">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fa-solid fa-bars"></i>
            </div>

            <div class="title">
                <h2>MANAGE ACCOUNT</h2>
            </div>
        </div>


        <div class="information">
            <div class="details">
                <div class="patient">
                    <div class="cardHeader">
                        <h2>PERSONAL INFORMATION</h2>
                        <button class="edit-button" data-bs-toggle="modal" data-bs-target="#myModal-Patient"><i class="fa fa-pencil"></i>EDIT</button>
                    </div>

                    <table>
                        <tr>
                            <th>Patient ID:</th>
                            <td><?php echo $patid?></td>
                        </tr>
                        <tr>
                            <th>Full Name:</th>
                            <td><?php echo $patname?></td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td><?php echo $age?></td>
                        </tr>

                        <tr>
                            <th>Birth Date:</th>
                            <td><?php echo $bday?></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td><?php echo $gender?></td>
                        </tr>

                        <tr>
                            <th>Blood Type:</th>
                            <td><?php echo $btype?></td>
                        </tr>

                        <tr>
                            <th>Address:</th>
                            <td><?php echo $address?></td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td><?php echo $patnum?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $patmail?></td>
                        </tr>
                    </table>
                </div>

                <div class="emergency">
                    <div class="cardHeader">
                        <h2>EMERGENCY CONTACT</h2>
                        <button class="edit-button" data-bs-toggle="modal" data-bs-target="#myModal-Emergency"><i class="fa fa-pencil"></i>EDIT</button>
                    </div>

                    <table>
                        <tr>
                            <th>Full Name:</th>
                            <td><?php echo $emename?></td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td><?php echo $emenum?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $ememail?></td>
                        </tr>
                        <tr>
                            <th>Relationship:</th>
                            <td><?php echo $relation?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <script src="styles/adminMain.js"></script>
        </div>

    </div>
    <dialog class="modal" id="myModal-Patient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pop-modal">
                    <div class="details">
                        <div class="patient">
                            <div class="cardHeader">
                                <h2>PERSONAL INFORMATION</h2>
                            </div>
                            <form action="editAccount.php" method="POST">
                                <table>
                                    <tr>
                                        <th>Firstname:</th>
                                        <td><input type="text" name="firstname" id="firstname" value="<?php echo $firstname?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Middlename:</th>
                                        <td><input type="text" name="middlename" id="middlename" value="<?php echo $middlename?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Lastname:</th>
                                        <td><input type="text" name="lastname" id="lastname" value="<?php echo $lastname?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Age:</th>
                                        <td><input type="number" maxlength="3" name="age" id="age" value="<?php echo $age?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date:</th>
                                        <td><input type="date" name="bdate" id="bdate" value="<?php echo $bday?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>
                                            <select name="gender" id="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Others</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blood Type:</th>
                                        <td>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td><input type="text" name="address" id="address" value="<?php echo $address?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="contact" id="contact" value="<?php echo $patnum?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><input type="text" name="e-mail" id="e-mail" value="<?php echo $patmail?>" required></td>
                                    </tr>
                                </table>
                                <div class="buttons">
                                    <button type="reset">Clear</button>
                                    <button type="submit" name="editPerson">Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </dialog>
    <dialog class="modal" id="myModal-Emergency">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pop-modal">
                    <div class="details">
                        <div class="emergency">
                            <div class="cardHeader">
                                <h2>EMERGENCY CONTACT</h2>
                            </div>
                            <form method="POST" action="editAccount.php">
                                <table>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td><input type="text" name="e-fullname" id="e-fullname" value="<?php echo $emename?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="phone-num" id="phone-num" value="<?php echo $emenum?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><input type="text" name="email-add" id="email-add" value="<?php echo $ememail?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Relationship:</th>
                                        <td><input type="text" name="relationship" id="relationship" value="<?php echo $relation?>"></td>
                                    </tr>
                                </table>
                                <div class="buttons">
                                    <button type="reset">Clear</button>
                                    <button type="submit" name="editEme">Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </dialog>

</body>
<script>
    function clearPerson() {
    }
    
    function editPerson() {
    }
</script>
</html>