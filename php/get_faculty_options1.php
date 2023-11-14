<?php
// get_faculty_options.php

// Include your database connection
include('../db/conn.php');

if (isset($_GET['course'])) {
    $selectedCourse = $_GET['course'];

    // Modify the SQL query to fetch faculty members based on the selected course
    $sql = "SELECT DISTINCT rs.gnrateid, a.first_name, a.last_name, a.mi
    FROM rate_score_tbl rs
    JOIN accounts a ON rs.gnrateid = a.id WHERE rs.course = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $selectedCourse);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        $facultyOptions = array();

        while ($row = $result->fetch_assoc()) {
            // $middleInitial = !empty($row['mi']) ? $row['mi'] . '.' : '';
            $facultyOptions[] = array(
                'value' => $row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['mi'],
                'text' => $row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['mi']
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
