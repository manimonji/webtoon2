<?php 
require "functions.php"; 
if (!isset($_SESSION["username/email"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>
        سلام
        <?php
         echo get_user($_SESSION["username/email"])["username"]
        ?>
        !
    </h1>
    <a href="logout.php">خروج از حساب کاربری</a>
</body>
</html>