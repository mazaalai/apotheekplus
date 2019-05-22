<center><h1> Vraag hier een medicijn aan </h1> 

<form method="post">
Naam medicijn 
<input type="text" name="medicine"><br><br> 
Naam huisdokter 
<input type="text" name="doctor"><br><br>
Reden 
<input type="text" name="reason"><br><br>
Hoe dringend is het medicijn? 
<input type="radio" name="urgency" value="Dringend">Dringend
<input type="radio" name="urgency" value="Niet dringend">Niet dringend <br><br>
<input type="submit" name="submit" value="Dien aanvraag in">

</form></center>
<?php 

$conn = new mysqli("localhost", "root","","prescriptionsite"); 

if ($conn->connect_error)
{
    die("Connection failed");
}

if (isset($_POST["medicine"]) && isset($_POST["doctor"]) && isset($_POST["reason"]) && 
isset($_POST["urgency"]) && isset($_POST["submit"]))
{
    $medicine = $_POST["medicine"];
    $doctor = $_POST["doctor"];
    $reason = $_POST["reason"];
    $urgency = $_POST["urgency"];
    
    //query afwerken 
    $sql = "INSERT INTO ? () 
    VALUES ($medicine, $doctor, $reason, $urgency)";
    $result = $conn->query($sql);

    if ($result == false)
    {
        echo "Aanvraag mislukt";
    }

}



$conn->close(); 