<?php

require_once "connexion.php";

$error_message="";
// Initialize variables to store user input and error messages
$username = $email = $phone = $password = "";
$errors = array();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input fields
    $username = trim($_POST["NOM"]);
    $email = trim($_POST["EMAIL"]);
    $phone = trim($_POST["TELEPHONE"]);
    $password = $_POST["MOTDEPASSE"];

    // If there are no errors, proceed to create the account
    if (count($errors) === 0) {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare and execute the SQL query to insert data into the database
        $sql = "INSERT INTO utilisateurs (NOM, EMAIL, MOTDEPASSE, TELEPHONE) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $phone);

        if ($stmt->execute()) {
            // Account created successfully
            // Redirect to a success page or display a success message
            header("Location: success.php");
            exit();
        } else {
            // Error occurred while inserting data into the database
            $error_message = "Something went wrong. Please try again later.";
        }

        $stmt->close();
    }
}
?>
