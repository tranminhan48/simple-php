<?php 

include_once('connect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$ec = $_POST['todo'];
	$sql = "INSERT INTO todo (id, name, status) VALUES (null, '$ec', 0)";
	if ($conn->query($sql) === TRUE) {
	    
	} else {
	    
	}

	header('Location: /');

}

?>	