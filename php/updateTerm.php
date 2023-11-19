<?php
include '../db/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateTerm"])) {
    $selectedTerm = $_POST["selectedTerm"];

    // Update the options in the database based on the selected term
    $sql = "UPDATE tem SET term = ? WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedTerm);
    $stmt->execute();
    $stmt->close();

    echo "Database updated successfully";
    header("location: ../_admin/settings.php");
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}
?>
