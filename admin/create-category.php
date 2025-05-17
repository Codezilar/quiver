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
                        <li><span><a href="movies.php">Movies</a> / <a href="create-category.php">Create Category</a></span><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                
                <form class="upload-form" action="<?= ROOT_URL ?>create-category-logic.php" method="post">
                    <?php if(isset($_SESSION['add-category'])): ?>
                        <h3 class="error">
                            <?= 
                                $_SESSION['add-category'];
                                unset($_SESSION['add-category'])
                            ?>
                        </h3>
                    <?php endif ?> 
                    <div class="form-container">
                        <div class="form-top">
                            <input type="text" name="title" placeholder="Title" required>
                        </div>
                        <textarea name="description" placeholder="About movie" required></textarea>
                        <button type="submit" name="submit">Add Category</button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>