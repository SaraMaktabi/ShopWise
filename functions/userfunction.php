<?php
session_start();
include('config/dbconn.php');

function getAllActive($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Query execution failed, handle the error
        die("Error: " . mysqli_error($conn));
    }

    return $result;
}

function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header("Location: $url");
    exit();
}
?>