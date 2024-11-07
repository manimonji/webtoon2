<?php
include 'database.php';

try {
    // Run a simple query to check the connection and fetch data
    $sql = "SELECT * FROM users LIMIT 1"; // Adjust table name as needed
    $stmt = $pdo->query($sql);

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "Connection successful! Here's a sample row:<br>";
        print_r($result["username"]); // Print out the row data
    } else {
        echo "Connection successful, but no data found in the table.";
    }
} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>