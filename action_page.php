<?php
$servername = "mectdb.c7xfrjfandc6.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "RandomLetters";
$db = "CITDB";

$conn = new mysqli($servername, $username, $password, $db);
$search = $_POST['search'];

if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM MyGuests WHERE lastname LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo $row["lastname"]." ".$row["email"]."<br>";
}
} else {
        echo "No results found.";
}

$conn->close();
?>
