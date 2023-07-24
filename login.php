<?php
// authenticate.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Include the database connection file
        include 'connexion.php'; 

        // Prepare and execute the SQL query to fetch the user's hashed password
        $sqli = "SELECT ID_UTILISAT, MOTDEPASSE FROM utilisateurs WHERE EMAIL = ?";
        $stmt = $conn->prepare($sqli);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userID, $hashedPassword);

        if ($stmt->fetch()) {
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct, user is authenticated
                session_start();
                $_SESSION['user_id'] = $userID;
                header("Location: dashboard.php"); // Redirect to the dashboard or home page
                exit();
            } else {
                // Password is incorrect
                $error_message = "Incorrect email or password";
            }
        } else {
            // User not found
            $error_message = "User not found";
        }

        // Close the statement and the database connection
        $stmt->close();
        $conn->close();
    }
}
?>
