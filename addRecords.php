<?php
include 'admit.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/addRecords.css?v=<?php echo time(); ?>">
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
      color: var(--black1);
    }

    .details {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 30px;
    }

    .details .newAdm {
      position: relative;
      display: grid;
      background: var(--white);
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
      border-radius: 20px;

    }

    .details .cardHeader {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #2e2185;
      padding: 20px;
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

    .newAdm button[type="submit"] {
      background: green;
    }

    .details .newPresc {
      position: relative;
      display: grid;
      background: var(--white);
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
      border-radius: 20px;
      max-height: 350px;
    }

    .newPresc {
      display: flex;
      font-weight: bold;
    }

    .newPresc form {
      padding: 20px;
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
      width: 70%;
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

    .tables {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-gap: 10px;
      margin-top: 10px;
    }

    .tables .admission {
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

    .searchAD label i {
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
      width: 50%;
      border-radius: 40px;
      padding: 5px 20px;
      padding-left: 35px;

      outline: none;
    }

    .searchPresc label i {
      position: absolute;
      top: 0;
      left: 10px;
      font-size: 1.2rem;
    }

    .admission input {

      width: 50%;
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
    }

    .tables .cardHeader {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      position: sticky;
      top: 0;
      background-color: #2e2185;
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

    .tables table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    .tables table thead th {
      position: sticky;
      top: 60px;
      background: white;
    }

    .tables table thead td {
      font-weight: 600;
    }

    .tables .doctor table tr {
      color: var(--black1);
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);

    }

    .tables .doctor table tr:last-child {
      border-bottom: none;
    }

    .tables .doctor table tbody tr:hover {
      background: var(--blue);
      color: var(--white);
    }

    .tables .doctor table tr td {
      padding: 10px;
      text-align: center;
    }

    .tables .doctor table tr td:last-child {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .tables .doctor table tr td:nth-child(2) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .tables .doctor table tr td:nth-child(3) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .tables .doctor table tr td:nth-child(3) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .tables .patient {
      position: relative;
      display: grid;
      background: var(--white);
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
      max-height: 400px;
      overflow-y: scroll;
    }

    .tables table thead td {
      font-weight: 600;
    }

    .tables .patient table tr {
      color: var(--black1);
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);

    }

    .tables .patient table tr:last-child {
      border-bottom: none;
    }

    .tables .patient table tbody tr:hover {
      background: var(--blue);
      color: var(--white);
    }

    .tables .patient table tr td {
      padding: 10px;
      text-align: center;

    }

    .tables .patient table tr td:last-child {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .tables .patient table tr td:nth-child(2) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .tables .patient table tr td:nth-child(3) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
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
          <a href="manageRecords.php">
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
        <h2>ADD RECORD</h2>
      </div>
    </div>

    <div class="details">
      <div class="newAdm">
        <div class="cardHeader">
          <h2>New Admission</h2>
        </div>
        <form method="post" action="admit.php">
          <!-- <label for="admission_id">Admission #:</label>
          <input type="text" id="admission_id" name="admission_id" /><br /> -->

          <label for="admission_date">Admission Date:</label>
          <input type="date" id="admission_date" name="admission_date" /><br />

          <label for="patient_id">Patient ID:</label>
          <input type="text" id="patient_id" name="patient_id" /><br />

          <label for="doctor_id">Doctor ID:</label>
          <input type="text" id="doctor_id" name="doctor_id" /><br />


          <label for="illness">Illness:</label>
          <input type="text" id="illness" name="illness" /><br />

          <button type="reset">Clear</button>
          <button type="submit" name="admit">Submit</button>
        </form>
      </div>

      <div class="newPresc">
        <div class="cardHeader">
          <h2>New Prescription</h2>
        </div>
        <form class="presc-record" method="post" action="admit.php">
          <label for="admission_id">Admission #:</label>
          <input type="text" id="admission_id" name="admission_id" /><br />

          <label for="med_code">Med Code:</label>
          <input type="text" id="med_code" name="med_code" /><br />

          <label for="dosage">Dosage:</label>
          <input type="text" id="dosage" name="dosage" /><br />

          <button type="reset">Clear</button>
          <button type="submit" name="prescribe">Submit</button>
        </form>
      </div>
    </div>
    <div class="tables">
      <div class="patient">
        <div class="cardHeader">
          <h2>Patient Information </h2>
          <div class="searchAD">
            <label>
              <input type="text" placeholder="Search Admission #" id="myInput" onkeyup='patientSearch()'>
              <i class="fa-solid fa-magnifying-glass"></i>
            </label>
          </div>
        </div>
        <table id="patientTable">
          <thead>
            <tr>
              <th>PatientID</th>
              <th>Last name</th>
              <th>First Name</th>
              <th>Middle Initial</th>
              <th>Age</th>
              <th>Gender</th>

            </tr>
          </thead>

          <tbody>
            <?php

            $query = mysqli_query($con, "select * from `patient`");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo ucwords($row['patientID']); ?></td>
                <td><?php echo ucwords($row['ln']); ?></td>
                <td><?php echo $row['fn']; ?></td>
                <td><?php echo ucwords($row['mi']); ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="doctor">
        <div class="cardHeader">
          <h2>Doctor's Information</h2>
          <div class="searchAD">
            <label>
              <input type="text" placeholder="Search Admission #" id="myInput2" onkeyup='doctorSearch()'>
              <i class="fa-solid fa-magnifying-glass"></i>
            </label>
          </div>
        </div>
        <table id="doctorTable">
          <thead>
            <th>Doctor ID</th>
            <th>Fullname</th>
            <th>Gender</th>
            <th>Specialization</th>
          </thead>
          <tbody>
            <?php

            $query = mysqli_query($con, "select * from `doctor`");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo ucwords($row['doctorID']); ?></td>
                <td><?php echo ucwords($row['fullname']); ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo ucwords($row['specialization']); ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="styles/adminMain.js"></script>
    <script type="application/javascript">
      function patientSearch() {
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

      function doctorSearch() {
        let input, filter, table, tr, td, txtValue;

        //Intialising Variables
        input = document.getElementById("myInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("doctorTable");
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