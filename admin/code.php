<?php
session_start();
include('config/dbconn.php');
include('functions/myfunction.php');

if(isset($_POST['add_cat_btn'])){

    $name = $_POST['name']; 
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cat_query = "INSERT INTO categories (name,description,image_cat) VALUES ('$name', '$description','$filename' )";

    $cat_query_run = mysqli_query($conn, $cat_query);

    if($cat_query_run){

        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename );
        redirect("add-cat.php","Category added succesfully");
    }else{
        redirect("add-cat.php", "something went wrong");
    }
}
?>