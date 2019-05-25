<?php
$address = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "apotheekplus";
$connection = mysqli_connect($address,$dbusername,$dbpassword,$dbname);

if (!$connection){
    die("Connection failed: ".mysqli_connect_error());
}
?>