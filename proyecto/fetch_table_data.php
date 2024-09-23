<?php
require 'db_config.php';
// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Fetch table data from the database
$sql = "SELECT id, status FROM system_config"; // Adjust table name as needed
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
