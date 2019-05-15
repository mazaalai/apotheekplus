<center><h1>Registreer hier als patiënt</h1></center> 
<form method="post">

    <b><br>Voornaam</b><br>
    <input type="text" name="firstnamepatient" placeholder="Voornaam"><br>
    
    <b>Achternaam</b><br>
    <input type="text" name="lastnamepatient" placeholder="Achternaam"><br>
    
    <b>E-mail</b><br>
    <input type="email" name="emailpatient" placeholder="E-mail" ><br>

    <b>Gender</b><br>
    <input type="radio" name="genderpatient" value="man">Man
    <input type="radio" name="genderpatient" value="vrouw">Vrouw<br>

    <b>Rijksregisternummer</b><br>
    <input type="text" name="socialsecuritynumberpatient" placeholder="xx.xx.xx-yyy.yy"><br>

    <b>Geboorteplaats</b><br>
    <input type="text" name="placeofbirthpatient" placeholder="Geboorteplaats"><br>

    <b>Geboortedatum</b><br>
    <input type="date" name="dateofbirthpatient"><br>

    <b>Straat</b><br>
    <input type="text" name="streetnamepatient" placeholder="Straat"><br>

    <b>Huisnummer</b><br>
    <input type="number" name="housenumberpatient" placeholder="Huisnummer"><br>

    <b>Plaats</b><br>
    <input type="text" name="townpatient" placeholder="Gemeente"><br>

    <b>Huisdokter</b><br>
    <input type="text" name="namedoctor" placeholder="Huisdokter"><br>

    <b>Wachtwoord</b><br>
    <input type="password" name="passwordpatient"><br>

    <input type="submit" value="Registreer!" name="submit"><br>

</form>



<?php 
$conn = new mysqli("localhost","root","","");



if (isset($_POST["submit"]))
{
    $firstname = $_POST["firstnamepatient"];
    $lastname = $_POST["lastnamepatient"];
    $email = $_POST["emailpatient"];
    $gender = $_POST["genderpatient"];
    $ssnumber = $_POST["socialsecuritynumberpatient"];
    $placeofbirth = $_POST["placeofbirthpatient"];
    $dateofbirth = $_POST["dateofbirthpatient"]; 
    $streetname = $_POST["streetnamepatient"]; 
    $housenumber = $_POST["housenumberpatient"];
    $town = $_POST["townpatient"];
    $docter = $_POST["namedoctor"];
    $psw = $_POST["passwordpatient"];

    $sql= "INSERT INTO ? () 
           values ();"; 
    $result = $conn->query($sql);
    if ($result == true)
    {
        echo "Registratie succesvol!";
    }
    else
    {
        echo "Er is een probleem opgetreden!";
    }
}

?> 
