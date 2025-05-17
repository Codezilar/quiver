<?php
session_start();
require ("./config/database.php");

if(isset($_GET['search']) && isset($_GET['submit'])){
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM movie WHERE title LIKE '%$search%' ORDER BY id DESC";
    $query_result = mysqli_query($connection, $query);
    
    $query_seires = "SELECT * FROM catalogue WHERE title LIKE '%$search%' ORDER BY id DESC";
    $seriesQuery_result = mysqli_query($connection, $query_seires);

    $nav_query = "SELECT * FROM categories";
    $nav_query_result = mysqli_query($connection, $nav_query);    

}else{
    header('location: ' . ROOT_URL . 'index.php');
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $search ?></title>
    <!-- fontawesome icon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>
<body>
    <?php include("./includes/nav.php") ?> 
            <?php if(mysqli_num_rows($query_result) > 0): ?>  
                <div class="category_view_name">
                    <h1>
                        Searched Movie: <?= $search ?>
                    </h1>
                </div>
                <div class="first-center category_view">
                    <?php foreach ($query_result as $key ) :?>
                        <div class="cl-content">
                            <div class="cl-content-text">
                                <h2>
                                    <?= $key['title'] ?> 
                                </h2>
                            </div> 
                            <img src="./admin/uploads/<?= $key['thumbnail'] ?>" alt="./">
                            <div class="player">
                                <p><?= $key['rate'] ?></p>
                                <p><?= $key['time'] ?>Mins</p>
                                <p><?= $key['vq'] ?></p>
                                <p><?= $key['age'] ?>+</p>
                            </div>  
                            <div class="react">
                                <div class="react-container">
                                    <a href="movie.php?id=<?= $key['id'] ?>">
                                        <div class="reac like">
                                            <h3><i class="far fa-thumbs-up"></i></h3>
                                        </div>                                    
                                    </a>
                                    <a href="movie.php?id=<?= $key['id'] ?>">
                                        <div class="reac dislike">
                                            <h3><i class="fas fa-comments"></i></h3>
                                        </div>                                    
                                    </a>
                                    <a href="movie.php?id=<?= $key['id'] ?>">
                                        <div class="reac comment">
                                             <h3><i class="far fa-play-circle"></i></h3>
                                        </div>                                    
                                    </a>
                                </div>
                                <a href="movie.php?id=<?= $key['id'] ?>">
                                    <div class="reac download">
                                        <h3><i class="fas fa-download"></i></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?Php endforeach ?>
                </div> 
            <?php elseif(mysqli_num_rows($seriesQuery_result) > 0): ?>  
                <div class="series-container">      
                <div class="category_view_name">
                    <h1>
                        Searched Series: <?= $search ?> 
                    </h1>
                    </div>
                        <div class="first-center category_view">
                            
                                    <?php
                                        foreach($seriesQuery_result as $series):
                                    ?>
                                        <div class="cl-content">
                                            <div class="cl-content-text">
                                                <h2>
                                                    <?= $series['title'] ?> 
                                                </h2>
                                            </div> 
                                            <img src="./admin/uploads/<?= $series['thumbnail'] ?>" alt="./">
                                            <div class="react">
                                                <div class="react-container">
                                                    <a href="series.php?id=<?= $series['id'] ?>">
                                                        <div class="reac like">
                                                            <h3>@</h3>
                                                        </div>                                    
                                                    </a>
                                                    <a href="series.php?id=<?= $series['id'] ?>">
                                                        <div class="reac dislike">
                                                            <h3><i class="fas fa-comments"></i></h3>
                                                        </div>                                    
                                                    </a>
                                                    <a href="series.php?id=<?= $series['id'] ?>">
                                                        <div class="reac comment">
                                                            <h3><i class="far fa-play-circle"></i></h3>
                                                        </div>                                    
                                                    </a>
                                                </div>
                                                <a href="series.php?id=<?= $series['id'] ?>">
                                                    <div class="reac download">
                                                        <h3><i class="fas fa-download"></i></h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                        endforeach
                                    ?>
                        </div>

                </div>
            <?php else : ?>
                <h2 style="padding: 2rem;">No movie found for this search!</h2>
            <?php endif ?>


    <!-- Swiper JS -->
   
<?php include("./includes/footer.php") ?>