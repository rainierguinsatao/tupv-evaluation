<?php
include "../db/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($gnrateid, $faculty_to_eval) = explode('|', $_POST['faculty_to_eval']);
    $ftype = $_POST['ftype'];
    $fn = $_POST['full_name'];
    $selectOption = $_POST['selectOption'];
    $course = $_POST['course'];
    $term = $_POST['term'];
    $schoolyear = $_POST['schoolyear'];
    $nagrateid = $_POST['nagrateid'];
    $selectedClass = $_POST['selectedClass'];

    foreach ($_POST['question'] as $qid => $score) {
        $tits = $_POST['tits'][$qid];


        if ($ftype == 'supervisor'){
            if ($selectOption == 'Supervisor' || $selectOption == 'Peer to Peer' || $selectOption == 'Self') {
                // Insert into rate_score_tbl
                $sql1 = "INSERT INTO rate_score_tbl (type, name, kind, course, term, sy, qid, tits, faculty, score, gnrateid, nagrateid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt1 = $conn->prepare($sql1);
    
                if ($stmt1) {
                    if ($selectOption == 'Self') {
                        $stmt1->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $fn, $score, $nagrateid, $nagrateid);
                    } else {
                        $stmt1->bind_param("sssssssssiii", $selectOption, $fn, $selectedClass, $course, $term, $schoolyear, $qid, $tits, $faculty_to_eval, $score, $gnrateid, $nagrateid);
                    }
    
                    $stmt1->execute();
                    $stmt1->close();
                } else {
                    // Handle SQL error
                    echo "SQL Error: " . $conn->error;
                }
    
                // Insert into rate_score_tbl2
                $sql2 = "INSERT INTO rate_score_tbl2 (type, name, kind, course, term, sy, qid, tits, faculty, score, gnrateid, nagrateid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt2 = $conn->prepare($sql2);
    
                if ($stmt2) {
                    if ($selectOption == 'Self') {
                        $stmt2->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $fn, $score, $nagrateid, $nagrateid);
                    } else {
                        $stmt2->bind_param("sssssssssiii", $selectOption, $fn, $selectedClass, $course, $term, $schoolyear, $qid, $tits, $faculty_to_eval, $score, $gnrateid, $nagrateid);
                    }
    
                    $stmt2->execute();
                    $stmt2->close();
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
      else{

        if ($selectOption == 'Supervisor' || $selectOption == 'Peer to Peer' || $selectOption == 'Self') {
            // Insert into rate_score_tbl
            $sql1 = "INSERT INTO rate_score_tbl (type, name, kind, course, term, sy, qid, tits, faculty, score, gnrateid, nagrateid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt1 = $conn->prepare($sql1);

            if ($stmt1) {
                if ($selectOption == 'Self') {
                    $stmt1->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $fn, $score, $nagrateid, $nagrateid);
                } else {
                    $stmt1->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $faculty_to_eval, $score, $gnrateid, $nagrateid);
                }

                $stmt1->execute();
                $stmt1->close();
            } else {
                // Handle SQL error
                echo "SQL Error: " . $conn->error;
            }

            // Insert into rate_score_tbl2
            $sql2 = "INSERT INTO rate_score_tbl2 (type, name, kind, course, term, sy, qid, tits, faculty, score, gnrateid, nagrateid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt2 = $conn->prepare($sql2);

            if ($stmt2) {
                if ($selectOption == 'Self') {
                    $stmt2->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $fn, $score, $nagrateid, $nagrateid);
                } else {
                    $stmt2->bind_param("sssssssssiii", $selectOption, $fn, $ftype, $course, $term, $schoolyear, $qid, $tits, $faculty_to_eval, $score, $gnrateid, $nagrateid);
                }

                $stmt2->execute();
                $stmt2->close();
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
    }
    
    // Optionally, you may redirect the user to a success page
    header("Location: ../_faculty/faculty.php");
    exit();
} else {
    // Handle invalid request method (e.g., someone accessing the page directly)
    echo "Invalid request method";
}
?>
