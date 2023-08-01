<?php

include('../config/dbconn.php');

function getAll($table) {
    global $conn;
    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Query execution failed, handle the error
        die("Error: " . mysqli_error($conn));
    }

    return $result;
}

function getById($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
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
