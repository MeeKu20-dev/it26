<?php
session_start();
include("database.php");
include("functions.php");

$query = "SELECT ( SELECT COUNT(*) FROM `admission` WHERE admdate=CURRENT_DATE ) AS 'total patients',( SELECT COUNT(*) FROM medicine ) AS 'total medicine' ,( SELECT COUNT(*) FROM doctor ) AS 'total doctors' FROM DUAL";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles/manageRecords.css?v=<?php echo time(); ?>">
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
                    <div class="date"><?php echo date("Y-m-d")?></div>
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
                            <input type="text" placeholder="Search Admission #"  id="myInput0" onkeyup='adTableSearch()'>
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
                            <input type="text" placeholder="Search Admission #"   id="myInput9" onkeyup='presTableSearch()'>
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
                            <h2><?php echo $adID?> - FullName sa Patient</h2>
                        </div>
                        <form method="post" action="editRecord.php">
                            <input type="hidden" id="admission-id" name="admission-id" value="">

                            <label for="admission_date">Admission Date:</label>
                            <input type="date" id="admission_date" name="admission_date" value=""/><br />

                            <label for="patient_id">Patient ID:</label>
                            <input type="text" id="patient_id" name="patient_id" value=""/><br />

                            <label for="doctor_id">Doctor ID:</label>
                            <input type="text" id="doctor_id" name="doctor_id" value=""/><br />

                            <label for="illness">Illness:</label>
                            <input type="text" id="illness" name="illness" value=""/><br />

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

</body>

</html>