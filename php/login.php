<?php
include "../db/conn.php";
session_start();

if (isset($_POST['loginbtn'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $sql ="SELECT * FROM accounts WHERE email ='$user' AND password ='$pass' AND type = 'admin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['type'] = $row['type'];
        }
        header('location:../_admin/admin.php');
    } else {
        header('location:../_admin/')
    ?>
      <script> alert("Invalid email or password. Please try again."); </script>
    
    <?php
    
    }
}
