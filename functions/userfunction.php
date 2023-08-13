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

function getNameActive($table, $name){

    global $conn;
    $query = "SELECT * FROM $table WHERE name='$name'";
    return $query_run = mysqli_query($conn, $query);
}


function getProdByCategory($category_id){
    global $conn;
    $query = "SELECT * FROM produits WHERE ID_CATEGORIE='$category_id'";
    return $query_run = mysqli_query($conn, $query);
}


function getIdActive($table, $id, $idColumnName) {
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

function getCartItems(){
    global $conn;
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.ID_PRODUIT as pid, p.name, p.image_p, p.price  
    FROM carts c, produits p  WHERE c.prod_id=p.ID_PRODUIT ORDER BY c.id DESC";
    return $query_run = mysqli_query($conn, $query);

}

function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header("Location: $url");
    exit();
}


?>