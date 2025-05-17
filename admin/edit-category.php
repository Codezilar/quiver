<?php 

include ('./includes/header.php');
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // fetch category from dfatabase
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1){
        $category = mysqli_fetch_assoc($result);
    }
}else{
    header('location: ' . ROOT_URL . 'manage-category.php');
    die();
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
                        <li><span><a href="movies.php">Movies</a> / <a href="#">Edit Category</a></span><hr></li>
                    </ul>
                </div>  
                <!-- upload code space -->
                
                <form class="upload-form" action="<?= ROOT_URL ?>edit-category-logic.php" method="post">
                    
                    <div class="form-container">
                        <input type="hidden" name="id" value="<?= $category['id'] ?>">
                        <div class="form-top">
                            <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title" required>
                        </div>
                        <textarea name="description" placeholder="About category" required><?= $category['description']; ?></textarea>
                        <button type="submit" name="submit">Update</button>
                    </div>
                </form>
                <!-- upload code space -->
            </div>  
            <?php include ('./includes/aside.php') ?>
            
            

</body>
</html>