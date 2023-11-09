<?php

include "../db/conn.php";
// include "session.php";

if (isset($_POST['registerbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = 'user';

    $sql = "INSERT INTO accounts(name, email, password, type)
    VALUES('$name', '$email', '$password', '$type')";

    if ($conn->query($sql) === TRUE) {
        header('location: ../_faculty');
    } else {
        echo "Unable to save student record due to following error" .$conn->connect_error;
        header('location: ../faculty/register.php');
    }

} 

?>