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



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <h1>To-do List</h1>
    <hr>
    <div>
        <form action="/them.php" method="POST">
            <div class="form-group">
                <input type="text" name="todo" class="form-control">
            </div>
            <input class="btn btn-danger" type="submit" value="Thêm"/>
        </form>
    
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <th>#</th>
            <th>Tên</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </thead>
        <!-- <tr>
            <td>1</td>
            <td>Ăn Sáng</td>
            <td>Chưa xong</td>
            <td>
                <button class="btn btn-danger">Xong</button>
                <button class="btn btn-danger">Chỉnh sửa</button>
                <button class="btn btn-danger">Xóa</button>
            </td>
        </tr> -->

        <?php 

            $sql = "SELECT id, name, status FROM todo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $status = $row['status'] == 0? 'Chưa xong' : 'Xong rồi';
        echo "<tr>";
        echo "<td>$row[id]</td>";
        echo "<td>$row[name]</td>";
        echo "<td>$status</td>";

        echo "<td>";
        echo "<button class=\"btn btn-danger\">Xong</button>";
        echo "<button class=\"btn btn-danger\">Chỉnh sửa</button>";
        echo "<a class=\"btn btn-danger\" href=\"/xoa.php?id=$row[id]\">Xóa</a>";
        echo "</td>";

        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
         ?>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>