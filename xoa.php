<?php 

include_once('connect.php');

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