<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopwise";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check
if(!$conn)
{
    die("Connection Failed: ".mysqli_connect_error());
}
?>
