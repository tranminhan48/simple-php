<?php 

include_once('connect.php');
$id = $_GET['id'] ?? 0;

$sql = "SELECT id, name, status FROM todo where id=$id";
$result = $conn->query($sql);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['id'];
	$ec = $_POST['name'];

	$sql = "UPDATE todo SET name='$ec' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
	    
	} else {
	    
	}

	header('Location: /');

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>sua</title>
</head>
<body>


<?php 
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	echo "<form action=\"/sua.php\" method=\"post\">";
	echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
	echo "<input type=\"text\" name=\"name\" value=\"$row[name]\">";
	echo "<input type=\"submit\" value=\"Cập nhật\">";
	echo "</form>";

} else {
    
}
?>

</body>
</html>