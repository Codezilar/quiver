<?php

session_start();

require 'config/database.php';
if (!isset($_SESSION['user-id'])) {
    header('location: ' .  ROOT_URL . 'login.php');
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIVER</title>
    <!-- fontawesome icon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    
    
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>