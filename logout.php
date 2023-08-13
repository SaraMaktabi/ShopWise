<?php
session_start();
// Set authentication status to false
$_SESSION['auth'] = false;

// Destroy all session data
session_destroy();

// Redirect to the desired page
header('Location: index.php'); // Change "index.php" to the page you want to redirect to
?>
