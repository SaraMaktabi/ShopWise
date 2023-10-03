<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once "config/dbconn.php";

    // Récupérez les données du formulaire
    $username = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Vérification basique des champs
    if ($password != $cpassword) {
        $_SESSION['message'] = "Passwords do not match.";
        header("Location: categories.php"); 
        exit();
    }

    // Hashage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données 
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "shopwise";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requête SQL sécurisée pour insérer les données dans la base de données
    $stmt = $conn->prepare("INSERT INTO utilisateurs (NOM, TELEPHONE, EMAIL, MOTDEPASSE) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $phone, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Redirection après inscription réussie
        $_SESSION['message'] = "Account created successfully.";
        header("Location: index.php"); // Redirigez vers la page de connexion
        exit();
    } else {
        $_SESSION['message'] = "Error creating account: " . $conn->error;
        header("Location: create_account.php"); // Redirigez vers la page du formulaire avec un message d'erreur
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
