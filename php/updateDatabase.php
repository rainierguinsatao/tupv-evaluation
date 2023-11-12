<?php
include '../db/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["value"])) {
    $valueToUpdate = $_POST["value"];



    $stmt = mysqli_prepare($conn, "UPDATE accounts SET switch = ?");
    mysqli_stmt_bind_param($stmt, "i", $valueToUpdate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "Database updated successfully";
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}
?>
