<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Webstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Document</title>
    <?php

        include_once 'db.php';
        include_once 'user.php';

        session_start();

        $logged_in = false;
        if (isset($_SESSION['user'])) {
            $logged_in = true;
            $user = unserialize($_SESSION['user']);
}




?>
</head>
<body>
    
<nav class="navbar navbar-expand-sm grey">
    <div class="container-fluid">
        <a class="navbar-brand" href="Homepage.php">
            <img src="logo.png" alt="Company logo" style="width:99px; height:60px">
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact Us</a>
                </li>
                <?php 
                    if ($logged_in):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo($_SESSION['member_type']."_dashboard.php") ?>"><?php echo($_SESSION['member_type']." Dashboard") ?></a>
                </li>
                <?php endif ?>
            </ul>
            <form class="d-flex" method="post">
                <?php 
                    if ($logged_in):
                ?>
                
                <p style="color: white;">
                    Hello, <?php echo $_SESSION['first_name'] ?> <input type="submit" class="btn btn-primary" name="Logout" id="Logout" value="Logout">
                </p>
                
                <?php
                    else: 
                ?>
                <p>
                    <input type="submit" class="btn btn-primary" name="Login" id="Login" value="Login">
                </p>
                
                <?php endif ?>
            </form>
        </div>
    </div>
</nav> 

<div class="row">
    <div class="col-sm-3 p-3 text-black"></div>
    <div class="col-sm-3 p-3 text-black">2</div>
</div>
<div class="row">
    <div class="col-sm-3 p-3 text black">1</div>
    <div class="col-sm-3 p-3 text black">2</div>

</body>
</html>