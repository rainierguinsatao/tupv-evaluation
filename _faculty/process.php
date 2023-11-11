<?php
include "../db/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ftype = $_POST['ftype'];
    $fn = $_POST['full_name'];
    $selectOption = $_POST['selectOption'];
    $course = $_POST['course'];
    $term = $_POST['term'];
    $schoolyear = $_POST['schoolyear'];
    $faculty_to_eval = $_POST['faculty_to_eval'];
   


    foreach ($_POST['question'] as $qid => $score) {
        $tits = $_POST['tits'][$qid];

        if ($selectOption == 'Supervisor' || $selectOption == 'Peer to Peer' || $selectOption == 'Self') {
            $sql = "INSERT INTO rate_score_tbl (type, name, kind, course, term, sy, qid, tits, faculty, score) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        } else {
            // Handle other options or show an error message
            echo "Invalid option";
            exit();
        }

        $stmt = $conn->prepare($sql);

        if ($selectOption == 'Self') {
            // Use $fn as the value for the 'faculty' column
            $stmt->bind_param("sssssssssi", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $fn, $score);
        } else {
            // Use $faculty_to_eval as the value for the 'faculty' column
            $stmt->bind_param("sssssssssi", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $faculty_to_eval, $score);
        }

        $stmt->execute();
        $stmt->close();
    }

    // Optionally, you may redirect the user to a success page
    header("Location: ../_faculty");
    exit();
} else {
    // Handle invalid request method (e.g., someone accessing the page directly)
    echo "Invalid request method";
}
?>
