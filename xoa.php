<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8');

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$id = $_GET['id'] ?? 0;

$sql = "DELETE FROM todo WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

header('Location: /');

?>	