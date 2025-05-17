<?php 

include ('./includes/header.php');

$query = "SELECT * FROM movie ORDER BY id DESC";
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
                        <li><span><a href="movies.php">Movie</a> / <a href="manage-post.php">Manage Movies</a></span><hr></li>
                    </ul>
                </div>
                <!-- manage post code space -->
                <div class="manage-post">
                    <?php if(isset($_SESSION['edit-post'])): ?>
                        <h3 class="error">
                            <?= 
                                $_SESSION['edit-post'];
                                unset($_SESSION['edit-post'])
                            ?>
                        </h3>
                    <?php elseif(isset($_SESSION['edit-post-success'])): ?>
                        <h3 class="success">
                            <?= 
                                $_SESSION['edit-post-success'];
                                unset($_SESSION['edit-post-success'])
                            ?>
                        </h3>
                    <?php elseif(isset($_SESSION['add-post-success'])): ?>
                        <h3 class="success">
                            <?= 
                                $_SESSION['add-post-success'];
                                unset($_SESSION['add-post-success'])
                            ?>
                        </h3>
                    <?php elseif(isset($_SESSION['delete-post-success'])): ?>
                        <h3 class="success">
                            <?= 
                                $_SESSION['delete-post-success'];
                                unset($_SESSION['delete-post-success'])
                            ?>
                        </h3>
                    <?php endif ?> 
                    <h3>All  Movies</h3>
                    <div class="manage-post-container">
                        <div class="manage-post-head">
                            <h5>Title</h5>
                            <h5>Thumnail</h5>
                            <h5>Edit</h5>
                            <h5>delete</h5>
                        </div>
                        <?php
                            while ($post = mysqli_fetch_array($query_result)) :
                        ?>
                            <div class="manage-post-content">
                                <h5><?= $post['title'] ?></h5>
                                <img src="./uploads/<?= $post['thumbnail'] ?>" alt="">
                                <a href="edit-post.php?id=<?= $post['id'] ?>"><h5>Edit</h5></a>
                                <a href="delete-post.php?id=<?= $post['id'] ?>"><h5>delete</h5></a>
                            </div>
                        <?php
                            endwhile
                        ?>
                    </div>
                </div>
                <!-- manage post code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>