<?php
    include('connection.php');
    $username = $_POST['user'];
    $password = $_POST['pass'];

        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

      //uses the SQL select command to grab data from these feilds
        $sql = "SELECT * FROM test1 where username='$username' AND pwd='$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // A statment that checks the feilds if the username & pass are correct
        if($count == 1){
            echo "<h1><center> Login successful </center></h1>";
            header( 'Location: Memberpage.html' ) ;
        }
        else{
            header( 'Location: not-found.html');  
        }
?>
