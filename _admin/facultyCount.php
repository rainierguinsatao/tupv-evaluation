<?php
include '../db/conn.php';

// Get the selected option from the POST request
$selectedOption = $_POST['option'];

// Use a prepared statement to prevent SQL injection
$stmt = $conn->prepare("
    SELECT name,
           COUNT(DISTINCT CASE WHEN faculty IS NOT NULL AND type = 'Peer to Peer' THEN faculty END) AS peer_count,
           COUNT(DISTINCT CASE WHEN faculty IS NOT NULL AND type = 'Self' THEN faculty END) AS self_count,
           COUNT(DISTINCT CASE WHEN faculty IS NOT NULL AND type = 'Supervisor' THEN faculty END) AS supervisor_count
    FROM `rate_score_tbl`
    WHERE (kind = 'faculty' OR kind = 'supervisor') AND course = ?
    GROUP BY name;
");

$stmt->bind_param('s', $selectedOption);
$stmt->execute();

// Get the results
$result = $stmt->get_result();
$results = $result->fetch_all(MYSQLI_ASSOC);

// Return the results as JSON
echo json_encode($results);
?>
