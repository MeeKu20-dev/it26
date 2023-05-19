<?php
include("database.php");
include("functions.php");

if (isset($_COOKIE['mycookie'])) {
    $id = $_COOKIE['mycookie'];
    $result = mysqli_query($con, "SELECT * FROM (SELECT x.patientID, y.fullname AS 'patname', age AS 'age', birthday AS 'bday', gender AS 'gen', blood_type AS 'btype', address AS 'add', y.phone_number AS 'patnum', y.email AS 'patemail', x.fullname AS 'emename', x.phone_number AS 'emenum', x.email AS 'emeemail', relationship AS 'relation' FROM (SELECT patient.patientID, emergency_contact.fullname, emergency_contact.phone_number, emergency_contact.email, emergency_contact.relationship FROM emergency_contact INNER JOIN patient ON emergency_contact.em_contactId=patient.em_contactId) AS x INNER JOIN (SELECT patient.patientID, CONCAT( patient.fn, ' ', patient.mi, '. ', patient.ln) AS 'fullname', patient.age, patient.birthday, patient.gender, patient.blood_type, contact_info.address, contact_info.phone_number, contact_info.email FROM patient INNER JOIN contact_info ON patient.contactID=contact_info.contactId) AS y ON x.patientID=y.patientID) AS z WHERE z.patientID='$id';");
    $user_data = mysqli_fetch_assoc($result);
    $firstname = mysqli_fetch_assoc(mysqli_query($con,"SELECT fn FROM `patient` WHERE patientID='$id'"));
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/patientUSer.css?v=<?php echo time(); ?>">
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
                <h2>WELCOME, <?php echo $firstname['fn']?>!</h2>
            </div>
            <div class="print">
                <script type="module">
                    const button = document.getElementById('generate');

                    function generatePDF() {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'exportPDF.php', true);
                        xhr.responseType = 'blob';
                        xhr.onload = function(e) {
                            if (this.status == 200) {
                                // create a link element to download the PDF
                                var blob = new Blob([this.response], {type: 'application/pdf'});
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = '<?php echo $patid?>_information.pdf';
                                link.click();
                            }
                        };
                        xhr.send();
                    };

                    button.addEventListener('click', generatePDF);
                </script>
                    <button type="submit" id="generate"><i class="fa-solid fa-print"></i> Print Information</button>
            </div>
        </div>


        <div class="information">
            <div class="details">
                <div class="patient">
                    <div class="cardHeader">
                        <h2>PERSONAL INFORMATION</h2>
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

            <div class="history">
                <div class="medical">
                    <div class="cardHeader">
                        <h2>MEDICAL HISTORY</h2>
                    </div>

                    <table style="padding-top:20px">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color:#a6a4a4; color:#000">Admission Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = mysqli_query($con, "SELECT * FROM `admission` WHERE `patientID` = '$patid'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <th>Admission Number:</th>
                                <td><?php echo ucwords($row['AdmissionNo']); ?></td>
                            </tr>    
                            <tr>
                                <th>Admission Date:</th>
                                <td><?php echo ucwords($row['admdate']); ?></td>
                            </tr>   
                            <tr>
                                <th>Doctor ID:</th>
                                <td><?php echo ucwords($row['doctorID']); ?></td>
                            </tr>    
                            <tr>
                                <th>Illness:</th>
                                <td><?php echo $row['illness']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #a6a4a4; color:#000">Prescriptions</th>
                            </tr>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM `admission` WHERE `patientID`='$patid';");
                            while ($row = mysqli_fetch_array($query)) {
                                $admissionNumber[] = $row['AdmissionNo'];
                            }
                            if(isset($admissionNumber)) {
                                foreach ($admissionNumber as $ids) {
                                    $query = mysqli_query($con, "SELECT * FROM prescription WHERE AdmissionNo = '$ids'");
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <tr>
                                            <th>Med Code:</th>
                                            <td><?php echo ucwords($row['medcode']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Dosage:</th>
                                            <td><?php echo $row['dosage']; ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
            
            <script src="styles/adminMain.js"></script>
</body>
</html>