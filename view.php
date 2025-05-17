<?php
require ("./config/database.php");

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM movie WHERE id=$id";
    $query_result = mysqli_query($connection, $query);
    $movie = mysqli_fetch_assoc($query_result);
  
}else{
    header('location: ' . ROOT_URL . 'index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?= $movie['title'] ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='movie.css'>

</head>
<body>
<video src="<?= $movie['link'] ?>" controls width="250" download autoplay></video>
</body>

<?php include("./includes/footer.php") ?>