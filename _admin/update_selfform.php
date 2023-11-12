<?php
include '../php/session_admin.php';
include '../db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through each question and update it in the database
    foreach ($_POST['question'] as $id => $question) {
        // Use a prepared statement to handle special characters
        $stmt = $conn->prepare("UPDATE froms_tbl SET question=? WHERE id=?");
        
        // Bind parameters
        $stmt->bind_param("si", $question, $id);
        
        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
} else {
    // If the request method is not POST, handle it accordingly (optional)
    echo "Invalid request method.";
}
?>
