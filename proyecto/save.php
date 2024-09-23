<?php
require 'db_config.php';

// Get status from query parameter
$status = isset($_GET['status']) ? (int)$_GET['status'] : 0;

// Update status in the database
$sql = "UPDATE system_config SET status = ? WHERE id = 1"; // Adjust SQL query as needed
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $status);
$stmt->execute();

$response = ['success' => $stmt->affected_rows > 0];
$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
