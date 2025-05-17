<?php

session_start();

require ("./config/database.php");

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    $query = "DELETE FROM categories WHERE id=$id";
    $query_result = mysqli_query($connection, $query); 
    $_SESSION['delete-category-success'] = "Movie category deleted successfully";

}

header('location: ' . ROOT_URL . 'manage-category.php');
die();


?>