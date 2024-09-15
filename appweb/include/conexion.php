<?php
$host = "localhost";
$basededatos = "monitoreoraspberrypi";
$usuariodb = "root";
$clavedb = "123";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create a new MySQLi connection
$conn = new mysqli($host, $usuariodb, $clavedb, $basededatos);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8
if (!$conn->set_charset("utf8")) {
	die("Error loading character set utf8: " . $conn->error);
}
