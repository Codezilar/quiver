<?php

session_start();
require ("./config/database.php");

if(isset($_POST['submit'])){
    $file_url = $_POST["url"];
    $file_name = basename($file_url);

    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Contect-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    readfile($file_url);
}

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM movie WHERE id=$id";
    $query_result = mysqli_query($connection, $query);
    $movie = mysqli_fetch_assoc($query_result);

    $cate = $movie['category_id'];
    $catego = "SELECT * FROM categories WHERE id=$cate";
    $catego_result = mysqli_query($connection, $catego);
    $category = mysqli_fetch_assoc($catego_result);
    
    $movies = "SELECT * FROM movie WHERE category_id=$cate ORDER BY id DESC LIMIT 2";
    $movie_result = mysqli_query($connection, $movies);

    $nav_query = "SELECT * FROM categories";
    $nav_query_result = mysqli_query($connection, $nav_query);


    $comment_query = "SELECT * FROM comments WHERE post_id=$id ORDER BY id DESC";
    $comment_query_result = mysqli_query($connection, $comment_query);
    
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

    <!-- fontawesome icon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
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
                        <li><?= $category['title'] ?></li>
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
                    <div class="cast-wrapper">
                        <header class="cast-head">
                            Cast
                        </header>
                        <div class="cast-images">
                            <!-- cast 1 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-1.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 2 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-2.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 3 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-3.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 4 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-4.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 1 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-1.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 2 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-2.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 3 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-3.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <!-- cast 4 -->
                            <div class="cast-image-content">
                                <div class="cast-image">
                                    <img src="img/profile-4.jpg" alt="Movie Cast">
                                </div>                                
                            </div>
                            <button class="cast-see-more">See More</button>
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
                    <div class="call-to-action">
                        <div class="call-container">                            
                            <div class="more">
                                

                                <a href="./index.php">
                                    Home
                                </a> 

                                <a href="./view.php?id=<?= $movie['id'] ?>">
                                    <i class="far fa-play-circle"></i> Play
                                </a> 
                                <form action="">
                                    <input type="url" value="<?= $movie['link'] ?>" class="input_url_download" >
                                    <button class="download_btn">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                </form>
                            </div>  
                        </div>
                    </div>                    
                    <form class="comment-form" method="POST" action="comment-logic.php">
                        <?php if(isset($_SESSION['error'])): ?>
                            <h3 class="error">
                                <?= 
                                    $_SESSION['error'];
                                    unset($_SESSION['error'])
                                ?>
                            </h3>
                        <?php elseif(isset($_SESSION['success'])): ?>
                            <h3 class="success">
                                <?= 
                                    $_SESSION['success'];
                                    unset($_SESSION['success'])
                                ?>
                            </h3>
                        <?php endif ?>  
                        <input type="email" name="email" required placeholder="Enter email here....">
                        <input type="hidden" name="post_id" value="<?= $id ?>">
                        <textarea required name="body" placeholder="Comment here...." name="" id="" cols="30" rows="10"></textarea>                        
                        <button type="submit" name="submit">
                            Send Comment
                        </button>
                    </form>
                    <?php if(mysqli_num_rows($comment_query_result) > 0) :?>
                        <div class="commenters">
                            <div class="commenters-container">
                                <?php foreach($comment_query_result as $comment): ?>
                                    <div class="container-content">
                                        <div class="com-img">
                                            <img src="./img/profile-1.jpg" alt="">
                                        </div>
                                        <div class="commenter-info">
                                            <h2><?= $comment['email'] ?></h2>
                                            <span><?= $comment['time'] ?></span>
                                            <p><?= $comment['body'] ?></p>    
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="movie-description&download-btns" style="margin-top: 2rem;">
                        <div class="movie-description-main">
                            <header class="movie-description-head">Description about movie category</header>
                            <p><?= $category['description'] ?><p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="right">
                <h1>Similar Movies</h1>
                <div class="first-center">
                    <?php foreach ($movie_result as $key ) :?>
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
                <div class="more">
                    <a href="./category.php?id=<?= $movie['category_id'] ?>">
                        More
                    </a> 
                </div>               
            </section>
        </section>
    </main>

    <!-- Swiper JS -->                    
    <script src="js/app.js"></script>
    <script src="js/bar.js"></script>
</body>
</html>
