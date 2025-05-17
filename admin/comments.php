<?php

include ('./includes/header.php') ;
$query = "SELECT * FROM comments ORDER BY id DESC";
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
                        <li>
                            <a href="index.php">Overview</a><hr>
                        </li>
                        <li><a href="movies.php">Movies</a></li>
                        <li><a href="series.php">Series</a></li>
                    </ul>
                </div>  
                <div class="comment">
                    <div class="manage-post">
                        <h3>All  Comment</h3>
                        <div class="manage-post-container">
                            <?php if(isset($_SESSION['delete-comment'])): ?>
                                <h3 class="success">
                                    <?= 
                                        $_SESSION['delete-comment'];
                                        unset($_SESSION['delete-comment'])
                                    ?>
                                </h3>
                            <?php endif ?> 
                            <div class="manage-post-head-mini">
                                <h5>Title</h5>
                                <h5>Email</h5>
                                <h5>Delete</h5>
                            </div>
                            <?php foreach($query_result as $comment): ?>
                            <div class="manage-post-content-mini">
                                <h5><?= $comment['body'] ?></h5>
                                <h5><?= $comment['email'] ?></h5>
                                <a href="delete-comment-logic.php?id=<?= $comment['id'] ?>"><h5>Delete</h5></a>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>  
            <?php include ('./includes/aside.php') ?>
            
</body>
</html>