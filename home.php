    <?php
    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location: login");
    };
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/navbar.css">
        <link rel="icon" href="assets/icon.ico" type="image/x-icon">
        <title>Javascript Recipe Searcher</title>
    </head>
    <body>
        <div class="navbar">
            <ul class="nav-options">
                <li class="nav-option"><a href="user/<?php echo $_SESSION["id"] ?>"><i class="fa-solid fa-user"></i></a></li>
                <!-- <li class="nav-option"><a href="#"><i class="fa-solid fa-users"></i></a></li> -->
                <li class="nav-option"><a href="logout"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>

        <div class="center">
            <div class="top"><p>Search Recipe</p></div>
            <div class="bottom">
                <input type="text" name="" id="">
                <button class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>

        <script src="main.js"></script>
        <script src="https://kit.fontawesome.com/fcd9f12800.js" crossorigin="anonymous"></script>
    </body>
    </html>