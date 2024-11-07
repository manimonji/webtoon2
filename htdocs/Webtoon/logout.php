<?php 
session_start(); // Start the session if not already started

// Unset all session variables
$_SESSION = array();

// Destroy the session completely
session_destroy();

// Optionally, clear the session cookie to ensure complete logout
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect the user to the login page or homepage
header("Location: index.php"); // Replace with your login page or homepage
exit();
?>