<?php
session_start();
?>
<html>
    <head>
        <title>Apotheek+</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
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
            <?php
            if (isset($_SESSION['idDoctor'])){
                echo('<a href="logout.php" class="testright">Logout Doctor</a>');
            }
            else if (isset($_SESSION['userId'])){
                echo('<a href="logout.php" class="testright">Logout User</a>');
            }
            else{
                echo('<a href="login.php" class="testright">Account</a>');
            }
            ?>
            <!--<a href="login.php" class="testright">Account</a>-->
            </div>

        <h1>Prescriptions</h1>
        
        <?php
        if (isset($_SESSION['idDoctor'])){
            $conn = new mysqli("localhost", "root","","apotheekplus"); 
            if ($conn->connect_error)
            {
                die("Connection failed");
            }
            $doctorID = $_SESSION['idDoctor'];
            $sql = "select * from prescriptionRequests where idDoctors = '$doctorID'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
                echo ('<br><table><tr>
                <th>Last name</th>
                <th>First name</th> 
                <th>Medicine</th>
                <th>Urgency</th>
                <th>Reason</th>
                </tr>');
                while($row = $result->fetch_assoc()) {
                    if ($row["urgency"] == "Urgent")
                    {
                        echo ("<tr><td>" . $row["lastName"]."</td>
                        <td>" . $row["firstName"]."</td>
                        <td>" . $row["medicine"]. "</td>
                        <td>" . $row["urgency"]. "</td>
                        <td>" . $row["reason"]. "</td></tr>");
                    }
                }
                echo ('</tr><tr>');
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    if ($row["urgency"] == "Not Urgent")
                    {
                        echo ("<tr><td>" . $row["lastName"]."</td><td>" . $row["firstName"]."</td><td>" . $row["medicine"]. "</td><td>" . $row["urgency"]. "</td><td>" . $row["reason"]. "</td></tr>");
                    }
                }
                echo ('</tr></table>');
            $conn->close();
            }
            else 
            {
                echo("<p>no prescriptions available</p>");
            }
        }
        else if (isset($_SESSION['userId'])){
            echo('<center><!--<h1> Vraag hier een medicijn aan </h1> -->
                <form method="post">
                <p class="subpage">Name medicine</p><br> 
                <input type="text" name="medicine"><br><br> 
                <p class="subpage">Name doctor</p><br> 
                <input type="text" name="doctor"><br><br>
                <p class="subpage">Reason</p><br> 
                <input type="text" name="reason"><br><br>
                <p class="subpage">Urgency</p><br> 
                <input type="radio" name="urgency" value="Urgent"><a class="urgent">very urgent</a><br>
                <input type="radio" name="urgency" value="Not Urgent"><a class="urgent"> not urgent </a><br><br>
                <input type="submit" name="submit" value="submit">
                </form></center>');
        }
        else{
            echo ('<br><br><br>
            <p>You need to log in to request prescriptions</p>
            <center><a href="login.php" class="">Login</a></center>');
        }
        ?>

        <div class="names">
            <form name="form2" action="" method="post">
                <p class="small">Concept by: Alex Willemen - Taivan Enkhbayar - Jochen Snoeks - Luca De Boeck - Serhat</p>
                <p class="small">Inspiration lab project: Chronic Illness Prescription Application</p>
            </form>
            </div>
    </body>
</html>

<?php 
$conn = new mysqli("localhost", "root","","apotheekplus"); 
if ($conn->connect_error)
{
    die("Connection failed");
}
if (isset($_SESSION['userId'])){
    if (isset($_POST["medicine"]) && isset($_POST["doctor"]) && isset($_POST["reason"]) && 
    isset($_POST["urgency"]) && isset($_POST["submit"]))
    {
        $medicine = $_POST["medicine"];
        $doctor = $_POST["doctor"];
        $reason = $_POST["reason"];
        $urgency = $_POST["urgency"];
        $lastname = $_SESSION['Lastname'];
        $firstname = $_SESSION['Firstname'];
        $userId = $_SESSION['userId'];

        $sql = "select * from doctors where lastName = '$doctor'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $doctorId = $row['idDoctors'];
            }
            
            //query afwerken 
            $sql = "INSERT INTO prescriptionRequests (patientID, firstName, lastName, medicine, idDoctors, doctorName, reason, urgency) 
            VALUES ('$userId','$firstname', '$lastname', '$medicine', '$doctorId', '$doctor', '$reason', '$urgency')";
            $result = $conn->query($sql);
            if ($result == false)
            {
                echo "Aanvraag mislukt";
            }
        }
        else 
        {
            header("Location: Prescriptions.php?error=nodoctor");
            exit(); 
        }
    }
}
$conn->close();