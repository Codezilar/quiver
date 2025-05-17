<?php 

include ('./includes/header.php') ;

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM catalogue WHERE id=$id";
    $query_result = mysqli_query($connection, $query);
    
    $category_query = "SELECT * FROM categories";
    $category_query_result = mysqli_query($connection, $category_query);


    
    if(mysqli_num_rows($query_result) == 1){
        $catalogue = mysqli_fetch_assoc($query_result);
    }

}else{
    header('location: ' . ROOT_URL . 'manage-catalogue.php');
}
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
                        <li><span><a href="series.php">Series</a> / <a href="#">Edit Catalogue</a></span><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                
                <form class="upload-form" action="<?= ROOT_URL ?>edit-catalogue-logic.php" method="post">
                    <?php if(isset($_SESSION['edit-catalogue'])): ?>
                        <h3 class="error">
                            <?= 
                                $_SESSION['edit-catalogue'];
                                unset($_SESSION['edit-catalogue'])
                            ?>
                        </h3>
                    <?php endif ?>
                    <div class="form-container">
                        <input type="hidden" name="id" value="<?= $catalogue['id'] ?>">
                        <input type="hidden" name="previous_thumbnail_name" value="<?= $catalogue['thumbnail'] ?>">
                        <div class="form-top">
                            <input type="text" name="title" value="<?= $catalogue['title'] ?>" placeholder="Title" required>
                            <select name="category_id">
                                <?php foreach ($category_query_result as $key) :?>
                                    <option value="<?= $key['id'] ?>" <?= $catalogue['category_id'] == $key['id'] ? 'selected' : '' ?> ><?= $key['title'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <textarea name="body" placeholder="About catalogue" required><?= $catalogue['body']; ?></textarea>
                        <div class="thubnail">
                            <h3>Thumbnail (Headlining Image)</h3>
                            <input type="file" placeholder="Thumbnail" name="thumbnail">
                            <img src="" alt="">
                        </div>
                        <button type="submit" name="submit">Update</button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            



</body>
</html>