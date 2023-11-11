<?php
include '../db/conn.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    // Check if data is not empty
    if (!empty($data)) {
        // Loop through the received data and insert it into the database
        foreach ($data as $item) {
            $questionId = substr($item['id'], 1, strpos($item['id'], '_') - 1); // Extract question ID from the radio button ID
            $rating = $item['value'];

            // Perform database insertion (replace 'your_table' with your actual table name)
            $insert_query = "INSERT INTO rate_score_tbl (name, rate) VALUES ('$questionId', '$rating')";
            $result = mysqli_query($conn, $insert_query);

            // Check if the insertion was successful
            if (!$result) {
                echo json_encode(array('status' => 'error', 'message' => mysqli_error($conn)));
                exit;
            }
        }

        // If all insertions were successful, send a success response
        echo json_encode(array('status' => 'success', 'message' => 'Data inserted successfully'));
    } else {
        // If data is empty, send an error response
        echo json_encode(array('status' => 'error', 'message' => 'No data received'));
    }
} else {
    // If the request is not a POST request, send an error response
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
}
?>
