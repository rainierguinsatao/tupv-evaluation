<?php
      session_start(); // to check if there is a session
      session_destroy(); // destroy session to commit logout
      unset($_SESSION['id']); // remove id from session
      unset($_SESSION['name']);
      unset($_SESSION['email']);
      unset($_SESSION['password']); 
      unset($_SESSION['type']);
      header('location:../_admin/');
      exit();
?>  