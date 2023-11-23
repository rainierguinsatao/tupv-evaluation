<?php
include '../db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirmPassword) {
        // Passwords do not match, handle accordingly (e.g., display an error message)
        echo "Passwords do not match.";
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the password in the accounts table
        $stmt = $conn->prepare("UPDATE accounts SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashedPassword, $userId);

        if ($stmt->execute()) {
            // Password updated successfully
            header('location: ./faculty.php');
          
        } else {
            // Error updating password
            echo "Error updating password: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
