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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$ec = $_POST['todo'];
	$sql = "INSERT INTO todo (id, name, status) VALUES (null, '$ec', 0)";
	if ($conn->query($sql) === TRUE) {
	    
	} else {
	    
	}

	header('Location: /');

}

?>	