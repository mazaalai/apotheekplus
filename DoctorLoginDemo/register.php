<?php
//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
if (isset($_POST['register-submit'])){
    
    require 'dbConnection.php';
    
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['reg-email'];
    $busRegNumber = $_POST['br-number'];
    $password = $_POST['pswd'];
    $rePassword = $_POST['repswd'];
    
    if (empty($name)||empty($lastname)||empty($email)||empty($busRegNumber)||empty($password)||empty($rePassword)){
        header("Location: ./?error=emptyfields&name=".$name."&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z -]*$/", $name) && !preg_match("/^[a-zA-Z -]*$/", $lastname) && !preg_match("/^[0-9]*$/", $busRegNumber)){
        header("Location: ./?error=invalidinfo");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ./?error=invalidmail&name=".$name."&lastname=".$lastname."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z -]*$/", $name)){
        header("Location: ./?error=invalidname&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z -]*$/", $lastname)){
        header("Location: ./?error=invalidlastname&name=".$name."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!preg_match("/^[0-9.]*$/", $busRegNumber)){
        header("Location: ./?error=invalidbrnumber&name=".$name."&lastname=".$lastname."&email=".$email);
        exit();
    }
    else if ($password !== $rePassword){
        header("Location: ./?error=invalidpassword&name=".$name."&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else{
        echo "nothing wrong with the enetered information";
        $sql = "SELECT emailDoctor FROM doctors WHERE emailDoctor=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ./?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultControl = mysqli_stmt_num_rows($stmt);
            if ($resultControl > 0){
                header("Location: ./?error=emailexists");
                exit(); 
            }
            else{
                $sql = "INSERT INTO doctors (firstName,lastName,emailDoctor,regBusNumber,passwordDoctor) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ./?error=sqlerror");
                    exit();
                }
                else{
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $name,$lastname,$email,$busRegNumber,$encryptedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ./?register=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
else{
    header("Location: ./");
    exit();
}
/*if (isset($_POST["password"])&&$_POST['password'] != "")
{
    if (isset($_POST["username"])&& $_POST['username'] != "")
    {
        $username = $_POST["username"];
        echo "<h2>$username</h2>";
    }
    else if (isset($_POST["username"]))
    {
        echo "please type in a username";
        $_SESSION['message'] = "please type in a username"
        header("Location: ../inspiratielab/");
    }
}
else if (isset($_POST["password"]))
{
    echo "please type in a password";
    $_SESSION['message'] = "please type in a password"
    header("Location: $actual_link./inspiratielab");
}
?>*/