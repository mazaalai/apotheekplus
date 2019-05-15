<?php
   session_start(); 
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <?php
            if (isset($_SESSION['idDoctor'])){
                echo '<h2>Welcome Dr. '.$_SESSION['Lastname'].' you are logged in!</h2>';
                echo '<form action="logout.php" method="post">
                        <button type=submit name="logout-submit">logout</button><br>
                      </form>';
            }
            else{
                echo '
        <div class="loginTab">
            <h1>Login doctor</h1>
            <form action="login.php" method="post">';
            if (isset($_GET['error'])){
                if ($_GET['error']== "l-emptyfields"){
                    echo "<h4>fill in all fields</h4>";
                }
                else if ($_GET['error']== "l-incorrectEmail"){
                    echo "<h4>fill in a correct E-mail</h4>";
                }
                else if ($_GET['error']== "l-sqlerror"){
                    echo "<h4>something went wrong</h4>";
                }
                else if ($_GET['error']== "nodoctor"){
                    echo "<h4>No doctor can be found</h4>";
                }
                else if ($_GET['error']== "l-wrongpwd"){
                    echo "<h4>You entered a wrong password</h4>";
                }
                }
            else{

            }
                echo '<b>E-mail</b><br>
                <input type="text" name="email" class="inputBox" placeholder="E-mail"><br>
                <b>Password</b><br>
                <input type="password" name="password" class="inputBox"placeholder="Password"><br>
                <button type=submit name="login-submit">login</button><br>
            </form>
        </div>
        <div class="registerTab">
            <h1>Register doctor</h1>';
            if (isset($_GET['error'])){
                if ($_GET['error']== "emptyfields"){
                    echo "<h4>fill in all fields</h4>";
                }
                else if ($_GET['error']== "invalidinfo"){
                    echo "<h4>Please enter valid information</h4>";
                }
                else if ($_GET['error']== "invalidmail"){
                    echo "<h4>fill in a correct E-mail</h4>";
                }
                else if ($_GET['error']== "invalidname"){
                    echo "<h4>fill in a valid Firstname</h4>";
                }
                else if ($_GET['error']== "invalidlastname"){
                    echo "<h4>fill in a valid Lastname</h4>";
                }
                else if ($_GET['error']== "invalidbrnumber"){
                    echo "<h4>fill in a valid business number</h4>";
                }
                else if ($_GET['error']== "invalidpassword"){
                    echo "<h4>fill in a valid password</h4>";
                }
                else if ($_GET['error']== "sqlerror"){
                    echo "<h4>something went wrong</h4>";
                }
                else if ($_GET['error']== "emailexists"){
                    echo "<h4>E-mail already in use</h4>";
                }
            } 
            else if (isset($_GET['register'])){
                if ($_GET['register']== "succes"){
                    echo "<h4>Your account has been created</h4>";
                }
            }
            else{

            }
            echo '<form action="register.php" method="post">
                <b>Firstname</b><br>
                <input type="text" name="firstname" class="inputBox" placeholder="Firstname"><br>
                <b>Lastname</b><br>
                <input type="text" name="lastname" class="inputBox" placeholder="Lastname"><br>
                <b>E-mail</b><br>
                <input type="text" name="reg-email" class="inputBox" placeholder="E-mail"><br>
                <b>Business number</b><br>
                <input type="text" name="br-number" class="inputBox" placeholder="Business number"><br>
                <b>Password</b><br>
                <input type="password" name="pswd" class="inputBox"placeholder="Password"><br>
                <b>Repeat password</b><br>
                <input type="password" name="repswd" class="inputBox" placeholder="Repeat password"><br>
                <button type=submit name="register-submit">Register</button><br>
            </form>
        </div>
    </body>
</html>
';
        }
        ?>