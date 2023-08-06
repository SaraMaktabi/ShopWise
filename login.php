<?php


// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de connexion à la base de données
    require_once "connexion.php";

    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Requête pour récupérer l'utilisateur avec l'email donné
    $sql = "SELECT ID_UTILISAT, MOTDEPASSE FROM utilisateurs WHERE EMAIL = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // L'utilisateur existe, vérifier le mot de passe
        $row = $result->fetch_assoc();
        $stored_password = $row["MOTDEPASSE"];

        if (password_verify($password, $stored_password)) {
            // Mot de passe correct, rediriger l'utilisateur vers la page de succès
            session_start();
            $_SESSION['user_id'] = $row["ID_UTILISAT"];
            $stmt->close();
            $conn->close();
            header("Location: dashboard.php");
            exit();
        } else {
            // Mot de passe incorrect, redirection avec message d'erreur
            $stmt->close();
            $conn->close();
            header("Location: index.php?error_message=Mot de passe incorrect");
            exit();
        }
    } else {
        // L'utilisateur n'existe pas, redirection avec message d'erreur
        $stmt->close();
        $conn->close();
        header("Location: index.php?error_message=L'email saisi n'existe pas dans la base de données");
        exit();
    }
}
?>
