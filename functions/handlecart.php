<?php
session_start();
include('../config/dbconn.php');


if(isset($_POST['scope'])){
    $scope = $_POST['scope'] ;
    switch($scope){
        case "add":
            $prod_id = $_POST['prod_id'];
            $prod_qty = $_POST['prod_qty'];

            $chk_exist_cart = "SELECT * FROM carts WHERE prod_id='$prod_id'";
            $chk_exist_cart_run = mysqli_query($conn, $chk_exist_cart);
            if(mysqli_num_rows($chk_exist_cart_run)>0){
                echo "exist";
            }else{
                $insert_query = "INSERT INTO carts ( prod_id, prod_qty) VALUES ( '$prod_id', '$prod_qty')";
                $insert_query_run = mysqli_query($conn, $insert_query);

                if($insert_query_run){
                    echo 201;
                }else{
                    echo 500;
                }
            }
            break;
        case "update":
            $prod_id = $_POST['prod_id'];
            $prod_qty = $_POST['prod_qty'];

            $chk_exist_cart = "SELECT * FROM carts WHERE prod_id='$prod_id'";
            $chk_exist_cart_run = mysqli_query($conn, $chk_exist_cart);
            if(mysqli_num_rows($chk_exist_cart_run)>0){
                $update_query = "UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id'";
                $update_query_run = mysqli_query($conn , $update_query);

                if($update_query_run){
                    echo 200;
                }else{
                    echo 500;
                }
            }else{
                echo "something went wrong";
            }
            break;
        case "delete":
            $cart_id = $_POST['cart_id'];
            

            $chk_exist_cart = "SELECT * FROM carts WHERE id='$cart_id'";
            $chk_exist_cart_run = mysqli_query($conn, $chk_exist_cart);
            if(mysqli_num_rows($chk_exist_cart_run)>0){
                $delete_query = "DELETE FROM carts WHERE id='$cart_id'";
                $delete_query_run = mysqli_query($conn , $delete_query);

                if($delete_query_run){
                    echo 200;
                }else{
                    echo 500;
                }
            }else{
                echo "something went wrong";
            }
            break;
        default:
            echo 500;
    }
}




?>