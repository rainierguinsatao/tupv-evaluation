<?php
include "../db/conn.php";

if (isset($_POST['dept'])) {
    $selectedDept = $_POST['dept'];

    // Query to get courses based on the selected department
    $sql = "SELECT DISTINCT courseName FROM courses_tbl WHERE dept = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $selectedDept);
    $stmt->execute();
    $result = $stmt->get_result();

    // Build the options for the course dropdown
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['courseName'] . '">' . $row['courseName'] . '</option>';
    }

    // Return the options
    echo $options;
}
?>
