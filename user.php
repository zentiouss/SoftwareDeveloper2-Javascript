<?php
$id = $_GET['id'];
session_start();

$sql = "SELECT * FROM users WHERE id = $id";
require_once("config.php");
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (!$user) {
    header("Location: /JSEndProject/home");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="/JSEndProject/assets/icon.ico" type="image/x-icon">
</head> 
<body>
    <div class="center">
        <p class="name"><?php echo $user["name"] ?></p>
        <p class="username">@<?php echo $user["username"] ?></p>
    </div>


    <script>
        document.title = "<?php echo $user['name']; ?> - JSENDPROJECT";
    </script>
</body>
</html>