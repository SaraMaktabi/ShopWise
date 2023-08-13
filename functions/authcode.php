<?php

include('../config/dbconn.php');


if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $check_email_query = "SELECT EMAIL FROM utilisateurs WHERE EMAIL='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        echo "<script>console.log('Email already exists');</script>";
    } else{
        if($password == $cpassword)
        {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            //insert user data
            $insert_query = "INSERT INTO utilisateurs (NOM, EMAIL, MOTDEPASSE, TELEPHONE ) VALUES ('$name','$email', '$hashed_password', '$phone' )";
            $insert_query_run = mysqli_query($conn, $insert_query);
            if ($insert_query_run) 
            {
                $_SESSION['message']= "registered Succesfully";
                header('Location: ../index.php');
            }else{
                echo "<script>console.log('Something went wrong');</script>";
                header('Location: ../index.php');
            }
        }else{
            echo "<script>console.log('Passwords do not match');</script>";
            header('Location: index.php');
        }
    }

    
}


elseif (isset($_POST['login_btn'])) {
    // Login logic
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $login_query = "SELECT * FROM utilisateurs WHERE EMAIL='$email'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (!$login_query_run) {
        die("Query error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_assoc($login_query_run);
        $hashed_password = $userdata['MOTDEPASSE'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $userdata['ID']; // Store user ID in session
            $_SESSION['auth'] = true;
            
            $userid = $userdata['ID'];
            $username = $userdata['name'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail
            ];

            $_SESSION['role_as'] = $role_as;
            if ($role_as == 1) {
                $_SESSION['message'] = "Welcome to dashboard";
                header('Location: ../admin/dashboard.php');
            } else {
                $_SESSION['message'] = "Logged in successfully";
                header('Location: ../index.php');
            }
        } else {
            $_SESSION['error'] = 'Invalid Credentials';
            header('Location: ../categories.php');
        }
    } else {
        $_SESSION['error'] = 'Invalid Credentials';
        header('Location: ../categories.php');
    }
}

?>

