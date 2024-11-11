<?php
// Include the database connection from db_config.php
require 'db_config.php';

// Query to select from the database
$sql = "SELECT * FROM system_config WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row and get the status value
    $row = $result->fetch_assoc();
    header('Content-Type: text/plain');
    echo $row['status'];
} else {
    // If no rows found, return an appropriate message
    echo "No status found";
}

$conn->close();
