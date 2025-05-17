<?php

session_start();

require ("./config/database.php");

// remember to fix th e time isssuess

if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $link = filter_var($_POST['link'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rate = filter_var($_POST['rate'], FILTER_SANITIZE_NUMBER_INT);
    $times = filter_var($_POST['time'], FILTER_SANITIZE_NUMBER_INT);
    $vq = filter_var($_POST['vq'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT);

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
    // redirect back (width form data) to add-pot page if there is any problem
    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'upload-series.php');
        die();
    }else{
        // insert post into database
        $query = "INSERT INTO series(title, link, body, thumbnail, rate, time, vq, category_id, age) VALUES ('$title', '$link', '$body', '$thumbnail_name', '$rate', '$times', '$vq', $category_id,'$age')";
        $result = mysqli_query($connection, $query);
        if(!mysqli_errno($connection)){
            $_SESSION['add-post-success'] = 'New post added successfully';
            header('location: ' . ROOT_URL . 'manage-series.php');
            die();
        }
    }
    
}




?>