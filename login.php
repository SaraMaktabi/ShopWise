<?php
session_start(); // Démarrez la session si ce n'est pas déjà fait

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous d'avoir inclus le fichier de connexion à la base de données ici
    // Exemple : require_once "db_connection.php";

    // Récupérez les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connexion à la base de données (remplacez les informations de connexion par les vôtres)
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "shopwise";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requête SQL pour récupérer l'utilisateur par email
    $stmt = $conn->prepare("SELECT ID_UTILISAT, MOTDEPASSE FROM utilisateurs WHERE EMAIL = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["MOTDEPASSE"];

        // Vérification du mot de passe
        if (password_verify($password, $hashedPassword)) {
            // Connexion réussie
            $_SESSION['user_id'] = $row["ID_UTILISAT"];
            
            // Récupérez le rôle de l'utilisateur à partir de la base de données
            $user_id = $row["ID_UTILISAT"];
            $stmt_role = $conn->prepare("SELECT ROLE FROM utilisateurs WHERE ID_UTILISAT = ?");
            $stmt_role->bind_param("i", $user_id);
            $stmt_role->execute();
            $result_role = $stmt_role->get_result();
            
            if ($result_role->num_rows == 1) {
                $role_row = $result_role->fetch_assoc();
                $role = $role_row["ROLE"];
                
                if ($role == 1) {
                    // L'utilisateur a un rôle de 1, redirigez vers le tableau de bord
                    $_SESSION['message'] = "Welcome to dashboard.";
                    header("Location: admin/dashboard.php");
                    exit();
                } else {
                    // L'utilisateur a un rôle de 0, redirigez vers la page d'accueil
                    $_SESSION['message'] = "Login successful.";
                    header("Location: index.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "Role retrieval failed.";
                header("Location: login.php"); // Redirigez vers la page de connexion avec un message d'erreur
                exit();
            }
            
            $stmt_role->close();
        } else {
            $_SESSION['message'] = "Invalid password.";
            header("Location: login.php"); // Redirigez vers la page de connexion avec un message d'erreur
            exit();
        }
        

    $stmt->close();
    $conn->close();
}
}
?>
