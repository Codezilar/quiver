<?php

session_start();

require 'config/database.php';

$username = $_SESSION['signin-data']['username'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']); 

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    
    <div class="login-div">
        <form action="<?= ROOT_URL ?>login-logic.php" method="POST">
            <?php if(isset($_SESSION['signin'])) : ?>    
                <h3>
                    <?= 
                        $_SESSION['signin'];
                        unset($_SESSION['signin'])
                    ?>
                </h3>
            <?php endif ?> 
            <img src="./blue.png" alt="" class="logo">
            <div class="title">Quiver</div>
            <div class="sub-tittle">Home of Entertainment</div>

            <div class="fields">
                
                <div class="username">
                    <span><i class="k"></i></span>
                    <input name="username" value="<?= $username ?>" type="text" class="user-input" placeholder="Username" required>
                </div>

                <div class="password">
                    <span><i class="k"></i></span>
                    <input name="password" value="<?= $password ?>" type="password" class="pass-input" placeholder="Password" required>
                </div>

            </div>

            <button name="submit" type="submit" class="signin-button">
                Login
            </button>
            <div class="link">
                <a href="">Forgot Password?</a>
                or
                <a href="">Sign up</a>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>