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

    <div class="registercontainer">
        <form name="form1" action="registerLogic.php" method="post" enctype="multipart/form-data">

            <img src="img/user.png" class="user">
            <h2 class="register"> Create Account </h2>
            <p>Firstname</p>
            <input type="text" name="Firstname_u" placeholder="name" required pattern="^[A-Za-z\s]+">
            <p>Lastname</p>
            <input type="text" name="Lastname_u" placeholder="lastname" required pattern="^[A-Za-z\s]+">
            <p>Gender</p>
            <select name="gender">
                <option value="man">man</option>
                <option value="woman">woman</option>
            </select>
            <b>Social security number</b>
            <input type="text" name="socialsecuritynumberpatient" placeholder="xx.xx.xx-yyy.yy">
            <b>Geboorteplaats</b>
            <input type="text" name="placeofbirthpatient" placeholder="Geboorteplaats">

            <b>Geboortedatum</b>
            <input type="date" name="dateofbirthpatient">

            <b>Straat</b>
            <input type="text" name="streetnamepatient" placeholder="Straat">

            <b>Huisnummer</b>
            <input type="number" name="housenumberpatient" placeholder="Huisnummer">

            <b>Plaats</b>
            <input type="text" name="townpatient" placeholder="Gemeente">
            <p>E-mail adress</p>
            <input type="text" name="emailUser" placeholder="e-mail adress">
            <p>Choose password</p>
            <input type="password" name="password" placeholder="••••••••" required pattern="^[A-Za-z0-9]+">
            <p>Choose password</p>
            <input type="password" name="re-password" placeholder="••••••••" required pattern="^[A-Za-z0-9]+">
            <br>
            <br>
            <br>
            <button type=submit name="register-users-submit">Register</button>
            <!--<input type="submit" name="submit1" value="submit">-->
            </form>
        </div>
</body>

</html>
