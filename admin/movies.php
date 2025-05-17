<?php include ('./includes/header.php') ?>
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
                        <li>
                            <a href="index.php">Overview</a>
                        </li>
                        <li><a href="movies.php">Movies</a><hr></li>
                        <li><a href="series.php">Series</a></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                <a href="upload.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Upload Movie</h1>
                        <p>Upload movies of all niche except for series</p>
                    </div>
                </a>
                <a href="manage-post.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Manage Movies</h1>
                        <p>Edit Or delete uploaded movies except for series</p>
                    </div>
                </a>
                <a href="create-category.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Add Category</h1>
                        <p>Create movie category except for series</p>
                    </div>
                </a>
                <a href="manage-category.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Manage Categories</h1>
                        <p>Edit Or delete movie category except for series</p>
                    </div>
                </a>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>