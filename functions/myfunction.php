<?php

include('config/dbconn.php');

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

function getById($table, $id, $idColumnName) {
    global $conn;

    // Vérifier si la colonne spécifiée dans $idColumnName existe dans la table
    $query_check = "SHOW COLUMNS FROM $table WHERE Field='$idColumnName'";
    $result_check = mysqli_query($conn, $query_check);
    if (!$result_check || mysqli_num_rows($result_check) === 0) {
        // La colonne spécifiée n'existe pas dans la table, gérer l'erreur
        die("Error: Column '$idColumnName' not found in table $table");
    }

    // Exécuter la requête SELECT avec la clause WHERE utilisant la colonne spécifiée
    $query = "SELECT * FROM $table WHERE $idColumnName='$id'";
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
