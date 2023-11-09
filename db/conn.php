<?php
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "db_evaluation";

    //create connection
    $conn = mysqli_connect($server,$username,$pass,$db);

    //check connection
    if ($conn->connect_error) {
        die ("Connection Failed!". $conn->connect_error);
    }
?>