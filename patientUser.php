<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/patientUSer.css?v=<?php echo time(); ?>">
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
                <h2>WELCOME, (FN SA PATIENT)!</h2>
            </div>
        </div>


        <div class="information">
            <div class="details">
                <div class="patient">
                    <div class="cardHeader">
                        <h2>PERSONAL INFORMATION</h2>
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

            <div class="history">
                <div class="medical">
                    <div class="cardHeader">
                        <h2>MEDICAL HISTORY</h2>
                    </div>

                    <table>

                    </table>
                </div>
        </div>

        <script src="styles/adminMain.js"></script>
</body>

</html>