<?php 

include ('./includes/header.php') ;

$query = "SELECT * FROM catalogue";
$query_result = mysqli_query($connection, $query);
// $catalogue = mysqli_fetch_array($query_result);



?>
    <div class="main">
        <div class="main-container">
            <div class="center">
                <div class="padding intro">
                    <h1>Generus Dachboard</h1>
                    <div class="center-right-nav">
                        <div class="search">
                            <input type="search" placeholder="Search here...">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>  
                <div class="padding second-nav">
                    <ul>
                        <li><span><a href="series.php">Series</a> / <a href="manage-catalogue.php">Manage Catalogue</a></span><hr></li>
                    </ul>
                </div>
                <!-- manage post code space -->
                <div class="manage-post">
                    <?php if(isset($_SESSION['add-post-success'])): ?>
                        <h3 class="success">
                            <?= 
                                $_SESSION['add-post-success'];
                                unset($_SESSION['add-post-success'])
                            ?>
                        </h3>
                    <?php elseif(isset($_SESSION['edit-catalogue-succes'])): ?>
                        <h3 class="success">
                            <?= 
                                $_SESSION['edit-catalogue-succes'];
                                unset($_SESSION['edit-catalogue-succes'])
                            ?>
                        </h3>
                    <?php endif ?>
                    <h3>All  Catalogues</h3>
                    <div class="manage-post-container">
                        <div class="manage-post-head">
                            <h5>Title</h5>
                            <h5>Thumnail</h5>
                            <h5>Edit</h5>
                            <h5>delete</h5>
                        </div>
                        <?php foreach ($query_result as $key) : ?>
                            <div class="manage-post-content">
                                <h5><?= $key['title'] ?></h5>
                                <img src="./uploads/<?= $key['thumbnail'] ?>" alt="">
                                <a href="edit-catalogue.php?id=<?= $key['id'] ?>"><h5>Edit</h5></a>
                                <a href="delete-catalogue.php?id=<?= $key['id'] ?>"><h5>delete</h5></a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <!-- manage post code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>