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

/*function getById($table, $id) {
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Query execution failed, handle the error
        die("Error: " . mysqli_error($conn));
    }

    return $result;
}*/

function getById($table, $id) {
    global $conn;

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM $table WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

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
