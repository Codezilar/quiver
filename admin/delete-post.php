<?php

session_start();

require ("./config/database.php");

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM movie WHERE id=$id";
    $query_result = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_result) == 1){
        $post = mysqli_fetch_assoc($query_result);
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path = './uploads/' . $thumbnail_name;
        if($thumbnail_path){
            unlink($thumbnail_path);

            // delete post from database
            $delete_post_query = "DELETE FROM movie WHERE id=$id LIMIT 1";
            $delete_post_result = mysqli_query($connection, $delete_post_query);

            $comment_query = "DELETE FROM comments WHERE post_id=$id";
            $comment_result = mysqli_query($connection, $comment_query);
            if(!mysqli_errno($connection)){
                $_SESSION['delete-post-success'] = "Post deleted successfully";
            }
        }
    }

}

header('location: ' . ROOT_URL . 'manage-post.php');
die();


?>