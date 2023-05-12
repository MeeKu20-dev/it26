<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles/manageAcc.css?v=<?php echo time(); ?>">
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
                            <td>Px10</td>
                        </tr>
                        <tr>
                            <th>Full Name:</th>
                            <td>Abdul Jakol D. Salsalani</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td>30</td>
                        </tr>

                        <tr>
                            <th>Birth Date:</th>
                            <td>2023-02-01</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>Male</td>
                        </tr>

                        <tr>
                            <th>Blood Type:</th>
                            <td>O</td>
                        </tr>

                        <tr>
                            <th>Address:</th>
                            <td>Blk 2 Lot 10 San Antonio Village, Matina, Davao City</td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td>0938499334</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>abdul@gmail.com</td>
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
                            <td>Nicole Kog D. Salsalani</td>
                        </tr>
                        <tr>
                            <th>Contact Number:</th>
                            <td>09234837451</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>nicole@gmail.com</td>
                        </tr>
                        <tr>
                            <th>Relationship:</th>
                            <td>Wife</td>
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

                            <table>

                                <tr>
                                    <th>Full Name:</th>
                                    <td><input type="text" name="fullname" id="fullname" required></td>
                                </tr>
                                <tr>
                                    <th>Age:</th>
                                    <td><input type="number" maxlength="3" name="age" id="age" required></td>
                                </tr>

                                <tr>
                                    <th>Birth Date:</th>
                                    <td><input type="date" name="bdate" id="bdate" required></td>
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
                                    <td><select id="blood-type" name="blood-type" required>
                                            <option value="">--Please select--</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select></td>
                                </tr>

                                <tr>
                                    <th>Address:</th>
                                    <td><input type="text" name="address" id="address"></td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="contact" id="contact"></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><input type="text" name="e-mail" id="e-mail"></td>
                                </tr>
                            </table>

                            <div class="buttons">
                                <button type="reset">Clear</button>
                                <button type="submit">Submit</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

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

                            <table>
                                <tr>
                                    <th>Full Name:</th>
                                    <td><input type="text" name="e-fullname" id="e-fullname"></td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" name="phone-num" id="phone-num"></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><input type="text" name="email-add" id="email-add"></td>
                                </tr>
                                <tr>
                                    <th>Relationship:</th>
                                    <td><input type="text" name="relationship" id="relationship"></td>
                                </tr>
                            </table>
                            <div class="buttons">
                                <button type="reset">Clear</button>
                                <button type="submit">Submit</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </dialog>

</body>

</html>