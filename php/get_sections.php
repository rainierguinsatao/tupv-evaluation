<?php
include '../db/conn.php';

if (isset($_GET['course'])) {
    $selectedCourse = $_GET['course'];

    // Fetch sections based on the selected course
    $sql = "SELECT section FROM `sections` WHERE course = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $selectedCourse);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate options for the section dropdown
    $options = '<option selected disabled hidden value="">Choose Section</option>';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['section'] . '">' . $row['section'] . '</option>';
    }

    echo $options;
} else {
    echo "Invalid request";
}




?>