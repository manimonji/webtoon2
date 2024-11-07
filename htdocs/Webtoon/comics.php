<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کمیک ها</title>
</head>
<body>
    <?php
    require 'database.php';
    $sql = "SELECT * FROM comics WHERE 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $comics = $stmt->fetchAll(PDO::FETCH_ASSOC); // Use fetchAll to get all rows

    foreach ($comics as $comic) {
        ?>
        <h1><?php echo $comic["title"]; ?></h1>
        <?php
        foreach (json_decode($comic["images"]) as $image_url) {
            ?>
            <img src="./uploads/<?php echo $image_url; ?>">
            <?php
        }
        ?>
        <p><?php echo $comic["description"]; ?></p>
        <?php
    } // Close the outer foreach loop
    ?>
</body>
</html>
