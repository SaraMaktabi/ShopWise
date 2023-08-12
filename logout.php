<?php
session_start();
// Détruire toutes les données de session
session_destroy();
// Rediriger vers la page d'accueil ou une autre page
header('Location: index.php'); // Changez "index.php" par la page de redirection souhaitée
?>
