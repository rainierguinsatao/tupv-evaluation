<?php
// get_faculty_options.php

// Include your database connection
include('../db/conn.php');

if (isset($_GET['course'])) {
    $selectedCourse = $_GET['course'];

    // Modify the SQL query to fetch faculty members based on the selected course
    $sql = "SELECT DISTINCT faculty FROM rate_score_tbl WHERE course = ? ORDER BY faculty ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $selectedCourse);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        $facultyOptions = array();

        while ($row = $result->fetch_assoc()) {
            // $middleInitial = !empty($row['mi']) ? $row['mi'] . '.' : '';
            $facultyOptions[] = array(
                'value' => $row['faculty'],
                'text' => $row['faculty']
            );
        }

        // Return the options in JSON format
        header('Content-Type: application/json');
        echo json_encode($facultyOptions);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
