<?php
   session_start(); 
?>
<html>
    <head>
        <link rel="icon" type="image/png" href="image.png"/>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
       <div class="loginTab">
            <h1>Login doctor</h1>
            <form action="login.php" method="post">
            <b>E-mail</b><br>
                <input type="text" name="email" class="inputBox" placeholder="E-mail"><br>
                <b>Password</b><br>
                <input type="password" name="password" class="inputBox"placeholder="Password"><br>
                <button type=submit name="login-submit">login</button><br>
            </form>
        </div>
        <div class="registerTab">
            <h1>Register doctor</h1>
            <form action="register.php" method="post">
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
