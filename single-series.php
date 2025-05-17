<?php
require ("./config/database.php");

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM series WHERE id=$id";
    $query_result = mysqli_query($connection, $query);
    $movie = mysqli_fetch_assoc($query_result);

    $catalogue_id = $movie['category_id'];
    $catalogue_query = "SELECT * FROM catalogue WHERE id=$catalogue_id";
    $catalogue_query_result = mysqli_query($connection, $catalogue_query);
    $catalogue = mysqli_fetch_assoc($catalogue_query_result);

    $others_id = $catalogue['category_id'];
    $other = "SELECT * FROM catalogue WHERE category_id=$others_id ORDER BY id DESC LIMIT 2";
    $other_query = mysqli_query($connection, $other); 
    $others = mysqli_fetch_assoc($other_query);   
    
    $nav_query = "SELECT * FROM categories";
    $nav_query_result = mysqli_query($connection, $nav_query);

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
    <?php include("./includes/nav.php") ?>
    <header class="header">
        <div class="header-wrapper">
            <div class="header-video-container">
                <img src="./admin/uploads/<?= $movie['thumbnail'] ?>" alt="" class="header-video">
                <!-- <video class="header-video" src="" loop autoplay muted></video> -->
            </div>
            <div class="header-movie-text">
                <p class="movie-name"><?= $movie['title'] ?></p>
                <p class="movie-description"><?= $movie['body'] ?></p>
                <div class="movie-studio">
                    <span class="movie-studio-button">HD +</span>
                    <span class="movie-studio-name"><?= $movie['time'] ?> Minutes</span>
                </div>
                <div class="movie-year">
                    <span class="movie-year-number"><?= $movie['age'] ?>+</span>
                    <span class="movie-year-type">
                        <li><?= $catalogue['title'] ?></li>
                    </span>
                </div>
                <div class="movie-rating">
                    <span class="movie-rating-text">Rating:</span>
                    <span class="movie-rating-number"><?= $movie['rate'] ?></span>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="container">
            <section class="left">
                <div class="left-wrapper">
                    <div class="call-to-action">
                        <div class="call-container">                            
                            <div class="more">
                                <a href="./view.php?id=<?= $movie['id'] ?>">
                                    <i class="far fa-play-circle"></i> Play
                                </a> 
                                <form action="">
                                    <input type="url" name="" style="display: none;" id="">
                                    <button type="submit">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                </form>
                            </div> 
                        </div>
                    </div>              
                    <div class="movie-description&download-btns titll">
                        <div class="movie-description-main">
                            <header class="movie-description-head">Title</header>
                            <p class="movie-tilte"><?= $movie['title'] ?><p>
                        </div>
                    </div>
                    <div class="movie-description&download-btns">
                        <div class="movie-description-main">
                            <header class="movie-description-head">Description</header>
                            <h1><?= $movie['body'] ?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="right">
                <h1>Similar Series</h1>
                <div class="first-center">
                    <?php foreach ($other_query as $key ) :?>
                        <div class="cl-content">
                            <div class="cl-content-text">
                                <h2>
                                    <?= $key['title'] ?> 
                                </h2>
                            </div>  
                            <img src="./admin/uploads/<?= $key['thumbnail'] ?>" alt="./">
                            <div class="react">
                                <div class="react-container">
                                    <a href="series.php?id=<?= $key['id'] ?>">
                                        <div class="reac like">
                                            <h3><i class="far fa-thumbs-up"></i></h3>
                                        </div>                                    
                                    </a>
                                    <a href="series.php?id=<?= $key['id'] ?>">
                                        <div class="reac dislike">
                                            <h3><i class="fas fa-comments"></i></h3>
                                        </div>                                    
                                    </a>
                                    <a href="series.php?id=<?= $key['id'] ?>">
                                        <div class="reac comment">
                                            <h3><i class="far fa-play-circle"></i></h3>
                                        </div>                                    
                                    </a>
                                </div>
                                <a href="series.php?id=<?= $key['id'] ?>">
                                    <div class="reac download">
                                        <h3><i class="fas fa-download"></i></h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?Php endforeach ?>
                </div>  
                <div class="more">
                    <a href="./catalogue.php?id=<?= $others['category_id'] ?>">
                        More
                    </a> 
                </div>               
            </section>
        </section>
    </main>
    <script src="./js/app.js"></script>
</body>

</html>