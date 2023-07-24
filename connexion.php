<!-- connexion.php -->
<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "shopwise"; 

// Établir la connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}
?>
