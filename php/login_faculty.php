<?php

include '../db/conn.php';
session_start();

if (isset($_POST['loginfacultybtn'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE email ='$user' AND password ='$pass' AND type = 'user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['type'] = $row['type'];
            $acr = $row['first_name'];

            $switchValue = $row['switch'];
            if ($switchValue == 1) {
                $_SESSION['alertOff'] = $_SESSION['alertOff'] = "Welcome " . $acr . ", Ready to evaluate?";
                $_SESSION['alertOffColor'] = "blue";
                header('location:../_faculty/faculty.php');
            } else {
                $_SESSION['alertOff'] = " Evaluation has not started yet, Try again Later";
                $_SESSION['alertOffColor'] = "blue";
                header('location:../_faculty/offpage.php');
            }
        }
    } else {

        header('location:../_faculty/');
    }
}
?>
