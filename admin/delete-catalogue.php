<?php

session_start();

require ("./config/database.php");

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
     // update category_id of post that belong to ths category to id of uncategorized category
    $update_query = "UPDATE series SET category_id=3 WHERE category_id=$id";

    $query = "DELETE FROM catalogue WHERE id=$id";
    $query_result = mysqli_query($connection, $query); 
    $_SESSION['delete-category-success'] = "Serires catalogue deleted successfully";

}

header('location: ' . ROOT_URL . 'manage-catalogue.php');
die();


?>