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
    $gnrateid = $_POST['gnrateid'];
    $nagrateid = $_POST['nagrateid'];

    foreach ($_POST['question'] as $qid => $score) {
        $tits = $_POST['tits'][$qid];

        if ($selectOption == 'Supervisor' || $selectOption == 'Peer to Peer' || $selectOption == 'Self') {
            $sql = "INSERT INTO rate_score_tbl (type, name, kind, course, term, sy, qid, tits, faculty, score, gnrateid, nagrateid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                if ($selectOption == 'Self') {
                    $stmt->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $fn, $score, $nagrateid, $nagrateid);
                } else {
                    $stmt->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $faculty_to_eval, $score, $gnrateid, $nagrateid);
                }

                $stmt->execute();
                $stmt->close();
            } else {
                // Handle SQL error
                echo "SQL Error: " . $conn->error;
            }
        } else {
            // Handle other options or show an error message
            echo "Invalid option";
            exit();
        }
    }

    // Optionally, you may redirect the user to a success page
    header("Location: ../_faculty/faculty.php");
    exit();
} else {
    // Handle invalid request method (e.g., someone accessing the page directly)
    echo "Invalid request method";
}
?>
