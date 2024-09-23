<?php
require 'db_config.php';


$sql = "SELECT status FROM system_config WHERE id = 1"; 
$result = $conn->query($sql);

$status = 0; 
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row['status'];
}

$conn->close();


echo $status;
