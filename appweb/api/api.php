<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "monitoreoraspberrypi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the request method
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'POST':
        handlePostRequest($conn);
        break;
    case 'GET':
        handleGetRequest($conn);
        break;
    case 'PUT':
        handlePutRequest($conn);
        break;
    case 'DELETE':
        handleDeleteRequest($conn);
        break;
    default:
        echo json_encode(["status" => "error", "message" => "Invalid request method"]);
        break;
}

$conn->close();

function handlePostRequest($conn)
{
    // Create operation
    $valor = $_POST['valor'] ?? null;

    if ($valor !== null) {
        $stmt = $conn->prepare("INSERT INTO horial_mediciones (valor) VALUES (?)");
        $stmt->bind_param("d", $valor);  // "d" for decimal valor

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Record inserted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to insert record"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid input"]);
    }
}




function handleGetRequest($conn)
{
    // Read operation
    $id = $_GET['id'] ?? null;

    if ($id !== null) {
        $stmt = $conn->prepare("SELECT * FROM horial_mediciones WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo json_encode(["status" => "error", "message" => "No record found"]);
        }

        $stmt->close();
    } else {
        // Fetch all records if no ID is specified
        $result = $conn->query("SELECT * FROM horial_mediciones");

        if ($result->num_rows > 0) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            echo json_encode($rows);
        } else {
            echo json_encode(["status" => "error", "message" => "No records found"]);
        }
    }
}

function handlePutRequest($conn)
{
    // Update operation
    parse_str(file_get_contents("php://input"), $put_vars);

    $id = $put_vars['id'] ?? null;
    $valor = $put_vars['valor'] ?? null;

    if ($id !== null && $valor !== null) {
        $stmt = $conn->prepare("UPDATE horial_mediciones SET valor = ? WHERE id = ?");
        $stmt->bind_param("di", $valor, $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Record updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update record"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid input"]);
    }
}

function handleDeleteRequest($conn)
{
    // Delete operation
    parse_str(file_get_contents("php://input"), $delete_vars);

    $id = $delete_vars['id'] ?? null;

    if ($id !== null) {
        $stmt = $conn->prepare("DELETE FROM horial_mediciones WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Record deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete record"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid input"]);
    }
}
