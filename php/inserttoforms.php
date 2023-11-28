<?php
include '../db/conn.php';





    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['updategeneral']) || isset($_POST['updateself'])  ) {
    foreach ($_POST['question'] as $id => $question) {
        // Use a prepared statement to handle special characters
        $stmt = $conn->prepare("UPDATE froms_tbl SET question=? WHERE id=?");
        
        // Bind parameters
        $stmt->bind_param("si", $question, $id);
        
        // Execute the statement
        if (!$stmt->execute()) {
            echo "Error updating record: " . $stmt->error;
        } else {
            header ('Location: ../_admin/forms.php');
    }

        // Close the statement
        $stmt->close();
    }
}
}






if (isset($_POST['deltg1btn'])) {
    $id = $_POST['deltg1btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}






if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tg1btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newtg1'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 1";
        $general = "GENERAL";
        $qid = "TG1";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}




// tg 2



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tg2btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newtg2'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 2";
        $general = "GENERAL";
        $qid = "TG2";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['deltg2btn'])) {
    $id = $_POST['deltg2btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}









// tg 3



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tg3btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newtg3'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 3";
        $general = "GENERAL";
        $qid = "TG3";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['deltg3btn'])) {
    $id = $_POST['deltg3btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}





// tg 4



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tg4btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newtg4'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 4";
        $general = "GENERAL";
        $qid = "TG4";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['deltg4btn'])) {
    $id = $_POST['deltg4btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}






// ts 1



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ts1btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newts1'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 1";
        $general = "SELF";
        $qid = "TS1";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['delts1btn'])) {
    $id = $_POST['delts1btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}






// ts 2



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ts2btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newts2'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 2";
        $general = "SELF";
        $qid = "TS2";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['delts2btn'])) {
    $id = $_POST['delts2btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}





// ts 3



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ts3btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newts3'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 3";
        $general = "SELF";
        $qid = "TS3";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['delts3btn'])) {
    $id = $_POST['delts3btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}






// ts 4



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ts4btn'])) { // Check if the button with name 'tg1btn' was clicked
        $newtg1 = $_POST['newts4'];

        // Assuming your table is named 'forms_tbl'
        $title = "TITLE 4";
        $general = "SELF";
        $qid = "TS4";

        try {

            $pdo = new PDO("mysql:host=$server;dbname=$db", $username, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO froms_tbl (question, title, type, qid) VALUES (:question, :title, :type, :qid)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':question', $newtg1);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':type', $general);
            $stmt->bindParam(':qid', $qid);

            // Execute the prepared statement
            $stmt->execute();

            header ('Location: ../_admin/forms.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close the database connection
        $pdo = null;
    }
}


if (isset($_POST['delts4btn'])) {
    $id = $_POST['delts4btn'];

    // Use a prepared statement to handle special characters
    $stmt = $conn->prepare("DELETE FROM froms_tbl WHERE id=?");

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if (!$stmt->execute()) {
        echo "Error deleting record: " . $stmt->error;
    } else {
        header('Location: ../_admin/forms.php');
    }

    // Close the statement
    $stmt->close();
}





?>