<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/medicine.css?=<?php echo time(); ?>">
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
    }

    .details .patient {
      position: relative;
      display: grid;
      background: var(--white);
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.10);
      border-radius: 20px;
      max-height: 500px;
      overflow-y: scroll;
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
      background: #f5f5f5;
      text-decoration: none;
      color: var(--black1);
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
      background-color: #fff;

    }

    .details table thead td {
      font-weight: 600;
    }

    .details .patient table tr {
      color: var(--black1);
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);

    }

    .details .patient table tr:last-child {
      border-bottom: none;
    }

    /* .details  .patient table tbody tr:hover {
    background: var(--blue);
    color: var(--white);
  } */
    .details .patient table tr td {
      padding: 10px;
      text-align: center;

    }

    .details .patient table tr td:last-child {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .patient table tr td:nth-child(2) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .patient table tr td:nth-child(3) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .patient table tr td:nth-child(4) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .details .patient table tr td:nth-child(5) {
      text-align: center;
      border-left: 1px solid rgba(0, 0, 0, 0.1);
    }

    .show-button {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .show-button {
      background-color: #2e2185;
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

      <div class="search">
        <label>
          <input type="text" placeholder="Search Medicine" id="myInput3" onkeyup='medTableSearch()'>
          <i class="fa-solid fa-magnifying-glass"></i>
        </label>
      </div>
    </div>

    <div class="details">
      <div class="patient">
        <div class="cardHeader">
          <h2>Medicine's Information </h2>
        </div>
        <table id="medTable">
          <thead>
            <tr>
              <th>Med Code</th>
              <th>Name</th>
              <th>Generic</th>
              <th>Volume</th>
              <th>Price</th>
            </tr>
          </thead>

          <tbody>
            <?php

            include("database.php");
            include("functions.php");

            $query = mysqli_query($con, "select * from `medicine`");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo ucwords($row['medcode']); ?></td>
                <td><?php echo ucwords($row['name']); ?></td>
                <td><?php echo $row['generic']; ?></td>
                <td><?php echo ucwords($row['volume']); ?></td>
                <td><?php echo $row['price']; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="styles/adminMain.js" type="application/javascript"></script>
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