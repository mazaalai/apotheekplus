<html>
    <head>
        <title>Registration</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
                
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="navbar">
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
            <a href="login.php" class="testright">Account</a>
            </div>

    <div class="registerdoctorcontainer">
        <form name="form1" action="registerLogic.php" method="post" enctype="multipart/form-data">

            <img src="img/user.png" class="user">
            <h2 class="register"> Create Account </h2>
            <p>Firstname</p>
            <input type="text" name="firstname" placeholder="name" required pattern="^[A-Za-z\s]+">
            <p>Lastname</p>
            <input type="text" name="lastname" placeholder="lastname" required pattern="^[A-Za-z\s]+">
            <p>E-mail adress</p>
            <input type="text" name="reg-email" placeholder="e-mail adress" >
            <p>Business number</p>
            <input type="password" name="br-number" placeholder="business number" required pattern="^[A-Za-z0-9]+">
            <p>Choose password</p>
            <input type="password" name="pswd" placeholder="••••••••" required pattern="^[A-Za-z0-9]+">
            <p>Repeat password</p>
            <input type="password" name="repswd" placeholder="••••••••" required pattern="^[A-Za-z0-9]+">
            <br>
            <br>
            <br>
            <button type=submit name="register-submit">Register</button><br>
            <!--<input type="submit" name="submit1" value="submit">-->
        </form>
    </div>
</body>

</html>
