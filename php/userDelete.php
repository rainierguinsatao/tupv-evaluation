<?php
include '../php/session_admin.php';
include '../db/conn.php';

if (isset($_GET['delsettings'])) {
    $userId = $_GET['id'];

    // Fetch user data from the database based on the user ID
    $sql = "DELETE FROM courses_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die('Error in statement preparation: ' . $conn->error);
    }

    $stmt->bind_param("i", $userId);
    $stmt->execute();

    if ($stmt->error) {
        die('Error in statement execution: ' . $stmt->error);
    }

    $stmt->close();

    header('location: ../_admin/settings.php');
    exit(); // Always exit after sending a location header
}
?>
