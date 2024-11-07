<?php
session_start();

require "database.php";
function add_user($username, $email, $password) {
    global $pdo;
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    try {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
    
        // Bind the parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
    
        // Execute the statement
        $stmt->execute();
    
        return "User registered successfully!";
    } catch (PDOException $e) {
        return "Error inserting user: " . $e->getMessage();
    }
}
function get_user($input) {
    // Assuming $pdo is your PDO connection object
    global $pdo;

    // Determine if input is an email or username
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        // Input is an email
        $sql = "SELECT * FROM users WHERE email = :input";
    } else {
        // Input is a username
        $sql = "SELECT * FROM users WHERE username = :input";
    }

    // Prepare the statement to prevent SQL injection
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':input', $input);

    // Execute the statement
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function is_valid_user($input, $password) {
    $user = get_user($input);
    return $user && password_verify($password, $user['password']);
}
function login_user($input, $password) {
    if (is_valid_user($input, $password)) {
        $_SESSION['username/email'] = $input;
        return true;
    }
    return false;
}
function add_comic($user_id ,$title, $description, $images) {
    global $pdo;
    // Hash the password
    try {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO comics (user_id, title, description, images) VALUES (:user_id, :title, :description, :images)";
        $stmt = $pdo->prepare($sql);

        $images_json = json_encode($images);
    
        // Bind the parameters
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':images', $images_json);
    
        // Execute the statement
        $stmt->execute();
    
        return "Comic inserted successfully!";
    } catch (PDOException $e) {
        return "Error inserting comic: " . $e->getMessage();
    }
}
?>