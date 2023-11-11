<?php
include "../db/conn.php";
session_start();

if (isset($_POST['loginfacultybtn'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $sql ="SELECT * FROM accounts WHERE email ='$user' AND password ='$pass' AND type = 'user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['type'] = $row['type'];
        }
        header('location:../_faculty/faculty.php');
    } else {
        header('location:../_faculty/')
    ?>
      <script> alert("Invalid email or password. Please try again."); </script>
    
    <?php
    
    }
}
