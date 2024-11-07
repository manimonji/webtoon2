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
    <title>ورود</title>
</head>
<body>
    <h1>ایجاد کمیک</h1>
    <form action="new_comic_process.php" method="POST" enctype="multipart/form-data">
        <label>نام کمیک <input type="text" id="comic_title" name="comic_title"></label>
        <label>توضیحات کمیک <textarea type="text" id="comic_description" name="comic_description"></textarea></label>
        <input type="file" id="comic_image" name="comic_images[]" multiple>
        <input type="submit" value="ایجاد کمیک">
    </form>
</body>
</html>