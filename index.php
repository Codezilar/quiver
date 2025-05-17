<?php
session_start();
require ("./config/database.php");

$query = "SELECT * FROM movie WHERE category_id=7 ORDER BY id DESC LIMIT 5 ";
$query_result = mysqli_query($connection, $query);


$nav_query = "SELECT * FROM categories";
$nav_query_result = mysqli_query($connection, $nav_query)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quiver</title>
    <!-- fontawesome icon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font -- -->
     
</head>
<body>
    <?php include("./includes/nav.php") ?>

    <!-- hero -->
    <header class="header">
        <div class="header-wrapper">
            <div class="header-video-container">
                <video src=""></video>
                <video class="header-video" src="./video/EP-1.mp4" loop autoplay muted></video>
            </div>
            <div class="header-movie-text">
                <p class="movie-name">Quiver</p>
                <p class="movie-desc LIMIT 5ription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus
                    enim fuga minus eaque, veniam quae dicta! Accusamus quis distinctio sint exercitationem unde.
                    Quas, officiis voluptate?</p>
                <div class="movie-studio">
                    <span class="movie-studio-button">HD +</span>
                    <span class="movie-studio-name">HIGH QUALITY ENTERTAINMENT</span>
                </div>
                <div class="movie-year">
                    <span class="movie-year-type">
                        <li>All Categories of movies for <span class="movie-studio-button">FREE</span></li>
                    </span>
                </div>
            </div>
        </div>
    </header>

   <!-- main and grids -->
    <div class="main">
        <div class="first-container">
            <div class="first-content">            
                <div class="first-box">
                    <?php 
                        $query_categories = "SELECT * FROM movie WHERE category_id=2 ORDER BY id DESC LIMIT 5";
                        $query_categories_result = mysqli_query($connection, $query_categories);
                    ?>
                        <div class="Upcoming">
                            <h1>
                                Action Movies<span>3</span>
                            </h1>
                            <?php 
                                foreach($query_categories_result as $loop):
                            ?>
                                <div class="upcoming-series">
                                    <img src="./admin/uploads/<?= $loop['thumbnail'] ?>" alt="./">
                                    <div class="react">
                                        <div class="react-container">
                                            <a href="movie.php?id=<?= $loop['id'] ?>">
                                                <div class="reac like">
                                                    <h3><i class="far fa-thumbs-up"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $loop['id'] ?>">
                                                <div class="reac dislike">
                                                    <h3><i class="fas fa-comments"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $loop['id'] ?>">
                                                <div class="reac comment">
                                                    <h3><i class="far fa-play-circle"></i></h3>
                                                </div>                                    
                                            </a>
                                        </div>
                                        <a href="movie.php?id=<?= $loop['id'] ?>">
                                            <div class="reac download">
                                                <h3><i class="fas fa-download"></i></h3>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="write">
                                        <h4>
                                            <?= $loop['title'] ?>
                                        </h4>
                                        <p>
                                            <?= $loop['body'] ?>
                                        </p>
                                    </div>
                                    <div class="player">
                                        <p><?= $loop['rate'] ?></p>
                                        <p><?= $loop['time'] ?> Mins</p>
                                        <p><?= $loop['vq'] ?></p>
                                        <p><?= $loop['age'] ?>+</p>
                                    </div>                            
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php 
                        $query_categoriese = "SELECT * FROM movie WHERE category_id=6 ORDER BY id DESC LIMIT 5";
                        $query_categories_resulte = mysqli_query($connection, $query_categoriese);
                    ?>
                        <div class="Upcoming">
                            <h1>
                                Horror Movies<span>3</span>
                            </h1>
                            <?php 
                                foreach($query_categories_resulte as $loope):
                            ?>
                                <div class="upcoming-series">
                                    <img src="./admin/uploads/<?= $loope['thumbnail'] ?>" alt="./">
                                    <div class="react">
                                        <div class="react-container">
                                            <a href="movie.php?id=<?= $loope['id'] ?>">
                                                <div class="reac like">
                                                    <h3><i class="far fa-thumbs-up"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $loope['id'] ?>">
                                                <div class="reac dislike">
                                                    <h3><i class="fas fa-comments"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $loope['id'] ?>">
                                                <div class="reac comment">
                                                    <h3><i class="far fa-play-circle"></i></h3>
                                                </div>                                    
                                            </a>
                                        </div>
                                        <a href="movie.php?id=<?= $loope['id'] ?>">
                                            <div class="reac download">
                                                <h3><i class="fas fa-download"></i></h3>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="write">
                                        <h4>
                                            <?= $loope['title'] ?>
                                        </h4>
                                        <p>
                                            <?= $loope['body'] ?>
                                        </p>
                                    </div>
                                    <div class="player">
                                        <p><?= $loope['rate'] ?></p>
                                        <p><?= $loope['time'] ?> Mins</p>
                                        <p><?= $loope['vq'] ?></p>
                                        <p><?= $loope['age'] ?>+</p>
                                    </div>                            
                                </div>
                            <?php endforeach ?>
                        </div>
                </div>
                <div class="first-center">
                    <h1>
                        Adventure Movies <span>3</span>
                    </h1>
                    <?php foreach ($query_result as $key ) :?>
                        <div class="cl-content">
                            <div class="cl-content-text">
                                <h2>
                                    <?= $key['title'] ?> 
                                </h2>
                                <p>
                                    <?= $key['body'] ?>     
                                </p>
                            </div>
                            <div class="player">
                                <p><?= $key['rate'] ?></p>
                                <p><?= $key['time'] ?>Mins</p>
                                <p><?= $key['vq'] ?></p>
                                <p><?= $key['age'] ?>+</p>
                            </div>   
                            <img src="./admin/uploads/<?= $key['thumbnail'] ?>" alt="./">
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
                    <?php
                        $queryr = "SELECT * FROM movie WHERE category_id=10 ORDER BY id DESC LIMIT 5 ";
                        $query_resultr = mysqli_query($connection, $queryr);
                    ?>
                    <h1>
                        Romance Movies <span>3</span>
                    </h1>
                    <?php foreach ($query_resultr as $keyr ) :?>
                        <div class="cl-content">
                            <div class="cl-content-text">
                                <h2>
                                    <?= $keyr['title'] ?> 
                                </h2>
                                <p>
                                    <?= $keyr['body'] ?>     
                                </p>
                            </div>
                            <div class="player">
                                <p><?= $keyr['rate'] ?></p>
                                <p><?= $keyr['time'] ?>Mins</p>
                                <p><?= $keyr['vq'] ?></p>
                                <p><?= $keyr['age'] ?>+</p>
                            </div>   
                            <img src="./admin/uploads/<?= $keyr['thumbnail'] ?>" alt="./">
                            <div class="react">
                                <div class="react-container">
                                    <a href="movie.php?id=<?= $keyr['id'] ?>">
                                        <div class="reac like">
                                            <h3><i class="far fa-thumbs-up"></i></h3>
                                        </div>                                    
                                    </a>
                                    <a href="movie.php?id=<?= $keyr['id'] ?>">
                                        <div class="reac dislike">
                                            <h3><i class="fas fa-comments"></i></h3>
                                        </div>                                    
                                    </a>
                                    <a href="movie.php?id=<?= $keyr['id'] ?>">
                                        <div class="reac comment">
                                            <h3><i class="far fa-play-circle"></i></h3>
                                        </div>                                    
                                    </a>
                                </div>
                                <a href="movie.php?id=<?= $keyr['id'] ?>">
                                    <div class="reac download">
                                        <h3><i class="fas fa-download"></i></h3>
                                    </div>
                                </a>
                        </div>
                        </div>
                    <?Php endforeach ?>
                </div>           
                <div class="first-box">

                    <!--  Cartoonsand Animes  -->
                    <?php 
                        $query_categorie = "SELECT * FROM movie WHERE category_id=3 ORDER BY id DESC LIMIT 5";
                        $query_categorie_result = mysqli_query($connection, $query_categorie);
                    ?>
                        <div class="Upcoming">
                            <h1>
                                Cartoons And Animes<span>3</span>
                            </h1>
                            <?php 
                                foreach($query_categorie_result as $second_loop):
                            ?>
                                <div class="upcoming-series">
                                    <img src="./admin/uploads/<?= $second_loop['thumbnail'] ?>" alt="./">
                                    <div class="react">
                                        <div class="react-container">
                                            <a href="movie.php?id=<?= $second_loop['id'] ?>">
                                                <div class="reac like">
                                                    <h3><i class="far fa-thumbs-up"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $second_loop['id'] ?>">
                                                <div class="reac dislike">
                                                    <h3><i class="fas fa-comments"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $second_loop['id'] ?>">
                                                <div class="reac comment">
                                                    <h3><i class="far fa-play-circle"></i></h3>
                                                </div>                                    
                                            </a>
                                        </div>
                                        <a href="movie.php?id=<?= $second_loop['id'] ?>">
                                            <div class="reac download">
                                                <h3><i class="fas fa-download"></i></h3>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="write">
                                        <h4>
                                            <?= $second_loop['title'] ?>
                                        </h4>
                                        <p>
                                            <?= $second_loop['body'] ?>
                                        </p>
                                    </div>
                                    <div class="player">
                                        <p><?= $second_loop['rate'] ?></p>
                                        <p><?= $second_loop['time'] ?> Mins</p>
                                        <p><?= $second_loop['vq'] ?></p>
                                        <p><?= $second_loop['age'] ?>+</p>
                                    </div>                            
                                </div>
                            <?php endforeach ?>
                        </div>

                        <!-- drama movies -->
                    <?php 
                        $query_categoried = "SELECT * FROM movie WHERE category_id=8 ORDER BY id DESC LIMIT 5";
                        $query_categorie_resultd = mysqli_query($connection, $query_categoried);
                    ?>
                        <div class="Upcoming">
                            <h1>
                                Drama<span>3</span>
                            </h1>
                            <?php 
                                foreach($query_categorie_resultd as $second_loopd):
                            ?>
                                <div class="upcoming-series">
                                    <img src="./admin/uploads/<?= $second_loopd['thumbnail'] ?>" alt="./">
                                    <div class="react">
                                        <div class="react-container">
                                            <a href="movie.php?id=<?= $second_loopd['id'] ?>">
                                                <div class="reac like">
                                                    <h3><i class="far fa-thumbs-up"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $second_loopd['id'] ?>">
                                                <div class="reac dislike">
                                                    <h3><i class="fas fa-comments"></i></h3>
                                                </div>                                    
                                            </a>
                                            <a href="movie.php?id=<?= $second_loopd['id'] ?>">
                                                <div class="reac comment">
                                                    <h3><i class="far fa-play-circle"></i></h3>
                                                </div>                                    
                                            </a>
                                        </div>
                                        <a href="movie.php?id=<?= $second_loopd['id'] ?>">
                                            <div class="reac download">
                                                <h3><i class="fas fa-download"></i></h3>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="write">
                                        <h4>
                                            <?= $second_loopd['title'] ?>
                                        </h4>
                                        <p>
                                            <?= $second_loopd['body'] ?>
                                        </p>
                                    </div>
                                    <div class="player">
                                        <p><?= $second_loopd['rate'] ?></p>
                                        <p><?= $second_loopd['time'] ?> Mins</p>
                                        <p><?= $second_loopd['vq'] ?></p>
                                        <p><?= $second_loopd['age'] ?>+</p>
                                    </div>                            
                                </div>
                            <?php endforeach ?>
                        </div>
                </div>
                
            </div>
        </div>

    </div>
    <!--Trending movies-->
    <div class="hero-section" >
            <!--top movie slide-->
            <div class="top-movies-slide">
                <h2>Trending Movies</h2>
                  
                <div class="owl-carousel" id="top-movies-slide">
                <?php
                    $trendingQuery = "SELECT * FROM movie WHERE trending=1 ORDER BY id DESC LIMIT 10";
                    $trendingQuery_result = mysqli_query($connection, $trendingQuery);
                    foreach($trendingQuery_result as $trending):
                ?>
                    <div class="movie-item">
                        <a href="movie.php?id=<?= $trending['id'] ?>">
                            <img src="./admin/uploads/<?= $trending['thumbnail'] ?>" alt="">
                            <div class="movie-item-content">
                                <div class="movie-item-title">
                                    <?= $trending['title'] ?>
                                </div>
            
                                <div class="movie-infos">
                                    <div class="movie-info">
                                        <i class="bx bxs-star"></i>
                                        <span><?= $trending['rate'] ?></span>
                                    </div>
            
                                    <div class="movie-info">
                                        <i class="bx bxs-time"></i>
                                        <span><?= $trending['time'] ?> mins</span>
                                    </div>
            
                                    <div class="movie-info">
                                        <span><?= $trending['vq'] ?></span>
                                    </div>
            
                                    <div class="movie-info">
                                        <span><?= $trending['age'] ?>+</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
                </div>
            </div>  
    </div> 
    

    <div class="series-container">
        <h1>Latest Series</h1>
                <div class="first-center category_view">
                    
                            <?php
                                $seriesQuery = "SELECT * FROM catalogue ORDER BY id DESC LIMIT 5";
                                $seriesQuery_result = mysqli_query($connection, $seriesQuery);
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
                                                    <h3><i class="far fa-thumbs-up"></i></h3>
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
    </div>
        
    <!--end top movie slide-->
<?php include("./includes/footer.php") ?>