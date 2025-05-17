<?php
require("./config/database.php");
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "DELETE FROM comments WHERE id=$id";
    $query_result = mysqli_query($connection, $query);
    $_SESSION['delete-comment'] = "Comment Deleted Successfully";
    
    header('location: ' . ROOT_URL . 'comments.php');
    die();
}

header('location: ' . ROOT_URL . 'comments.php');
die();

?>