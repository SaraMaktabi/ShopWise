<?php
session_start();
include('../config/dbconn.php');
include('../functions/myfunction.php');

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
else if (isset($_POST['update_cat_btn'])) {

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $update_query = "UPDATE categories SET name=?, description=?, image_cat=? WHERE ID_CATEGORIE=?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $description, $update_filename, $category_id);
    $update_query_run = mysqli_stmt_execute($stmt);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("edit-cat.php?id=$category_id", "Category updated successfully");
    } else {
        redirect("edit-cat.php?id=$category_id", "Something went wrong");
    }
}
else if (isset($_POST['delete_cat_btn'])) {

    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE ID_CATEGORIE=$category_id";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image_cat'];

    $delete_query = "DELETE FROM categories WHERE ID_CATEGORIE='$category_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if($delete_query_run){

        if (file_exists("../uploads/" . $image)) {
            unlink("../uploads/" . $image);
        }
        redirect("category.php", "Category deleted successfully");
        
    }else{
        redirect("category.php", "Something went wrong");

    }

}


else if(isset($_POST['add_prod_btn'])){

    $category_id = $_POST['category_id'];

    $name = $_POST['name']; 
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    

    $product_query = "INSERT INTO produits (ID_CATEGORIE, name, description, price, image_p ) 
    VALUES('$category_id', '$name', '$description', '$price', '$filename')";

    $product_query_run = mysqli_query($conn, $product_query);


    if (!$product_query_run) {
        die("Error during product insertion: " . mysqli_error($conn));
    }


    if($product_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename );
        redirect("add-prod.php","Product added succesfully");   
    }else{
        redirect("add-prod.php","Something went wrong");
    }

}
else if (isset($_POST['update_prod_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != "") {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } else {
        $update_filename = $old_image;
    }

    $update_query = "UPDATE produits SET name=?, description=?, image_p=?, price=? WHERE ID_PRODUIT=?";
    $stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $description, $update_filename, $price, $product_id); // Changed "sssis" to "ssssi"
    $update_query_run = mysqli_stmt_execute($stmt);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if (file_exists("../uploads/" . $old_image)) {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("edit-prod.php?id=$product_id", "Product updated successfully");
    } else {
        redirect("edit-prod.php?id=$product_id", "Something went wrong");
    }
}


else{
    header('location: ../index.php');
}
?>