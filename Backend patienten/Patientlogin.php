<center><h1>Log hier in als patiënt</h1></center><br><br>
<?php 
$conn = new mysqli("localhost","root","","");
?> 
<center>  
    <form method="post"> 
        Voornaam
        <input type="text" name="Voornaam"><br>
        Familienaam 
        <input type="text" name="Achternaam"><br>
        Wachtwoord
        <input type="text" name="Wachtwoord"> <br>
        <input type="submit" name="login" value="Log in">
    </form>
</center>

<?php 
if (isset($_POST["login"]))
{
    $voornaam = $_POST["Voornaam"];
    $achternaam = $_POST["Achternaam"];
    $wachtwoord = $_POST["Wachtwoord"]; 
    $sql = "SELECT * from ? where ? = $voornaam and 
    ? = $achternaam and
    ? = $wachtwoord"
    $result = $conn->query($sql)
    $output = mysqli_num_rows($result);
    if ($output == 1)
    {
        
    }
}

$conn->close()
?>