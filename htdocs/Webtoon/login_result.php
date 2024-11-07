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
        var_dump($_POST);
        // If POST is not empty, attempt to call add_user() with the POST data
        if (sizeof($_POST) > 0) {
            if (login_user($_POST["username/email"], $_POST["password"])) {
                echo "با موفقیت وارد شدید";
            } else {
                echo "پسورد یا ایمیل اشتباه";
            }
        } else {
            echo "No data received!";
        }
    }
    ?>
</body>
</html>