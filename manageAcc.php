<?php
include("database.php");
include("functions.php");

if (isset($_COOKIE['mycookie'])) {
    $id = $_COOKIE['mycookie'];
    $result = mysqli_query($con, "SELECT * FROM (SELECT x.patientID, y.fullname AS 'patname', age AS 'age', birthday AS 'bday', gender AS 'gen', blood_type AS 'btype', address AS 'add', y.phone_number AS 'patnum', y.email AS 'patemail', x.fullname AS 'emename', x.phone_number AS 'emenum', x.email AS 'emeemail', relationship AS 'relation' FROM (SELECT patient.patientID, emergency_contact.fullname, emergency_contact.phone_number, emergency_contact.email, emergency_contact.relationship FROM emergency_contact INNER JOIN patient ON emergency_contact.em_contactId=patient.em_contactId) AS x INNER JOIN (SELECT patient.patientID, CONCAT( patient.fn, ' ', patient.mi, '. ', patient.ln) AS 'fullname', patient.age, patient.birthday, patient.gender, patient.blood_type, contact_info.address, contact_info.phone_number, contact_info.email FROM patient INNER JOIN contact_info ON patient.contactID=contact_info.contactId) AS y ON x.patientID=y.patientID) AS z WHERE z.patientID='$id';");
    $user_data = mysqli_fetch_assoc($result);
    $name_data = mysqli_fetch_assoc(mysqli_query($con, "SELECT `fn`, `mi`, `ln` FROM `patient` WHERE patientID='$id';"));
    $firstname = $name_data['fn'];
    $middlename = $name_data['mi'];
    $lastname = $name_data['ln'];
}
if ($user_data) {
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
    <title>St. Kerby Hospital - Patient</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&family=Oswald&family=Playfair+Display&family=Roboto+Condensed:wght@700&family=Ubuntu:wght@500&display=swap');

        * {
            font-family: "Ubuntu", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #2e2185;
            --white: #fff;
            --gray: #f5f5f5;
            --black1: #222 --black2:#999;
        }

        .body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            position: relative;
            width: 100%;
        }

        .navigation {
            position: fixed;
            width: 300px;
            height: 100%;
            background: var(--blue);
            border-left: 10px solid var(--blue);
            transition: 0.5s;
            overflow: hidden;
        }

        .navigation .logo img {
            width: 70px;
        }

        .navigation .logo-name {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navigation.active {
            width: 80px;
        }

        .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li {
            position: relative;
            width: 100%;
            list-style: none;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }

        .navigation ul li:hover {
            background-color: var(--white);
        }

        .navigation ul li:nth-child(1) {
            margin-bottom: 40px;
            pointer-events: none;
        }

        .navigation ul li a {
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);
        }

        .navigation ul li:hover a,
        .navigation ul li.hovered a {
            color: var(--blue);
        }

        .navigation ul li a .icon {
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 75px;
            text-align: center;
        }

        .navigation ul li a .icon i {
            font-size: 1.75rem;
        }

        .navigation ul li a .title {
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
        }

        /* --------- curve outside ---------- */
        .navigation ul li:hover a::before,
        .navigation ul li.hovered a::before {
            content: "";
            position: absolute;
            right: 0;
            top: -50px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            box-shadow: 35px 35px 0 10px var(--white);
            pointer-events: none;
        }

        .navigation ul li:hover a::after,
        .navigation ul li.hovered a::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: -50px;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border-radius: 50%;
            box-shadow: 35px -35px 0 10px var(--white);
            pointer-events: none;
        }


        .main {
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: var(--white);
            transition: 0.5s;
        }

        .main.active {
            width: calc(100% - 80px);
            left: 80px;
        }

        .topbar {
            margin-left: 0;
            margin-right: 0;
            max-width: 100%;
            height: 60px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 0 10px;

        }

        .toggle {
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
            color: var(--black1);
        }

        .search {
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .search label {
            position: relative;
            width: 100%;
        }

        .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
        }

        .search label i {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
        }

        .details {
            position: relative;
            padding: 20px;
            margin-top: 10px;
            display: grid;
            grid-gap: 10px;
        }


        .details .patient {
            position: relative;
            display: grid;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background: #2e2185;
            padding: 20px;

        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--white);
        }

        .cardHeader .btn {
            position: relative;
            padding: 5px 10px;
            background: var(--blue);
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
        }

        table {
            border-collapse: collapse;
            margin: 10px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #f2f2f2;

        }

        th {
            text-align: center;
            background-color: #f5f5f5;
            width: 30%;
        }


        .details .emergency {
            position: relative;
            display: grid;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background: #2e2185;
            padding: 20px;

        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--white);
        }

        .cardHeader .btn {
            position: relative;
            padding: 5px 10px;
            background: var(--blue);
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
        }

        .history {
            position: relative;
            padding: 20px;
            margin-top: 10px;
            max-height: 500px;
        }

        .history .cardHeader {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background: #2e2185;
            padding: 20px;
            height: 70px;

        }

        .history .medical {
            position: relative;
            display: grid;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            max-height: 660px;
            overflow-y: scroll;
        }

        .pop-modal {
            position: relative;
            width: 100%;
            padding: 20px;
        }

        .pop-modal .patient {
            position: relative;
            display: grid;
        }

        .pop-modal .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: #2e2185;
            padding: 20px;
            color: #fff;
        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--white);
        }

        .patient {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .patient table {
            padding: 20px;

        }

        .patient label {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .patient input[type="text"] {
            width: 70%;
            padding: 5px;
            border: none;
            font-size: 16px;
        }

        .patient input[type="number"] {
            width: 70%;
            padding: 5px;
            border: none;
            font-size: 16px;
        }

        .patient input[type="date"] {
            width: 50%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .patient select {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .patient .buttons {
            padding: 20px;
        }

        .patient button {
            margin-right: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .patient button[type="reset"] {
            background: red;
        }

        .patient button[type="reset"]:hover {
            background: rgb(235, 123, 123);
        }

        .patient button[type="submit"] {
            background: green;
        }

        .patient button[type="submit"]:hover {
            background: rgb(94, 203, 94);
        }

        .patient button[type="button"]:hover {
            background: rgb(120, 123, 120);
        }

        .details .patient {
            position: relative;
            display: grid;
        }

        .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: #2e2185;
            padding: 20px;
            color: #fff;
        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--white);
        }

        .newPresc {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .newPresc form {
            padding: 20px;
            width: 100%;
            background: #fff;
        }

        .newPresc label {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .newPresc input[type="text"] {
            width: 70%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newPresc input[type="date"] {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newPresc select {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newPresc button {
            margin-right: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .newPresc button[type="reset"] {
            background: red;
        }

        .newPresc button[type="submit"] {
            background: green;
        }

        .newPresc button[type="submit"] {
            background: green;
        }

        .newPresc button[type="reset"]:hover {
            background: rgb(235, 123, 123);
        }

        .newPresc button[type="submit"]:hover {
            background: rgb(94, 203, 94);
        }

        .newPresc button[type="button"]:hover {
            background: rgb(120, 123, 120);
        }

        .newPatient {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .newPatient form {
            padding: 20px;
            width: 100%;
            background: #fff;
        }


        .newPatient label {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }


        .newPatient input[type="text"] {
            width: 70%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newPatient input[type="date"] {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newPatient select {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newPatient button {
            margin-right: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .pop-modal .emergency {
            position: relative;
            display: grid;
        }

        .pop-modal .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: #2e2185;
            padding: 20px;
            color: #fff;
        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--white);
        }

        .emergency {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .emergency table {
            padding: 20px;

        }

        .emergency label {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .emergency input[type="text"] {
            width: 70%;
            padding: 5px;
            border: none;
            font-size: 16px;
        }

        .emergency input[type="number"] {
            width: 70%;
            padding: 5px;
            border: none;
            font-size: 16px;
        }

        .emergency input[type="date"] {
            width: 50%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .emergency select {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .emergency .buttons {
            padding: 20px;
        }

        .emergency button {
            margin-right: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .emergency button[type="reset"] {
            background: red;
        }

        .emergency button[type="reset"]:hover {
            background: rgb(235, 123, 123);
        }

        .emergency button[type="submit"] {
            background: green;
        }

        .emergency button[type="submit"]:hover {
            background: rgb(94, 203, 94);
        }

        .emergency button[type="button"]:hover {
            background: rgb(120, 123, 120);
        }

        .details .emergency {
            position: relative;
            display: grid;
        }

        #myModal {

            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        #myModal-Emergency {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        #myModal-Patient {

            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-dialog {
            margin: 0 auto;
            padding: 20px;
            width: 50%;
            max-width: 100%;
        }


        @media (max-width: 991px) {
            .navigation {
                left: -300px;
            }

            .navigation.active {
                width: 300px;
                left: 0;
            }

            .main {
                width: 100%;
                left: 0;
            }

            .main.active {
                left: 300px;
            }

            .cardBox {
                grid-template-columns: repeat(2, 1fr);
            }

            .information {
                grid-template-columns: repeat(1, 1fr)
            }

            .modal-dialog {
                margin: 0 auto;
                padding: 20px;
                width: 100%;
                max-width: 100%;
            }

            .patient input[type="text"] {
                width: 100%;
                padding: 5px;
                border: none;
                font-size: 16px;
            }


        }

        @media (max-width: 768px) {
            .details {
                grid-template-columns: 1fr;
            }

            .recentOrders {
                overflow-x: auto;
            }

            .status.inProgress {
                white-space: nowrap;
            }

            .information {
                grid-template-columns: repeat(1, 1fr)
            }

            .modal-dialog {
                margin: 0 auto;
                padding: 20px;
                width: 100%;
                max-width: 100%;
            }

            .patient input[type="date"] {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .patient select {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .patient input[type="text"] {
                width: 100%;
                padding: 5px;
                border: none;
                font-size: 16px;
            }

            .emergency input[type="date"] {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .emergency select {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .emergency input[type="text"] {
                width: 100%;
                padding: 5px;
                border: none;
                font-size: 16px;
            }

        }

        @media (max-width: 480px) {
            .cardBox {
                grid-template-columns: repeat(1, 1fr);
            }

            .cardHeader h2 {
                font-size: 20px;
            }

            .user {
                min-width: 40px;
            }

            .navigation {
                width: 100%;
                left: -100%;
                z-index: 1000;
            }

            .navigation.active {
                width: 100%;
                left: 0;
            }

            .toggle {
                z-index: 10001;
            }

            .main.active .toggle {
                color: #fff;
                position: fixed;
                left: initial;
            }

            .information {
                grid-template-columns: repeat(1, 1fr)
            }

            .patient input[type="date"] {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .patient select {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .patient input[type="text"] {
                width: 100%;
                padding: 5px;
                border: none;
                font-size: 16px;
            }

            .emergency input[type="date"] {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .emergency select {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .emergency input[type="text"] {
                width: 100%;
                padding: 5px;
                border: none;
            }


        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="logo">
                            <img src="logo.ico" alt="" />
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
                            <td><?php echo $patid ?></td>
                        </tr>
                        <tr>
                            <th>Full Name:</th>
                            <td><?php echo $patname ?></td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td><?php echo $age ?></td>
                        </tr>

                        <tr>
                            <th>Birth Date:</th>
                            <td><?php echo $bday ?></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td><?php echo $gender ?></td>
                        </tr>

                        <tr>
                            <th>Blood Type:</th>
                            <td><?php echo $btype ?></td>
                        </tr>

                        <tr>
                            <th>Address:</th>
                            <td><?php echo $address ?></td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td><?php echo $patnum ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $patmail ?></td>
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
                            <td><?php echo $emename ?></td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td><?php echo $emenum ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $ememail ?></td>
                        </tr>
                        <tr>
                            <th>Relationship:</th>
                            <td><?php echo $relation ?></td>
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
                                        <td><input type="text" name="firstname" id="firstname" value="<?php echo $firstname ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Middlename:</th>
                                        <td><input type="text" name="middlename" id="middlename" value="<?php echo $middlename ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Lastname:</th>
                                        <td><input type="text" name="lastname" id="lastname" value="<?php echo $lastname ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Age:</th>
                                        <td><input type="number" maxlength="3" name="age" id="age" value="<?php echo $age ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date:</th>
                                        <td><input type="date" name="bdate" id="bdate" value="<?php echo $bday ?>" required></td>
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
                                        <td><input type="text" name="address" id="address" value="<?php echo $address ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="contact" id="contact" value="<?php echo $patnum ?>" required></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><input type="text" name="e-mail" id="e-mail" value="<?php echo $patmail ?>" required></td>
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
                                        <td><input type="text" name="e-fullname" id="e-fullname" value="<?php echo $emename ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="phone-num" id="phone-num" value="<?php echo $emenum ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td><input type="text" name="email-add" id="email-add" value="<?php echo $ememail ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Relationship:</th>
                                        <td><input type="text" name="relationship" id="relationship" value="<?php echo $relation ?>"></td>
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
    <script>
    function clearPerson() {}

    function editPerson() {}
</script>
<script>
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

    function TableSearch() {
        let input, filter, table, tr, td, txtValue;

        //Intialising Variables
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("patientTable");
        tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function docTableSearch() {
        let input, filter, table, tr, td, txtValue;

        //Intialising Variables
        input = document.getElementById("myInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("docTable");
        tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function medTableSearch() {
        let input, filter, table, tr, td, txtValue;

        //Intialising Variables
        input = document.getElementById("myInput3");
        filter = input.value.toUpperCase();
        table = document.getElementById("medTable");
        tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


</body>

</html>