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
        header("Location: registrationdoctor.php?error=emptyfields&name=".$name."&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z -]*$/", $name) && !preg_match("/^[a-zA-Z -]*$/", $lastname) && !preg_match("/^[0-9]*$/", $busRegNumber)){
        header("Location: registrationdoctor.php?error=invalidinfo");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: registrationdoctor.php?error=invalidmail&name=".$name."&lastname=".$lastname."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z -]*$/", $name)){
        header("Location: registrationdoctor.php?error=invalidname&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z -]*$/", $lastname)){
        header("Location: registrationdoctor.php?error=invalidlastname&name=".$name."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else if (!preg_match("/^[0-9.]*$/", $busRegNumber)){
        header("Location: registrationdoctor.php?error=invalidbrnumber&name=".$name."&lastname=".$lastname."&email=".$email);
        exit();
    }
    else if ($password !== $rePassword){
        header("Location: registrationdoctor.php?error=invalidpassword&name=".$name."&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else{
        echo "nothing wrong with the enetered information";
        $sql = "SELECT emailDoctor FROM doctors WHERE emailDoctor=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: registrationdoctor.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultControl = mysqli_stmt_num_rows($stmt);
            if ($resultControl > 0){
                header("Location: registrationdoctor.php?error=emailexists");
                exit(); 
            }
            else{
                $sql = "INSERT INTO doctors (firstName,lastName,emailDoctor,regBusNumber,passwordDoctor) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: registrationdoctor.php?error=sqlerror");
                    exit();
                }
                else{
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $name,$lastname,$email,$busRegNumber,$encryptedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: login.php?register=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
//REGISTER USERS
else if (isset($_POST['register-users-submit'])){
    
    require 'dbConnection.php';
    
    $name = $_POST['Firstname_u'];
    $lastname = $_POST['Lastname_u'];
    $email = $_POST['emailUser'];
    $socialNumber = $_POST['socialsecuritynumberpatient'];
    $gender = $_POST['gender'];
    $town = $_POST['townpatient'];
    $birthdate = $_POST['dateofbirthpatient'];
    $birthplace = $_POST['placeofbirthpatient'];
    $street = $_POST['streetnamepatient'];
    $housenumber = $_POST['housenumberpatient'];
    $pass = $_POST['password'];
    $rePass = $_POST['re-password'];
    
    if (empty($name)||empty($lastname)||empty($email)||empty($pass)||empty($rePass)){
        header("Location: registration.php?error=emptyfields&name=".$name."&lastname=".$lastname."&email=".$email."&brnumber=".$busRegNumber);
        exit();
    }
    else{
        echo "nothing wrong with the enetered information";
        $sql = "SELECT * FROM users WHERE national_insurence_number=?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: registration.php?error=sqlerror1");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $socialNumber);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultControl = mysqli_stmt_num_rows($stmt);
            if ($resultControl > 0){
                header("Location: registration.php?error=emailexists");
                exit(); 
            }
            else{
                /*$sql = "INSERT INTO doctors (first_name,last_name,email,gender,national_insurence_number,birth_date,birth_place,streetName,houseNumber,town,passwordPatient) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";*/
                $sql = "INSERT INTO users (first_name,last_name,emailDoctor,gender,national_insurence_number,birth_date,birth_place,streetName,houseNumber,town,passwordPatient) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                //$sql = "INSERT INTO doctors (first_name,last_name,email,passwordPatient) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: registration.php?error=sqlerror2");
                    exit();
                }
                else{
                    $encryptedPassword = password_hash($pass, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssssss", $name,$lastname,$email,$gender,$socialNumber,$birthdate,$birthplace,$street,$housenumber,$town,$encryptedPassword);
                    if (mysqli_stmt_execute($stmt)){
                        header("Location: login.php?register=succes");
                        exit();
                    }
                    else {
                        header("Location: registration.php?register=succes");
                        exit();
                    }
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