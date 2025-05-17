<?php

session_start();

require 'config/database.php';

// get data if sign up button is clicked

if(isset($_POST['submit'])){
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_data = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    $insert_data_query = mysqli_query($connection, $insert_data);
    if(!mysqli_errno($connection)){
        // redirect to login page with success message
        $_SESSION['signup-success'] = "Registration Successfull. Please log in";
        header('location: ' . ROOT_URL . 'login.php');
        die();  
    }
}


?>