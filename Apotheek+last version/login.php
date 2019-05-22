<html>
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type = "text/css" href="stylesheet.css">
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

        <div class="logincontainer">
            <form name="form1" action="loginLogic.php" method="post">
                <img src = "img/user.png" class = "user">
                <h2 class="login"> Log In Here </h2>
                <p>Enter e-mail adress</p>
                <input type="text" name="email" placeholder="e-mail adress">

                <p>Enter password </p>
                <input type="password" name="password" placeholder="••••••••" required pattern="^[A-Za-z0-9]+">
                <button type=submit name="login-submit">login</button>
                <!--<input type="submit" name="submit1" value="login">-->
                <a href="chooseregistration.php">Create Account</a>
            </form>
            </div>
    </body>
</html>

