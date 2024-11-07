<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Include your functions file
        require "functions.php";
        
        // If POST is not empty, attempt to call add_user() with the POST data
        if (sizeof($_POST) > 0) {
            echo add_user($_POST["username"], $_POST["email"], $_POST["password"]);
            echo "حساب شما با موفقیت ساخته شد";
        } else {
            echo "No data received!";
        }
    }
    ?>
</body>
</html>
