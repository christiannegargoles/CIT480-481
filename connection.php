<?php
    $host = "mectdb.c7xfrjfandc6.us-east-1.rds.amazonaws.com";
    $user = "admin";
    $password = "RandomLetters";
    $db_name = "CITDB";

    $con = mysqli_connect($host, $user, $password, $db_name);
    if(mysqli_connect_errno()) {
        die("Failed to connect with MySQL: ". mysqli_connect_error());
    }
?>
