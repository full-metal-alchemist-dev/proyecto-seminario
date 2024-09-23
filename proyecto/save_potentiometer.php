<?php


require 'db_config.php';

$potValue = $_GET['potValue'];  // Potentiometer value as a decimal

// Debugging: Log received value
file_put_contents('log.txt', "Received potentiometer value: " . $potValue . "\n", FILE_APPEND);

// Prepare and execute SQL to insert potentiometer value into the database
$sql = "INSERT INTO potentiometer_data (pot_value, recorded_at) VALUES (?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("d", $potValue);  // Bind the potentiometer value as a double (decimal)
$stmt->execute();

// Check for errors
if ($stmt->error) {
  file_put_contents('log.txt', "SQL Error: " . $stmt->error . "\n", FILE_APPEND);
}

$stmt->close();
$conn->close();
