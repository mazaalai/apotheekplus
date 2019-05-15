<?php
//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if (isset($_POST['login-submit'])){
    require 'dbConnection.php';
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (empty($email)||empty($password)){
        header("Location: login.php?error=l-emptyfields&email=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: login.php?error=l-incorrectEmail");
        exit();
    }
    else{
        $sql = "SELECT * FROM doctors WHERE emailDoctor=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: login.php?error=l-sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['passwordDoctor']);
                if ($pwdCheck == false){
                    header("Location: login.php?error=l-wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['idDoctor'] = $row['idDoctors'];
                    $_SESSION['Firstname'] = $row['firstName'];
                    $_SESSION['Lastname'] = $row['lastName'];
                    $_SESSION['email'] = $row['emailDoctor'];
                    header("Location: homepage.php?login=succes");
                    exit();
                }
                else{
                    header("Location: login.php?error=l-wrongpwd");
                    exit();
                }
            }
            else{
                header("Location: login.php?error=nodoctor");
                exit();
            }
        }
    }
}