<?php
session_start();
require ('config/database.php');

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    

    if(!$username){
        $_SESSION['signin'] = "Username required";
    }elseif (!$password) {
        $_SESSION['signin'] = "Password Required";
    }else{
        // fetch user from database
        $fetch_user_query = "SELECT * FROM users WHERE username='$username'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);
        if(mysqli_num_rows($fetch_user_result) == 1){
            // convert the record into an aaociative array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            // compare form paaword with database password
            if(password_verify($password, $db_password)){
                //  set session for access control
                $_SESSION['user-id'] = $user_record['id'];
                header('location: ' . ROOT_URL . 'index.php');
            }else{
                $_SESSION['signin'] = "Please check your input";
            }
        }else{
            $_SESSION['signin'] = "User not found. Contact Codezilar";
        }
    }

    // if any problem occurs, redirect to signin page with loged in details
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'login.php');
        die();
    }

}else{
    header('location: ' . ROOT_URL . 'login.php');
    die();
}
?>