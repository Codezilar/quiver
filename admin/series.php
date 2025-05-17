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
                        <li><a href="movies.php">Movies</a></li>
                        <li><a href="series.php">Series</a><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                <a href="upload-series.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Upload series with already created catalogues</h1>
                        <p>If no catalogue for intended post, Ensure to create first</p>
                    </div>
                </a>
                <a href="manage-series.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Manage Uploaded series</h1>
                        <p>Manage existing catalogue</p>
                    </div>
                </a>
                <a href="create-catalogue.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Create Catalogue</h1>
                        <p>If catalogue already exist then upload</p>
                    </div>
                </a>
                <a href="manage-catalogue.php" class="padding audience">
                    <div class="audience-container">
                        <span><i class="fas fa-headphones"></i></span>
                        <h1>Manage catalogue</h1>
                        <p>Manage existing catalogue</p>
                    </div>
                </a>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>