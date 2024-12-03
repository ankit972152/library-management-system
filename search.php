<?php
header('Content-Type: application/json');

// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "users";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed."]);
    exit;
}

// Get the search query
$name = isset($_GET['name']) ? $_GET['name'] : '';

if (!empty($name)) {
    $stmt = $conn->prepare("SELECT  name FROM books WHERE name LIKE ?");
    $searchTerm = "%" . $name . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $books = [];
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

    echo json_encode($books);
} else {
    echo json_encode([]);
}

$conn->close();
?>
