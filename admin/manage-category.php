<?php 

include ('./includes/header.php');
 
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);


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
                        <li><span><a href="movies.php">Movies</a> / <a href="manage-category.php">Manage Category</a></span><hr></li>
                    </ul>
                </div>
                <!-- manage post code space -->
                <div class="manage-post">
                    <h3>All  Catalogues</h3>
                    <div class="manage-post-container">
                        <?php if(isset($_SESSION['edit-category'])): ?>
                            <h3 class="error">
                                <?= 
                                    $_SESSION['edit-category'];
                                    unset($_SESSION['edit-category'])
                                ?>
                            </h3>
                        <?php elseif(isset($_SESSION['add-category'])): ?>
                            <h3 class="success">
                                <?= 
                                    $_SESSION['add-category'];
                                    unset($_SESSION['add-category'])
                                ?>
                            </h3>
                        <?php elseif(isset($_SESSION['edit-category-success'])): ?>
                            <h3 class="success">
                                <?= 
                                    $_SESSION['edit-category-success'];
                                    unset($_SESSION['edit-category-success'])
                                ?>
                            </h3>
                        <?php elseif(isset($_SESSION['delete-category-success'])): ?>
                            <h3 class="success">
                                <?= 
                                    $_SESSION['delete-category-success'];
                                    unset($_SESSION['delete-category-success'])
                                ?>
                            </h3>
                        <?php endif ?> 
                        <div class="manage-post-head-mini">
                            <h5>Title</h5>
                            <h5>Edit</h5>
                            <h5>delete</h5>
                        </div>
                        <?php while ($category = mysqli_fetch_array($categories)) : ?>
                        
                        <div class="manage-post-content-mini">
                            <h5><?= $category['title'] ?></h5>
                            <a href="edit-category.php?id=<?= $category['id'] ?>"><h5>Edit</h5></a>
                            <a href="delete-category.php?id=<?= $category['id'] ?>"><h5>delete</h5></a>
                        </div>
                        <?php endwhile ?>
                    </div>
                </div>
                <!-- manage post code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>