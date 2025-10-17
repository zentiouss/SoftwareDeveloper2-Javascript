<?php
session_start();
if(isset($_SESSION["user"])) {
    header("Location: home");
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/auth.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <div class="container">
            <?php 
            if (isset($_POST["submit"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                require_once "config.php";
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        session_start();
                        $_SESSION["user"] = "yes";
                        $_SESSION["id"] = $user["id"];
                        $_SESSION["name"] = $user["name"];
                        $_SESSION["username"] = $user["username"];
                        
                        
                        header("Location: home");
                        die();
                    };
                } else {
                    echo "User does not exist!";
                }
            }
            ?>

            <h1 class="title">Login</h1>
            <form action="login" method="POST">
                <div class="form-group">
                    <p class="text">Username</p>
                    <input type="text" name="username" placeholder="" required>
                </div>
                <div class="form-group">
                    <p class="text">Password</p>
                    <input type="password" name="password" placeholder="" required>
                </div>
                <div class="form-group">
                    <input class="submit" type="submit" value="Login" name="submit">
                </div>
            </form>
            <a href="register" class="register">Don't have an account? Register here!</a>
        </div>
    </div>
</body>
</html>