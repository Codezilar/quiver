<?php

session_start();
require ("./config/database.php");

if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];

    $time = time(); 
    $thumbnail_name = $time . $thumbnail['name'];
    $thumbnail_tmp_name = $thumbnail['tmp_name'];
    $thumbnail_destination_path = './uploads/' . $thumbnail_name;

    // make sure file is an image
    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = explode('.', $thumbnail_name);
    $extension = end($extension);
    if(in_array($extension, $allowed_files)){
        // ensure image is not too big. (2mb +)
        if($thumbnail['size'] < 2_000_000){
            move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
        }else{
            $_SESSION['add-post'] = "Thumbnail size too big. Should be less than 2mb";
        }
    }else{
        $_SESSION['add-post'] = "Thumbnail should be png, jpg or jpeg";
    }
    $query = "INSERT INTO catalogue (title, body, category_id, thumbnail) VALUES ('$title', '$body', '$category_id', '$thumbnail_name')";
    $result = mysqli_query($connection, $query);
    if(!mysqli_errno($connection)){
        $_SESSION['add-post-success'] = 'New catalogue added successfully';
        header('location: ' . ROOT_URL . 'manage-catalogue.php');
        die();
    }
}


header('location: ' . ROOT_URL . 'create-catalogue.php');
die();
?>