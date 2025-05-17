<?php

include ('./includes/header.php') ;

$query =  "SELECT * FROM categories";
$query_result = mysqli_query($connection, $query);

?>
    <div class="main">
        <div class="main-container">
            <div class="center">
                <div class="padding intro">
                    <h1>Quiver Dashboard</h1>
                    <div class="center-right-nav">
                        <div class="search">
                            <input type="search" placeholder="Search here...">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>  
                <div class="padding second-nav">
                    <ul>
                        <li><span><a href="series.php">Series</a> / <a href="create-catalogue.php">Create catalogue</a></span><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                <form class="upload-form" action="create-catalogue-logic.php" enctype="multipart/form-data" method="post">
                    <div class="form-container">
                        <div class="form-top">
                            <input type="text" name="title" placeholder="Title" required>
                            <select name="category_id">
                                <?php foreach($query_result as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <textarea placeholder="About Series" name="body" required></textarea>
                        <div class="thubnail">
                            <h3>Thumbnail (Headlining Image)</h3>
                            <input type="file" placeholder="Thumbnail" name="thumbnail" required>
                            <img src="" alt="">
                        </div>
                        <button type="submit" name="submit">
                            Create
                        </button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
    <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>