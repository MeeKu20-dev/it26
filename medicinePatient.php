<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/medicine.css?=<?php echo time(); ?>">
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

      <div class="search">
        <label>
          <input type="text" placeholder="Search Medicine">
          <i class="fa-solid fa-magnifying-glass"></i>
        </label>


      </div>
    </div>

    <div class="details">
      <div class="patient">
        <div class="cardHeader">
          <h2>Medicine's Information </h2>
          <a href="#" class="btn">View All</a>
        </div>
        <table>
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

  <script src="styles/adminMain.js"></script>
</body>

</html>