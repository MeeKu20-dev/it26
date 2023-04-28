<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/addRecords.css?v=<?php echo time(); ?>">
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
          <label for="admission_id">Admission #:</label>
          <input type="text" id="admission_id" name="admission_id" /><br />

          <label for="admission_date">Admission Date:</label>
          <input type="date" id="admission_date" name="admission_date" /><br />

          <label for="patient_id">Patient ID:</label>
          <input type="text" id="patient_id" name="patient_id" /><br />

          <label for="doctor_id">Doctor ID:</label>
          <input type="text" id="doctor_id" name="doctor_id" /><br />


          <label for="illness">Illness:</label>
          <input type="text" id="illness" name="illness" /><br />

          <button type="reset">Clear</button>
          <button type="submit">Submit</button>
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
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>

    <script src="styles/adminMain.js"></script>
</body>

</html>