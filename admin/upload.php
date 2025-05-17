<?php 


include ('./includes/header.php');


$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

//get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$link = $_SESSION['add-post-data']['link'] ?? null;
$rate = $_SESSION['add-post-data']['rate'] ?? null;
$time = $_SESSION['add-post-data']['time'] ?? null;
$vq = $_SESSION['add-post-data']['vq'] ?? null;
$age = $_SESSION['add-post-data']['age'] ?? null;
$category_id = $_SESSION['add-post-data']['category_id'] ?? null;
$trending = $_SESSION['add-post-data']['trending'] ?? null;

// delete form data session
unset($_SESSION['add-post-data']); 

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
                        <li><span><a href="movies.php">Movie</a> / <a href="upload.php">Upload Movie</a></span><hr></li>
                    </ul>
                </div> 
                <!-- upload code space -->
                <form class="upload-form" action="upload-logic.php" enctype="multipart/form-data" method="post">
                    <?php if(isset($_SESSION['add-post'])): ?>
                        <h3 class="error">
                            <?= 
                                $_SESSION['add-post'];
                                unset($_SESSION['add-post'])
                            ?>
                        </h3>
                    <?php endif ?> 
                    <div class="form-container">
                        <div class="form-top">
                            <input value="<?= $title ?>" required name="title" type="text" placeholder="Title">
                            <input value="<?= $link ?>" required name="link" type="text" placeholder="Video Link">
                        </div>
                        <textarea required name="body"  placeholder="About movie"></textarea>
                        <div class="thubnail">
                            <h3>Thumbnail (Headlining Image)</h3>
                            <input required type="file" name="thumbnail" placeholder="Thumbnail">
                            <img src="" alt="">
                        </div>
                        <div class="movie-little-detail">
                            <h3>Movie detail</h3>
                            <div class="form-top">
                                <input value="<?= $rate ?>" required type="number"name="rate" placeholder="Rating on scale of 1 - 10 ">
                                <input value="<?= $time ?>" required type="number" name="time" placeholder="Time frame">
                                <input value="<?= $vq ?>" required type="text" name="vq" placeholder="HD + or...">
                                
                                <input value="<?= $age ?>" required type="number" name="age" placeholder="Age range">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <select name="category_id" >
                                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                                    <option value="<?= $category['id'] ?>" required><?= $category['title'] ?></option>
                                <?php endwhile ?>
                            </select>
                            <div class="check-trend">
                                Trending
                                <input type="checkbox" value="0" name="trending">
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
                            Upload
                        </button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>