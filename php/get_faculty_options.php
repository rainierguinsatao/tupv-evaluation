<?php
// get_faculty_options.php

// Include your database connection
include('../db/conn.php');

if (isset($_GET['course']) && isset($_GET['dept'])) {
    $selectedCourse = $_GET['course'];
    $selectedDept = $_GET['dept'];

    // Modify the SQL query to fetch faculty members based on the selected course
    $sql = "SELECT * FROM accounts WHERE course = ? AND dept = ? ORDER BY last_name ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $selectedCourse, $selectedDept);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result) {
        $facultyOptions = array();

        while ($row = $result->fetch_assoc()) {
            // $middleInitial = !empty($row['mi']) ? $row['mi'] . '.' : '';
            $facultyOptions[] = array(
                'value' =>  $row['id'] . '|' . $row['first_name'] . ', ' . $row['last_name'] . ' ' . $row['mi'],
                'text' => $row['first_name'] . ', ' . $row['last_name'] . ' ' . $row['mi']
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
