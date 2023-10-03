<?php

require 'functions/userfunction.php';
// session_start(); 

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopwise";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifiez la connexion
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['placeOrderBtn'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {

        $_SESSION['message'] = "All fields are mandatory";
        header('Location: ../checkout.php');
        exit(0);
    }
    $user_id = $_SESSION['user_id'];
    $cartItems = getCartItems($user_id);
    $totalPrice = 0;
    foreach ($cartItems as $citem) {
        $totalPrice += $citem['price'] * $citem['prod_qty'];
    }

    // Ajoutez des guillemets autour des valeurs dans la requête
    $insert_query = "INSERT INTO orders (user_id, name, email, phone, address, pincode, total_price) 
                     VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice')";
    $insert_query_run = mysqli_query($conn, $insert_query);

    if ($insert_query_run) {
        $order_id = mysqli_insert_id($conn);

        foreach ($cartItems as $citem) {
            $prod_id = $citem['prod_id'];
            $prod_qty = $citem['prod_qty'];
            $price = $citem['price'];

            // Ajoutez des guillemets autour des valeurs dans la requête
            $insert_items_query = "INSERT INTO order_items (order_id, prod_id, qty, price) 
                                   VALUES ('$order_id', '$prod_id', '$prod_qty', '$price')";
            $insert_items_query_run = mysqli_query($conn, $insert_items_query);


        }
         // Mettre à jour la quantité en stock après l'insertion de la commande
         foreach ($cartItems as $citem) {
            $prod_id = $citem['prod_id'];
            $prod_qty = $citem['prod_qty'];

            $update_stock_qty_query = "UPDATE stock SET QUANTITE_EN_STOCK = QUANTITE_EN_STOCK - $prod_qty WHERE PRODUIT_ID = $prod_id";
            $update_stock_qty_query_run = mysqli_query($conn, $update_stock_qty_query);
        }

        // Vider le panier de l'utilisateur
        $clear_cart_query = "DELETE FROM carts WHERE user_id = $user_id";
        $clear_cart_query_run = mysqli_query($conn, $clear_cart_query);


        

        $_SESSION['message'] = "Order placed successfully";
        header('Location: my-order.php');
        die();
    }
}
?>
