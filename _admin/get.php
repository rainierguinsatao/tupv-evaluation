<?php
include '../db/conn.php';

// Assuming you have a database connection established ($conn)
// and the selected course is passed in the query string
$selectedCourse = $_GET['course'];

// Use a prepared statement to avoid SQL injection
$sql = "SELECT COUNT(*) AS total FROM accounts WHERE dept = ? AND course = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $dept, $course);
list($dept, $course) = explode(' - ', $selectedCourse); // Assuming the format "dept - course"

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
echo $row['total'];
?>
