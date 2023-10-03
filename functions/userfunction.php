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

function getCartItems($user_id){
    global $conn;
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.ID_PRODUIT as pid, p.name, p.image_p, p.price  
    FROM carts c, produits p  
    WHERE c.prod_id=p.ID_PRODUIT AND c.user_id='$user_id'  -- Ajoutez la condition pour l'ID de l'utilisateur
    ORDER BY c.id DESC";
    
    return $query_run = mysqli_query($conn, $query);
}

function getOrders($user_id){
    global $conn;
    $query = "SELECT * FROM orders WHERE user_id='$user_id'";
    
    return $query_run = mysqli_query($conn, $query);
}



// Function to retrieve order details based on order_id
function getOrderDetails($order_id) {
    global $conn; // Assuming $conn is your database connection

    // Perform a database query to fetch order details
    $sql = "SELECT * FROM orders WHERE id = $order_id"; // Adjust your table name and structure
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Assuming you expect only one row for the order details
    $order_details = mysqli_fetch_assoc($result);

    return $order_details;
}

// Function to retrieve order items based on order_id
function getOrderItems($order_id) {
    global $conn; // Assuming $conn is your database connection

    // Perform a database query to fetch order items along with product names
    $sql = "SELECT oi.*, p.product_name FROM order_items oi
            INNER JOIN products p ON oi.product_id = p.id
            WHERE oi.order_id = $order_id"; // Adjust your table and column names
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Collect all order items into an array
    $order_items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $order_items[] = $row;
    }

    return $order_items;
}





function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header("Location: $url");
    exit();
}


?>