<?php
session_start();
include('config/dbconn.php');

if(isset($_SESSION['auth'])){

}else{
    echo "something went wrong";
}

if(isset($_POST['scope'])){
    $scope = $_POST['scope'] ;
    switch($scope){
        case "add":
            $prod_id = $_POST['prod_id'];
            $prod_qty = $_POST['prod_qty'];

            $user_id = $_SESSION['auth_user']['user_id'];

            break;
        default:
            echo 500;
    }
}


?>