<?php
$servername = "localhost";
$username = "root";
$password = "0809";
$db = "DB1";

$conn = new mysqli($servername, $username, $password, $db);
$search = $_POST['search'];

if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pets WHERE name LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo $row["name"]." ".$row["species"]."<br>";
}
} else {
        echo "0 records";
}

$conn->close();
?>