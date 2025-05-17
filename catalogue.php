<?php
session_start();
require ("./config/database.php");

if(isset($_GET['id'])){
    $nav_query = "SELECT * FROM categories";
    $nav_query_result = mysqli_query($connection, $nav_query);
    
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM catalogue WHERE category_id=$id ORDER BY id DESC";
    $query_result = mysqli_query($connection, $query);
    $mover = mysqli_fetch_assoc($query_result);

    $cate_id = $mover['category_id'];
    $category_query = "SELECT * FROM categories WHERE id=$cate_id";
    $category_query_result = mysqli_query($connection, $category_query);
    $category = mysqli_fetch_assoc($category_query_result); 
}else{
    header('location: ' . ROOT_URL .'index.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $category['title'] ?> Series</title>
    <!-- fontawesome icon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>
<body>
    <?php include("./includes/nav.php") ?>
    
            <div class="category_view_name">
                <h1>
                    <?= $category['title'] ?> Series
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

    <!-- Swiper JS -->
    <!----------------------jquery and js links------------------------------>
    <script src="js/jquary3.6.0.js"></script>
    <script src="js/owl.carousel.min.js"></script>                    
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
        // when window width is >= 600
        breakpoints: {
            600: {
                slidesPerView: 2,
            }
        }
      });
    </script>
</body>
</html>