<?php 

include ('./includes/header.php') ;


$query = "SELECT * FROM catalogue";
$query_result = mysqli_query($connection, $query);


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
                        <li><span><a href="series.php">Series</a> / <a href="upload-series.php">Upload Series</a></span><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                <form class="upload-form" action="upload-series-logic.php" enctype="multipart/form-data" method="post">
                    <div class="form-container">
                        <div class="form-top">
                            <input type="text" required name="title" placeholder="Title">
                            <input type="text" required name="link" placeholder="Video Link">
                        </div>
                        <textarea name="body" placeholder="About movie"></textarea>
                        <div class="thubnail">
                            <h3>Thumbnail (Headlining Image)</h3>
                            <input type="file" required name="thumbnail" placeholder="Thumbnail">
                            <img src="" alt="">
                        </div>
                        <div class="movie-little-detail">
                            <h3>Movie detail</h3>
                            <div class="form-top">
                                <input type="number" required name="rate" placeholder="Rating on scale of 1 - 10 ">
                                <input type="number" required name="time" placeholder="Time frame">
                                <input type="text" required name="vq" placeholder="Video Quality">
                                <input type="text" required name="age" placeholder="Age range">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <select required name="category_id">
                                <?php foreach($query_result as $key) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['title'] ?></option>
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