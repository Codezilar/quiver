<?php

session_start();
require("./config/database.php");

if(isset($_POST['submit'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);


    $query = "INSERT INTO comments(email, body, post_id) VALUES ('$email', '$body', '$post_id')";
    $query_result = mysqli_query($connection, $query);
    if(!mysqli_errno($connection)){
        $_SESSION['success'] = "Comment Successfull!";
        header("location: " . ROOT_URL . "movie.php?id=$post_id");
        die();
    }else{
        $_SESSION['error'] = "Something went wrong!";
        header("location: " . ROOT_URL . "movie.php?id=$post_id");

        die();
    }
}else{
    header('location: ' . ROOT_URL . 'index.php');
}

?>