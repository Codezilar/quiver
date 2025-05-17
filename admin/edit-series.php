<?php 

include ('./includes/header.php') ;
        
        
$query = "SELECT * FROM catalogue";
$query_result = mysqli_query($connection, $query);


if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query_series = "SELECT * FROM series WHERE id=$id";
    $query_series_result = mysqli_query($connection, $query_series);
    $series = mysqli_fetch_assoc($query_series_result);

}else{
    header('location: ' . ROOT_URL . 'manage-series.php');
    die();
}


?>
    <div class="main">
        <div class="main-container">
            <div class="center">
                <div class="padding intro">
                    <h1>Quiver Dashboard</h1>
                    <div class="center-righqt-nav">
                        <div class="search">
                            <input type="search" placeholder="Search here...">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>  
                <div class="padding second-nav">
                    <ul>
                        <li><span><a href="manage-series.php">Manage Series</a> / <a href="edit-series.php">Edit Series</a></span><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                <form class="upload-form" action="edit-series-logic.php" enctype="multipart/form-data" method="post">
                    <div class="form-container">
                        <div class="form-top">
                            <input type="hidden" name="id" value="<?= $series['id'] ?>">
                            <input type="hidden" name="previous_thumbnail_name" value="<?= $series['thumbnail'] ?>">
                            <input type="text" required value="<?= $series['title']; ?>" name="title" placeholder="Title">
                            <input type="text" required value="<?= $series['link'] ?>" name="link" placeholder="Video Link">
                        </div>
                        <textarea name="body" placeholder="About movie"><?= $series['body'] ?></textarea>
                        <div class="thubnail">
                            <h3>Thumbnail (Headlining Image)</h3>
                            <input type="file" name="thumbnail" placeholder="Thumbnail">
                            <img src="" alt="">
                        </div>
                        <div class="movie-little-detail">
                            <h3>Movie detail</h3>
                            <div class="form-top">
                                <input type="number" required value="<?= $series['rate'] ?>" name="rate" placeholder="Rating on scale of 1 - 10 ">
                                <input type="number" required value="<?= $series['time'] ?>" name="time" placeholder="Time frame">
                                <input type="text" required value="<?= $series['vq'] ?>" name="vq" placeholder="Video Quality">
                                <input type="text" required value="<?= $series['age'] ?>" name="age" placeholder="Age range">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <select required name="catalogue_id">
                                <?php foreach($query_result as $key) : ?>
                                    <option value="<?= $key['id'] ?>" <?= $series['category_id'] == $key['id']  ? 'selected' : ''?> ><?= $key['title'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit" required name="submit">
                            Upload
                        </button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>