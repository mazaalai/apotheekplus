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

            <script>
                // When the user scrolls the page, execute myFunction 
                window.onscroll = function() {myFunction()};

                // Get the navbar
                var navbar = document.getElementById("navbar");

                // Get the offset position of the navbar
                var sticky = navbar.offsetTop;

                // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
                function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
                }
                </script>

        <img src = "img/logo.svg" class = "logo">
                
        <div class="textbox">
            <form name="form1" action="" method="post">

                <img src = "img/medicin.jpg" class = "medicin">
                
            </form>
            </div>

        <div class="text">
            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <h2> About us </h2>
                <p>People with chronic illnesses always need the same medication. Until now they always needed to go</p>
                <p>see a doctor to get their prescription. We wanted to do something about this. That is why we started</p>
                <p>our project apotheek+. This project will make it possible to get your prescription via your</p>
                <p>smartphone. This means not going to the doctor all the time and having more free time.</p>
                </div>
            </form>

        <div class="names">
            <form name="form2" action="" method="post">
                <p class="small">Concept by: Alex Willemen - Taivan Enkhbayar - Jochen Snoeks - Luca De Boeck - Serhat</p>
                <p class="small">Inspiration lab project: Chronic Illness Prescription Application</p>
            </form>
            </div>
    </body>
</html>
