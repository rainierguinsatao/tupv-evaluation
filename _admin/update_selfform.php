<?php
include '../php/session_admin.php';
include '../db/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through each question and update it in the database
    foreach ($_POST['question'] as $id => $question) {
        $sql = "UPDATE selfform_tbl SET question='$question' WHERE id=$id";
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Redirect back to the page where the form is displayed
    header("Location: your_page_with_forms.php");
    exit();
} else {
    // If the request method is not POST, handle it accordingly (optional)
    echo "Invalid request method.";
}
?>
