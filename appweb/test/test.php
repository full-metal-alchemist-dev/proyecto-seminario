<?php
// Include the database connection
include '../include/conexion.php';



// Check if the required GET parameters are set
if (isset($_GET['id']) && isset($_GET['tabla'])) {
	$tabla = $_GET['tabla'];
	$id = $_GET['id'];

	// Sanitize inputs to prevent SQL injection
	$tabla = $conn->real_escape_string($tabla);
	$id = $conn->real_escape_string($id);

	// Construct the SQL query
	$sql = "SELECT * FROM " . $tabla . " WHERE " . $tabla . ".id = '$id'";

	// Execute the query
	$query = $conn->query($sql);

	// Check if the query was successful
	if ($query) {
		// Fetch the result
		$row = $query->fetch_assoc();

		// Output the result as JSON
		echo json_encode($row);
	} else {
		// Query failed, output the error
		echo "Error executing query: " . $conn->error;
	}
} else {
	// Missing parameters
	echo "Error: 'id' and 'tabla' parameters are required.";
}

// Close the connection
$conn->close();
