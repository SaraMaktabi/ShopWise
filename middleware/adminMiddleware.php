<?php
include('../functions/myfunction.php');



if(isset($_SESSION['auth'])){
    
    if($_SESSION['role_as']!=1){
        redirect("../index.php", "You are not autorized to access this page");
    }
}else{
    redirect("../login.php", "login to continue");
}
?>