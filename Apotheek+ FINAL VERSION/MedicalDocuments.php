<?php
session_start();
?>

<html>
    <head>
        <title>Apotheek+</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="icon" type="image/jpg" href="img/minilogo.jpg">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>

    <body>
    <div class="navbar" id="navbar">
            <a class="bold" href="homepage.php">Apotheek+</a>
            <div class="dropdown">
                <button class="dropbtn">☰
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="MedicalDocuments.php">Medical Documents</a>
                <a href="Prescriptions.php">Prescriptions</a>
                <a href="AskYourDoctor.php">Ask your doctor</a>
                </div>
            </div>

            <?php
            //show logout button if doctor of client is logged in, else the login button
            if (isset($_SESSION['idDoctor'])){
                echo('<a href="logout.php" class="testright">Logout Doctor</a>');
            }
            else if (isset($_SESSION['userId'])){
                echo('<a href="logout.php" class="testright">Logout User</a>');
            }
            else{
                echo('<a href="login.php" class="testright">Account</a>');
            }
            ?>
            </div>

        <h1>Medical Documents</h1>

        <?php
            //if the doctor has logged in
            if (isset($_SESSION['idDoctor'])){
                echo('<br><br><br>
                <table>
                <tr>
                    <td style="padding-left: 40px;">Prescription 23/01/1999</td>
                    <td><a href = "img/prescription.jpg">preview</a></td>
                    <td><a download="prescription 23/01/1999" href="img/prescription.jpg" title="ImageName">download</a></td>
                </tr>
                <tr>
                    <td style="padding-left: 40px;">Prescription 03/04/2007</td>
                    <td><a href = "img/prescription2.jpg">preview</a></td>
                    <td><a download="prescription 03/04/2007" href="img/prescription2.jpg" title="ImageName">download</a></td>
                </tr>
                <tr>
                    <td style="padding-left: 40px;">Allergies 08/12/2011</td>
                    <td><a href = "img/alergies.png">preview</a></td>
                    <td><a download="allergies.jpg" href="img/alergies.jpg" title="ImageName">download</a></td>
                </tr>
                <tr>
                    <td style="padding-left: 40px;">CT scan shoulder 05/06/2013</td>
                    <td><a href = "img/CT-shoulder.jpg">preview</a></td>
                    <td><a download="CT-shoulder.jpg" href="img/CT-shoulder.jpg" title="ImageName">download</a></td>
                </tr>
                </table>');

            }
            //if the client has logged in
            else if (isset($_SESSION['userId'])){
                echo('<br><br><br>
                <table>
                <tr>
                    <td style="padding-left: 40px;">Prescription 23/01/1999</td>
                    <td><a href = "img/prescription.jpg">preview</a></td>
                    <td><a download="prescription 23/01/1999" href="img/prescription.jpg" title="ImageName">download</a></td>
                </tr>
                <tr>
                    <td style="padding-left: 40px;">Prescription 03/04/2007</td>
                    <td><a href = "img/prescription2.jpg">preview</a></td>
                    <td><a download="prescription 03/04/2007" href="img/prescription2.jpg" title="ImageName">download</a></td>
                </tr>
                <tr>
                    <td style="padding-left: 40px;">Allergies 08/12/2011</td>
                    <td><a href = "img/alergies.png">preview</a></td>
                    <td><a download="allergies.jpg" href="img/alergies.jpg" title="ImageName">download</a></td>
                </tr>
                <tr>
                    <td style="padding-left: 40px;">CT scan shoulder 05/06/2013</td>
                    <td><a href = "img/CT-shoulder.jpg">preview</a></td>
                    <td><a download="CT-shoulder.jpg" href="img/CT-shoulder.jpg" title="ImageName">download</a></td>
                </tr>
                </table>');
            }
            //if nobody has logged in
            else{
                echo('<br><br><br>
                <p>You need to log in to see your medical documents</p>
                <center><a href="login.php" class="">Login</a></center>');
            }
        ?>


        <div class="names">
            <form name="form2" action="" method="post">
                <p class="small">Concept by: Alex Willemen - Taivan Enkhbayar - Jochen Snoeks - Luca De Boeck - Serhat</p>
                <p class="small">Inspiration lab project: Chronic Illness Prescription Application</p>
            </form>
            </div>
    </body>
</html>
