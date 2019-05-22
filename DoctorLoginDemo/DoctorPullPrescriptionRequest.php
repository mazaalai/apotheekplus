<?php 

$connection = new mysqli("localhost", "root", "", "apotheekplus");
if ($connection->connect_error)
{
    die("Connection Failed.<br>");
}

?>




<center><h1>Registreer hier als patiënt</h1></center> 
<form method="post">
    
    <b>Doctor ID:</b><br>
    <input type="int" name="doctorID" placeholder="ID" ><br>
    <input type="submit" value="Submit!" name="submit"><br>
    
</form>



<?php 


if (isset($_POST["submit"]))
{
    /*
    user_id int NOT NULL,
	first_name varchar(100) NOT NULL,
	last_name varchar(100) NOT NULL,
    gender varchar(20) NOT NULL,
    national_insurence_number varchar(20),
	birth_date date,
	birth_place varchar(100),
	adress varchar(200),
    family_doctor_id int
    */
    $doctorID = $_POST["doctorID"];
    
    
/*
    if (empty($doctorID) )
    {
        header("Location:localhost/patientenregistration3.php?emptyfields");
        exit();
    }
*/
    $sql = "SELECT * FROM Prescriptions WHERE doctor_id =  $doctorID ";
   
    $result = $connection->query($sql);
    echo "<h1> Prescription requests: </h1><br>";
    while($row = $result->fetch_assoc()){
        //Getting user data
        $sqlUser = "SELECT * FROM users WHERE user_id = $row[user_id] ";
        $userResult = $connection->query($sqlUser);
        $userRow = $userResult->fetch_assoc();
        //Getting Medicine data
        $sqlMedicine = "SELECT * FROM medicines WHERE medicine_id = $row[medicine_id] ";
        $medicineResult = $connection->query($sqlMedicine);
        $medicineRow = $medicineResult->fetch_assoc();
        
        echo "Name:" . $userRow['first_name']. " ". $userRow['last_name']." " ." Medicine:". $medicineRow['name'] . "<br>";
    }
   
}

?> 