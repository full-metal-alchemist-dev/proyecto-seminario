<?php

$environment = false; // Set this to false for development mode

// Define credentials based on environment
if ($environment) {
    $servername = "68.66.224.58";
    $username = "cat1921ajs_bd";
    $password = "&aSI~{{2MyL?";
    $dbname = "cat1921ajs_bd";
} else {
    // Default to development mode
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "cat1921ajs_bd";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
