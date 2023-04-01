<?php
session_start();
include("database.php");
include("functions.php");

$query = "SELECT ( SELECT COUNT(*) FROM patient ) AS 'total patients',( SELECT COUNT(*) FROM medicine ) AS 'total medicine' ,( SELECT COUNT(*) FROM doctor ) AS 'total doctors' FROM DUAL";
$result = mysqli_query($con, $query);
if ($result) {
  if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $total_patients = $user_data['total patients'];
    $total_doctors = $user_data['total doctors'];
    $total_medicine = $user_data['total medicine'];
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
  <link rel="stylesheet" href="adminMain.css?v=<?php echo time(); ?>">
  <title>Document</title>
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
          <a href="#">
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
        <h2>DASHBOARD</h2>
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
          <div class="date">2023-20-02</div>
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
              <input type="text" placeholder="Search Admission #">
              <i class="fa-solid fa-magnifying-glass"></i>
            </label>
          </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <th>Admission Number</th>
            <th>Admitted Date</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Illness</th>
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
              <input type="text" placeholder="Search Admission #">
              <i class="fa-solid fa-magnifying-glass"></i>
            </label>
          </div>
        </div>

        <table>
          <thead>
            <th>Admission Number</th>
            <th>Medcode</th>
            <th>Dosage</th>
          </thead>
          <tbody>
            <?php

            $query = mysqli_query($con, "select * from `prescription`");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo ucwords($row['AdmissionNo']); ?></td>
                <td><?php echo ucwords($row['medcode']); ?></td>
                <td><?php echo $row['dosage']; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>
      </div>
    </div>

    <script src="adminMain.js"></script>
</body>

</html>