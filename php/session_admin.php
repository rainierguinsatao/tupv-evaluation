<?php
session_start();
 if ($_SESSION['type'] !== 'admin') {
    header("Location: ../_admin/"); // Redirect to unauthorized page
    exit();
}
?>