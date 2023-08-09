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

    if (mysqli_num_rows($check_email_query_run)<0) 
    {
        $_SESSION['message']="email already existed";
        
    }else{
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
                $_SESSION['message']= "Something went wrong";
                header('Location: ../index.php');
            }
        }else{
            $_SESSION['message']= "password do not match";
            header('Location: index.php');
        }
    }

    
}


else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $login_query = "SELECT * FROM utilisateurs WHERE EMAIL='$email' AND MOTDEPASSE='$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (!$login_query_run) {
        die("Query error: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth']= true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['ID_UTILISAT'];
        $usern= $userdata['name'];
        $useremail= $userdata['email'];
        $role_as= $userdata['role_as'];
        

        $_SESSION['aute_user']= [
            'user_id' => $userid,
            'name' => $usern,
            'email' => $useremail
        ];

        $_SESSION['role_as']= $role_as;
        if($role_as == 1){
            $_SESSION['message']= "Welcome to dashboa";
            header('localtion: ../admin/dashboard.php');
        }else{
            $_SESSION['message']= "logged in successfully";
        header('Localtion: ../index.php');
        }

        

    }else{
        $_SESSION['message']= "Invalid Credentials";
        header('Location : ../index.php');
    }
}
?>