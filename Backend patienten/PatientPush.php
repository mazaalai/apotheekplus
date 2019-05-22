<?php 

$connection = new mysqli("localhost", "root", "", "apotheekplus");
if ($connection->connect_error)
{
    die("Connection Failed.<br>");
}

?>




<center><h1>Registreer hier als patiënt</h1></center> 
<form method="post">
    
    <b>User ID:</b><br>
    <input type="int" name="userID" placeholder="ID" ><br>
    <!--
    <b><br>Voornaam</b><br>
    <input type="text" name="firstnamepatient" placeholder="Voornaam"><br>
    
    <b>Achternaam</b><br>
    <input type="text" name="lastnamepatient" placeholder="Achternaam"><br>
    
    <b>Gender</b><br>
    <input type="radio" name="genderpatient" value="man">Man
    <input type="radio" name="genderpatient" value="vrouw">Vrouw<br>

    <b>Rijksregisternummer</b><br>
    <input type="text" name="socialsecuritynumberpatient" placeholder="xx.xx.xx-yyy.yy"><br>

    <b>Huisdokter</b><br>
   
     <input type="text" name="firstnamedoctor" placeholder="Doctor First Name"><br> 
    <input type="text" name="lastnamedoctor" placeholder="Doctor Last Name"><br> -->
    <input type="text" name="doctorID" placeholder="Doctor ID"><br>

    <input type="submit" value="Registreer!" name="submit"><br>

    
</form>



<?php 


if (isset($_POST["submit"]))
{
   
    $id = intval($_POST["userID"]);

    $doctorID = intval($_POST["doctorID"]);

    //$sql = "SELECT doctor_id FROM Doctors WHERE first_name = $doctorFirstName AND last_name = $doctorLastName"
    //$result = $connection->query($sql);
    
    //$doctorID = result($result, 0);
    $sql = "SELECT Count(*) as total FROM prescriptions";
    $result = $connection->query($sql);
    $countPresciription = $result->fetch_assoc();

    $preID = intval($countPresciription['total']) +1;
    $date = date('y/m/d', time());
    echo $id, "-", $doctorID, "-" , $preID, "-", $date;
   
    /*
    if (empty($firstname) || empty($lastname) || empty($gender)  || empty($ssnumber) || empty($doctorID))
    {
        header("Location:localhost/patientenregistration2.php?emptyfields");
        exit();
    }
    */
    
    
    $sql= "INSERT INTO prescriptions (prescription_id, user_id, doctor_id, medicine_id) 
           values ($preID, $id, $doctorID, 1  )"; 
    $result = $connection->query($sql);
   
}

?> 