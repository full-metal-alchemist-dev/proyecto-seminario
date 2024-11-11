<?php


    // Default to development mode
    $servername = "127.0.0.1";
    $username = "root";
    $password = "123";
    $dbname = "cat1921ajs_bd";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
