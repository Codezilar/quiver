<?php

session_start();

include 'config/database.php';

// make sure edit button was clicked
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $link = filter_var($_POST['link'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rate = filter_var($_POST['rate'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $times = filter_var($_POST['time'], FILTER_SANITIZE_NUMBER_INT);
    $vq = filter_var($_POST['vq'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $age = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    //  set is_featured to 0 if it was unchecked
       
    $trending = isset($_POST['trending']) ? '1':'0';

    //  checked and validate input valus
    if(!$title){
        $_SESSION['edit-post'] = "Couldn't update post. invalid form data on edit post page";
    }else{
        // delete existing thumbnail if new thumbnail is available
        if($thumbnail['name']){
            $previous_thumbnail_path = './uploads/' . $previous_thumbnail_name;
            if($previous_thumbnail_path){
                unlink($previous_thumbnail_path);
            }

            // work on thumbnail
            // rename image
            $time = time(); // to make sure the name if each uploaded image is unique
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = './uploads/' . $thumbnail_name;

            // make sure file is an image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if(in_array($extension, $allowed_files)){
                // ensure image is not too big. (2mb +)
                if($thumbnail['size'] < 2000000){
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                }else{
                    $_SESSION['edit-post'] = "Couldn't update post. Thumbnail size too big. Should be less than 2mb";
                }
            }else{
                $_SESSION['edit-post'] = "Couldn't update post. Thumbnail should be png, jpg or jpeg";
            }
            
        }
    }
    // redirect back (width form data) to add-pot page if there is any problem
    if(isset($_SESSION['edit-post'])){
        // redirect to manage form page if form was invalid
        header('location: ' . ROOT_URL . 'manage-post.php');
        die();
    }else{
        // set is_feature post of all posts to 0 if is_featured for this post is 1
        
        // set thumbnail name if new thumb nail was uploaded, else keep old thumbnail
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        $query = "UPDATE movie SET title='$title', body='$body', link='$link', thumbnail='$thumbnail_to_insert', rate='$rate', time='$times', vq='$vq', age='$age', category_id=$category_id, trending=$trending WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

    }

    if(!mysqli_errno($connection)){
        $_SESSION['edit-post-success'] = 'Post updated successfully';
        header('location: ' . ROOT_URL . 'manage-post.php');
        die();
    }

}

header('location: ' . ROOT_URL . 'manage-post.php');
die();



?>