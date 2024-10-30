<?php
// Database credentials
$servername = "localhost"; // Your server (or IP if remote)
$username = "root";
$password = "123";
$dbname = "cat1921ajs_bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the 'status' from 'system_config' table
$sql = "SELECT status FROM system_config WHERE id = 1";
$result = $conn->query($sql);

// Check if the query returns any results
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array("status" => $row["status"]));
} else {
    echo json_encode(array("status" => "error", "message" => "No records found."));
}

// Close connection
$conn->close();
