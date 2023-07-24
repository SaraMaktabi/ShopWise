<?php
// create_account.php

// Ensure that the form data is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Extract the form data
    $user = htmlspecialchars($_POST["NOM"]);
    $phone = htmlspecialchars($_POST["TELEPHONE"]);
    $email = htmlspecialchars($_POST["EMAIL"]);
    $password = $_POST["MOTDEPASSE"];

    // Encrypt the password using password_hash
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Include the database connection file
    include 'connexion.php';

    // Prepare and execute the SQL query to insert the user data into the database
    $sql = "INSERT INTO utilisateurs (NOM, EMAIL, MOTDEPASSE, TELEPHONE) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user, $email, $hashedPassword, $phone);

    // Execute the query and handle errors
    if ($stmt->execute()) {
        // Account creation successful
        session_start();
        $_SESSION['user_id'] = $stmt->insert_id; // Store the user ID in the session
        header("Location: dashboard.php"); // Redirect to the dashboard or home page
        exit();
    } else {
        // Account creation failed
        $error_message = "Error creating account: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
