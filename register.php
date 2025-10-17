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
    <title>Register</title>
</head>
<body>
    <div class="center">
        <div class="container">
            <?php 
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $username = $_POST["username"];
                $password = $_POST["password"];

                if (empty($name) OR empty($username) OR empty($password)) {
                    echo "All fiels need to be filled in";
                } else {
                    require_once 'config.php';

                    $checkusername = "SELECT username FROM users WHERE username = '$username'";
                    $result = mysqli_query($conn, $checkusername);

                    if (mysqli_num_rows($result) > 0) {
                        echo 'Username already exists!';
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$hashed_password')";

                        if (mysqli_query($conn, $sql)) {
                            echo "User has been registered!";
                            header("Location: login");
                            exit;
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }


                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$hashed_password')";

                    if (mysqli_query($conn, $sql)) {
                        echo "User has been registered!";
                        header("Location: login");
                        die();
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
            ?>
            <h1 class="title">Register</h1>
            <form action="register" method="POST">
                <div class="form-group">
                    <p class="text">Name</p>
                    <input type="text" name="name" placeholder="" required>
                </div>
                <div class="form-group">
                    <p class="text">Username</p>
                    <input type="text" name="username" placeholder="" required>
                </div>
                <div class="form-group">
                    <p class="text">Password</p>
                    <input type="password" name="password" placeholder="" required>
                </div>
                <div class="form-group">
                    <input class="submit" type="submit" value="Register" name="submit">
                </div>
            </form>
            <a href="login" class="login">Already own an account? Login here!</a>
        </div>
    </div>
</body>
</html>