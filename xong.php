<?php 

include_once('connect.php');
$id = $_GET['id'] ?? 0;

$sql = "SELECT id, name, status FROM todo where id=$id";
$result = $conn->query($sql);


	$id = $_GET['id'] ?? 0;

	$sql = "UPDATE todo SET status=1 WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
	    
	} else {
	    
	}

	header('Location: /');




?>