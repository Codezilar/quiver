<?php 


include ('./includes/header.php');


$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $movie_query = "SELECT * FROM movie WHERE id=$id";
    $movie_result = mysqli_query($connection, $movie_query);
    $movie = mysqli_fetch_assoc($movie_result);
}else{
    header('location: ' . ROOT_URL . 'manage-post.php');
    die();
}

?>
    <div class="main">
        <div class="main-container">
            <div class="center">
                <div class="padding intro">
                    <h1>Quiver Dashboard</h1>
                    <div class="center-right-nav">
                        <div class="search">
                            <input required type="search" placeholder="Search here...">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>  
                <div class="padding second-nav">
                    <ul>
                        <li><span><a href="manage-post.php">Manage Post</a> / <a href="upload.php">Upload Movie</a></span><hr></li>
                    </ul>
                </div> 
                <!-- upload code space -->
                <form class="upload-form" action="edit-post-logic.php" enctype="multipart/form-data" method="post">
                    <?php if(isset($_SESSION['edit-post'])): ?>
                        <h3 class="error">
                            <?= 
                                $_SESSION['edit-post'];
                                unset($_SESSION['edit-post'])
                            ?>
                        </h3>
                    <?php endif ?>
                    
                    <div class="form-container">
                        <div class="form-top">
                            <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                            <input type="hidden" name="previous_thumbnail_name" value="<?= $movie['thumbnail'] ?>">
                            <input value="<?= $movie['title'] ?>" required name="title" type="text" placeholder="Title">
                            <input value="<?= $movie['link'] ?>" required name="link" type="text" placeholder="Video Link">
                        </div>
                        <textarea required name="body"  placeholder="About movie"><?= $movie['body'] ?></textarea>
                        <div class="thub    nail">
                            <h3>Thumbnail (Headlining Image)</h3>
                            <input type="file" name="thumbnail" placeholder="Thumbnail">
                            <img src="" alt="">
                        </div>
                        <div class="movie-little-detail">
                            <h3>Movie detail</h3>
                            <div class="form-top">
                                <input value="<?= $movie['rate'] ?>" required type="number"name="rate" placeholder="Rating on scale of 1 - 10 ">
                                <input value="<?= $movie['time'] ?>" required type="number" name="time" placeholder="Time frame">
                                <input value="<?= $movie['vq'] ?>" required type="text" name="vq" placeholder="HD + or...">
                                
                                <input value="<?= $movie['age'] ?>" required type="number" name="age" placeholder="Age range">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <select name="category_id" >
                                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                                    <option value="<?= $category['id'] ?>" <?= $movie['category_id'] == $category['id']  ? 'selected' : ''?> ><?= $category['title'] ?></option>
                                    
                                <?php endwhile ?>
                            </select>
                            <div class="check-trend">
                                Trending
                                <input type="checkbox" <?= $movie['trending']  ? 'checked' : ''?>  name="trending">
                            </div>
                        </div>
                        <!-- <div class="movie-cast">
                            <h3>Movie Cast</h3>
                            <div class="cast">
                                <input name="cast1" type="file" placeholder="Cast 1">
                                <input name="cast2" type="file" placeholder="Cast 2">
                                <input name="cast3" type="file" placeholder="Cast 3">
                                <input name="cast4" type="file" placeholder="Cast 4">
                                <input name="cast5" type="file" placeholder="Cast 5">
                                <input name="cast6" type="file" placeholder="Cast 6">
                                <input name="cast7" type="file" placeholder="Cast 7">
                                <input name="cast8" type="file" placeholder="Cast 8">
                            </div>
                            <img src="" alt=""> 

                        </div> -->
                        <button name="submit" type="submit">
                            Update
                        </button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>