<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="addRecords.css" />
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
            <a href="adminMain.php">
              <span class="icon">
                <i class="fa-solid fa-house"></i>
              </span>
              <span class="title">Dashboard</span>
            </a>
          </li>

          <li>
            <a href="patient.html">
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
            <a href="#">
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
      </div>
      <div class="ad-form">
        <form method="post" action="admit.php">
          <h2>Admission Form</h2> <br>
          <label for="admission_id">Admission ID:</label>
          <input type="text" id="admission_id" name="admission_id" /><br />

          <label for="admission_date">Admission Date:</label>
          <input type="date" id="admission_date" name="admission_date" /><br />

          <label for="patient_id">Patient ID:</label>
          <input type="text" id="patient_id" name="patient_id" /><br />

          <label for="doctor_id">Doctor ID:</label>
          <input type="text" id="doctor_id" name="doctor_id" /><br />


          <label for="illness">Illness:</label>
          <input type="text" id="illness" name="illness" /><br />

          <button type="clear">Clear</button>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>

    <script src="adminMain.js"></script>
  </body>
</html>