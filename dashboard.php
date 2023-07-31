<?php
// page_de_succes.php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de succès</title>
</head>
<body>
    <h1>Bienvenue sur la page de succès !</h1>
    <!-- Le contenu de votre page de succès ici -->
</body>
</html>
