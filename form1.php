<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $servername = "mectdb.c7xfrjfandc6.us-east-1.rds.amazonaws.com";
        $username1 = "admin";
        $password = "RandomLetters";
        $dbname = "CITDB";

// Create connection
 $conn = new mysqli($servername, $username1, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


#runs sql query to insert input from user MyGuests
$sql = "INSERT INTO test1 (id, username, email, pwd) VALUES ('0', '$username', '$email', '$pwd')";

if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



//connection closed.
$conn->close();
#redirects after hitting submit
header( 'Location: http://18.208.62.150/Login.html') ;
exit;

    }
?>
