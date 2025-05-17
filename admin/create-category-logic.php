<?php

session_start();
require ('config/database.php');


if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $insert_query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
    $insert_query_result = mysqli_query($connection, $insert_query);

    if(!mysqli_errno($connection)){
        $_SESSION['add-category'] = "Category successfully added";
        header('location: ' . ROOT_URL . 'manage-category.php');
        die();
    }else{
        $_SESSION['add-category'] = "Couldn't add category";
        header('location: ' . ROOT_URL . 'create-category.php');
        die();
    }
}


?>