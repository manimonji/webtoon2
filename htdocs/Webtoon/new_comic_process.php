<?php
require "functions.php"; 
if (!isset($_SESSION["username/email"])) {
    header("Location: login.php");
}
$fileNames = [];
if (isset($_FILES['comic_images'])) {
    $uploadDir = 'uploads/'; // Ensure this directory exists and is writable

    foreach ($_FILES['comic_images']['tmp_name'] as $key => $tmpName) {
        if ($_FILES['comic_images']['error'][$key] == UPLOAD_ERR_OK) {
            $fileName = basename($_FILES['comic_images']['name'][$key]);
            $fileNames[] = $fileName;
            $uploadFile = $uploadDir . $fileName;

            // Move the uploaded file to the designated directory
            if (move_uploaded_file($tmpName, $uploadFile)) {
                echo "File '$fileName' uploaded successfully!<br>";
            } else {
                echo "Failed to upload file '$fileName'.<br>";
            }
        } else {
            echo "Error with file upload for file '$fileName'.<br>";
        }
    }
} else {
    echo "No files uploaded.";
}
add_comic(get_user($_SESSION["username/email"])["id"], $_POST["comic_title"], $_POST["comic_description"], $fileNames);
echo "کمیک افزوده شد"
?>