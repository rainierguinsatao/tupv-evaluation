<?php
    include '../db/conn.php';

    if (isset($_GET['sy'])) {
        $selectedSy = mysqli_real_escape_string($conn, $_GET['sy']);

        $sql = "SELECT * FROM froms_tbl WHERE sy = '$selectedSy'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $count = 1;
            echo '<div class="flex flex-col">';
            foreach ($questions as $question) {
                echo '<div class="flex">';
                echo '<span class="m-4 text-gray-600">' . $count . '.)</span>';
                echo '<input type="text" name="question[' . $question['id'] . ']" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="' . $question['question'] . '">';
                echo '</div>';
                $count++;
            }
            echo '</div>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
