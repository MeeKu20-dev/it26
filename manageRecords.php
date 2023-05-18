<?php
session_start();
include("database.php");
include("functions.php");

$result = mysqli_query($con, $query);
if ($result) {
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles/manageRecords.css?v=<?php echo time(); ?>">
    <title>St. Kerby Hospital - Admin</title>
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
            width: 100%;
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

        .cardBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }

        .cardBox .card {
            position: relative;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            width: 350px;
        }

        .cardBox .card .numbers {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--blue);
        }

        .cardBox .card .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
        }

        .cardBox .card .iconBx {
            font-size: 3.5rem;
            color: var(--black2);
        }

        .cardBox .card:hover {
            background: var(--blue);
        }

        .cardBox .card:hover .numbers,
        .cardBox .card:hover .cardName,
        .cardBox .card:hover .iconBx,
        .cardBox .card:hover .date {
            color: var(--white);
        }

        .date {
            position: relative;
            top: 8px
        }

        .details {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-gap: 10px;
            margin-top: 10px;
        }

        .details .admission {
            position: relative;
            display: grid;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            max-height: 400px;
            overflow-y: scroll;
        }

        .searchAD {
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .searchAD label {
            position: relative;
            width: 100%;
        }

        .searchAD label input {
            height: 30px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 20px;
            outline: none;
        }

        .prescription label i {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
        }

        .searchPresc {
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .prescription label {
            position: relative;
            width: 100%;
        }

        .prescription label input {
            height: 30px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 20px;
            outline: none;
        }

        .searchPresc label i {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
            color: black;
        }

        .admission input {

            width: 100%;
            height: 20px;
            border-radius: 40px;
            padding: 5px 10px;
            padding-left: 35px;
            outline: none;
        }

        .admission label i {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
            color: black;
        }

        .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            position: sticky;
            top: 0;
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

        .details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .details table thead th {
            position: sticky;
            top: 60px;
            background: white;
        }

        .details table thead td {
            font-weight: 600;
        }

        .details .admission table tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);

        }

        .details .admission table tr:last-child {
            border-bottom: none;
        }

        .details .admission table tr td {
            padding: 10px;
            text-align: center;

        }

        .details .admission table tr td:last-child {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .admission table tr td:nth-child(2) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .admission table tr td:nth-child(3) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .admission table tr td:nth-child(3) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .admission table tr td:nth-child(4) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .admission table tr td:nth-child(5) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .prescription {
            position: relative;
            display: grid;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            max-height: 400px;
            overflow-y: scroll;
        }

        .prescription input {
            width: 100%;
            height: 20px;
            border-radius: 40px;
            padding: 5px 10px;
            padding-left: 35px;
            outline: none;
        }

        .details table thead td {
            font-weight: 600;
        }

        .details .prescription table tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);

        }

        .details .prescription table tr:last-child {
            border-bottom: none;
        }

        .details .prescription table tr td {
            padding: 10px;
            text-align: center;

        }

        .details .prescription table tr td:last-child {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .prescription table tr td:nth-child(2) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .prescription table tr td:nth-child(3) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .prescription table tr td:nth-child(4) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .prescription table tr td:nth-child(5) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }



        .edit-button1,
        .delete-button1 {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button2,
        .delete-button2 {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-button1 {
            background-color: #2196F3;
        }

        .delete-button1 {
            background-color: #f44336;
        }

        .edit-button2 {
            background-color: #2196F3;
        }

        .delete-button2 {
            background-color: #f44336;
        }

        .edit-button1:hover {
            background-color: #0b7dda;
        }

        .delete-button1:hover {
            background-color: #e53935;
        }

        .edit-button2:hover {
            background-color: #0b7dda;
        }

        .delete-button2:hover {
            background-color: #e53935;
        }

        .fa {
            margin-right: 5px;
        }


        .details .prescription table tr td button {
            text-decoration: none;
            padding: 10px;
        }

        .details .patients {
            position: relative;
            display: grid;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            max-height: 400px;
            overflow-y: scroll;
        }

        .details table thead td {
            font-weight: 600;
        }

        .details .patients table tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);

        }

        .details .patients table tr:last-child {
            border-bottom: none;
        }

        .details .patients table tr td {
            padding: 10px;
            text-align: center;
        }

        .details .patients table tr td:last-child {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .patients table tr td:nth-child(2) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .patients table tr td:nth-child(3) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .patients table tr td:nth-child(4) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .patients table tr td:nth-child(5) {
            text-align: center;
            border-left: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .patients table tr td button {
            text-decoration: none;
            padding: 10px;
        }

        .searchPat {
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .searchPat label {
            position: relative;
            width: 100%;
        }

        .searchPat label input {

            height: 30px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            width: 50%;
            outline: none;
        }

        .searchPat label i {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
        }

        .pop-modal {
            position: relative;
            width: 100%;
            padding: 20px;
        }

        .pop-modal .newAdm {
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

        .newAdm {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .newAdm form {
            padding: 20px;
            width: 100%;
            background: #fff;
        }

        .newAdm label {
            display: flex;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .newAdm input[type="text"] {
            width: 70%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newAdm input[type="date"] {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newAdm select {
            width: 30%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .newAdm button {
            margin-right: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .newAdm button[type="reset"] {
            background: red;
        }

        .newAdm button[type="reset"]:hover {
            background: rgb(235, 123, 123);
        }

        .newAdm button[type="submit"] {
            background: green;
        }

        .newAdm button[type="submit"]:hover {
            background: rgb(94, 203, 94);
        }

        .newAdm button[type="button"]:hover {
            background: rgb(120, 123, 120);
        }

        .details .newAdm {
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

        #myModal-Presc {

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

            .modal-dialog {
                margin: 0 auto;
                padding: 20px;
                width: 100%;
                max-width: 100%;
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

                <li id="dashboard">
                    <a href="adminMain.php">
                        <span class="icon">
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="patient.php">
                        <span class="icon">
                            <i class="fa-solid fa-hospital-user"></i>
                        </span>
                        <span class="title">Patient</span>
                    </a>
                </li>

                <li>
                    <a href="doctor.php">
                        <span class="icon">
                            <i class="fa-solid fa-user-doctor"></i>
                        </span>
                        <span class="title">Doctor</span>
                    </a>
                </li>

                <li>
                    <a href="medicine.php">
                        <span class="icon">
                            <i class="fa-solid fa-tablets"></i>
                        </span>
                        <span class="title">Medicine</span>
                    </a>
                </li>

                <li>
                    <a href="addRecords.php">
                        <span class="icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </span>
                        <span class="title">Add records</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </span>
                        <span class="title">Manage records</span>
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
                <h2>MANAGE RECORDS</h2>
            </div>
        </div>

        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">
                        <?php
                        if (isset($total_patients)) {
                            echo $total_patients;
                        }
                        ?></div>
                    <div class="cardName">Today's Patient</div>
                    <div class="date"><?php echo date("Y-m-d") ?></div>
                </div>

                <div class="iconBx">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">
                        <?php
                        if (isset($total_doctors)) {
                            echo $total_doctors;
                        }
                        ?></div>
                    <div class="cardName">Doctors</div>
                </div>

                <div class="iconBx">
                    <i class="fa-sharp fa-solid fa-user-doctor"></i>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">
                        <?php
                        if (isset($total_medicine)) {
                            echo $total_medicine;
                        }
                        ?></div>
                    <div class="cardName">Medicines</div>
                </div>

                <div class="iconBx">
                    <i class="fa-solid fa-tablets"></i>
                </div>
            </div>
        </div>



        <div class="details">
            <div class="admission">
                <div class="cardHeader">
                    <h2>Admissions</h2>
                    <div class="searchAD">
                        <label>
                            <input type="text" placeholder="Search Admission #" id="myInput0" onkeyup='adTableSearch()'>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </label>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="admissionTable">
                    <thead>
                        <th>Admission Number</th>
                        <th>Admitted Date</th>
                        <th>Patient ID</th>
                        <th>Doctor ID</th>
                        <th>Illness</th>
                        <th></th>

                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($con, "select * from `admission`");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo ucwords($row['AdmissionNo']); ?></td>
                                <td><?php echo ucwords($row['admdate']); ?></td>
                                <td><?php echo $row['patientID']; ?></td>
                                <td><?php echo ucwords($row['doctorID']); ?></td>
                                <td><?php echo $row['illness']; ?></td>
                                <td>
                                    <button class="edit-button1" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-pencil"></i> Edit</button>
                                    <button class="delete-button2"><i class="fa fa-trash"></i> Delete</button>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="prescription">
                <div class="cardHeader">
                    <h2>Prescription</h2>
                    <div class="searchPresc">
                        <label>
                            <input type="text" placeholder="Search Admission #" id="myInput9" onkeyup='presTableSearch()'>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </label>
                    </div>
                </div>

                <table id="presTable">
                    <thead>
                        <th>ID</th>
                        <th>Admission Number</th>
                        <th>Medcode</th>
                        <th>Dosage</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php

                        $query = mysqli_query($con, "select * from `prescription`");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $row['prescription_id']; ?></td>
                                <td><?php echo ucwords($row['AdmissionNo']); ?></td>
                                <td><?php echo ucwords($row['medcode']); ?></td>
                                <td><?php echo $row['dosage']; ?></td>
                                <td>
                                    <button class="edit-button2" data-bs-toggle="modal" data-bs-target="#myModal-Presc"><i class="fa fa-pencil"></i> Edit</button>
                                    <button class="delete-button1"><i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        const edit1Buttons = document.querySelectorAll('.edit-button1');
        edit1Buttons.forEach(button => {
            button.addEventListener('click', event => {
                const row = event.target.parentNode.parentNode;
                var admNum = row.cells[0].textContent;
                var date = row.cells[1].textContent;
                var patientName = row.cells[2].textContent;
                var docID = row.cells[3].textContent;
                var ill = row.cells[4].textContent;

                document.getElementById('admission-id').value = admNum;
                document.getElementById('admission_date').value = date;
                document.getElementById('patient_id').value = patientName;
                document.getElementById('doctor_id').value = docID;
                document.getElementById('illness').value = ill;

                var modal = document.getElementById("myModal");
                modal.querySelector(".cardHeader h2").textContent = admNum + " - " + patientName;
            });
        });


        const edit2Buttons = document.querySelectorAll('.edit-button2');

        edit2Buttons.forEach(button => {
            button.addEventListener('click', event => {
                const row = event.target.parentNode.parentNode;
                var admNum = row.cells[0].textContent;
                var med = row.cells[2].textContent;
                var dos = row.cells[3].textContent;
                document.getElementById('pres-id').value = admNum;
                document.getElementById('med_code').value = med;
                document.getElementById('dosage').value = dos;
                console.log(admNum);

                var modal = document.getElementById("myModal-Presc");
                modal.querySelector(".cardHeader h2").textContent = "Prescription ID: " + admNum;
            });
        });

        const delete1Buttons = document.querySelectorAll('.delete-button1');

        delete1Buttons.forEach(button => {
            button.addEventListener('click', event => {
                const row = event.target.parentNode.parentNode;
                const id = row.cells[0].textContent;

                if (confirm(`Are you sure you want to delete record with ID: ${id}?`)) {
                    // Send AJAX request to delete the record
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'delete.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                            // Reload the page to show the updated table
                            location.reload();
                        }
                    };
                    xhr.send(`id=${id}`);
                }
            });
        });

        const delete2Buttons = document.querySelectorAll('.delete-button2');

        delete2Buttons.forEach(button => {
            button.addEventListener('click', event => {
                const row = event.target.parentNode.parentNode;
                const ad = row.cells[0].textContent;

                if (confirm(`Are you sure you want to delete record with Admission Number: ${ad}?`)) {
                    // Send AJAX request to delete the record
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'delete.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                            // Reload the page to show the updated table
                            location.reload();
                        }
                    };
                    xhr.send(`ad=${ad}`);
                }
            });
        });

        function clearCookie() {
            location.reload();
        }
    </script>
    <?php
    if (isset($_SESSION['edit_id'])) {
        $adID = $_SESSION['edit_id'];
        unset($_SESSION['edit_id']);
    }
    ?>
    <dialog class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pop-modal">
                    <div class="newAdm">
                        <div class="cardHeader">
                            <h2><?php echo $adID ?> - FullName sa Patient</h2>
                        </div>
                        <form method="post" action="editRecord.php">
                            <input type="hidden" id="admission-id" name="admission-id" value="">

                            <label for="admission_date">Admission Date:</label>
                            <input type="date" id="admission_date" name="admission_date" value="" /><br />

                            <label for="patient_id">Patient ID:</label>
                            <input type="text" id="patient_id" name="patient_id" value="" /><br />

                            <label for="doctor_id">Doctor ID:</label>
                            <input type="text" id="doctor_id" name="doctor_id" value="" /><br />

                            <label for="illness">Illness:</label>
                            <input type="text" id="illness" name="illness" value="" /><br />

                            <button type="reset">Clear</button>
                            <button type="submit" name="edit-admission">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
    <dialog class="modal-Presc" id="myModal-Presc">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pop-modal">
                    <div class="newPresc">
                        <div class="cardHeader">
                            <h2>admNum - Name sa Patient</h2>
                        </div>
                        <form class="presc-record" method="post" action="editRecord.php">
                            <input type="hidden" id="pres-id" name="pres-id" value="">
                            <label for="med_code">Med Code:</label>
                            <input type="text" id="med_code" name="med_code" /><br />

                            <label for="dosage">Dosage:</label>
                            <input type="text" id="dosage" name="dosage" /><br />

                            <button type="reset">Clear</button>
                            <button type="submit" name="editPres">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal-Presc">Close</button>
                        </form>
                    </div>
                </div>
            </div>
    </dialog>
    <dialog class="modal-Patient" id="myModal-Patient">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pop-modal">
                    <div class="newPatient">
                        <div class="cardHeader">
                            <h2>admNum - Name sa Patient</h2>
                        </div>
                        <form class="presc-record" method="post" action="admit.php">

                            <label for="med_code">Med Code:</label>
                            <input type="text" id="med_code" name="med_code" /><br />

                            <label for="dosage">Dosage:</label>
                            <input type="text" id="dosage" name="dosage" /><br />

                            <button type="reset">Clear</button>
                            <button type="submit">Submit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
    </dialog>
    <script src="styles/adminMain.js" type="application/javascript"></script>
    <script type="application/javascript">
        function adTableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput0");
            filter = input.value.toUpperCase();
            table = document.getElementById("admissionTable");
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

        function presTableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput9");
            filter = input.value.toUpperCase();
            table = document.getElementById("presTable");
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