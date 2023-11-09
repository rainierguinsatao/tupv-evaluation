<?php
session_start();
 if ($_SESSION['type'] !== 'user') {
    header("Location: ../_faculty/"); // Redirect to unauthorized page
    exit();
}
?>