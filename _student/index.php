<?php include '../db/conn.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted

    // Get the form data
    $name = $_POST['name'];
    $course = $_POST['course'];
    $term = $_POST['term'];
    $schoolYear = $_POST['schoolyear'];
    $faculty = $_POST['faculty_to_eval'];
    $type = "STUDENT";
    

    // Loop through the submitted scores
    foreach ($_POST['question'] as $qid => $score) {
     
        $tits = $_POST['tits'][$qid];

     
        $insertSql = "INSERT INTO rate_score_tbl (type, name, course, term, sy, qid, faculty, score, tits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sssssssis", $type, $name, $course, $term, $schoolYear, $qid, $faculty, $score, $tits);
        $stmt->execute();
        $stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <link href="../dist/output.css" rel="stylesheet" />
    <title>TUP-V Evaluation</title>
</head>
<body class="bg-[#C51E3A]">
    <nav class="bg-white w-full h-[90px] flex justify-center items-center">
        <img class="w-[70px]" src="../images/Technological_University_of_the_Philippines_Seal.svg.png" alt="tupv-logo">
    </nav>
    <main class="flex justify-center">
        <div class="my-6 w-[632px] flex flex-col gap-4">
            <div class="rounded-lg px-8 py-4 bg-white">
                <h1 class="text-2xl font-medium">Evaluation Form</h1>
            </div>
            <form action="" method="post">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-4 rounded-lg p-8 bg-white">
                        <div class="text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 mb-2">
                            <h1 class="font-semibold text-[#C51E3A] uppercase">information</h1>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ab voluptatibus vero consequuntur sed qui vel? Illo error numquam, reprehenderit, dignissimos minus officiis voluptatem aspernatur facilis omnis, hic repellat nostrum.</p>
                        </div>
                        <div>
                            <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span class="text-[#C51E3A]">*</span></label>
                            <input type="text" name="name" placeholder="Name" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course <span class="text-[#C51E3A]">*</span></label>
                            <select id="course" name="course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled hidden value="">Choose Course</option>
                                <?php
                                    $sql = "SELECT * FROM courses_tbl";
                                    $stmt = $conn->prepare($sql);
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                    foreach ($courses as $index => $course):
                                ?>
                                    <option value="<?= $course['dept'] ?> - <?= $course['courseName'] ?>"><?= $course['dept'] ?> - <?= $course['courseName'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term <span class="text-[#C51E3A]">*</span></label>
                            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected disabled hidden value="">Choose Term</option>
                                <option value="Prelim">Prelim</option>
                                <option value="Midterm">Midterm</option>
                                <option value="Endterm">Endterm</option>
                            </select>
                        </div>
                        <div>
                            <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S.Y.</label>
                            <select id="schoolyear" name = 'schoolyear' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php 
                                $currentYear = date("Y");
                                $endYear = $currentYear + 25; // Assuming you want options up to 75 years in the future

                                for ($year = $currentYear; $year <= $endYear; $year++) {
                                    $nextYear = $year + 1;
                                    $schoolYear = $year . "-" . $nextYear;
                                    echo "<option value='$schoolYear' name = 'schoolyear'>$schoolYear</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="flex flex-col gap-4 rounded-lg p-8 bg-white">
                        <div>
                            <label for="faculty_to_eval" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Faculty to Evaluate <span class="text-[#C51E3A]">*</span></label>
                            <select id="faculty_to_eval" name="faculty_to_eval" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                                <!-- <option selected disabled hidden value="">Choose</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 rounded-lg p-8 bg-white">
                        <h1 class="text-2xl font-semibold">Form</h1>
                        <div>
                            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">I. Commitment</h5>
                            <?php
                                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 1'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }

                                foreach ($questions as $index => $question): 
                            ?>
                            <div class="flex">
                            <input type="hidden" name="tits[<?= $question['id'] ?>]" value="<?= $question['qid'] ?>">
                                <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                                
                                <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                            </div>

                            <div class="flex">
                            <?php 
                                for ($i = 1; $i <= 5; $i++): ?>
                                <div class="items-center flex mx-auto">
                                    <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                                    <br>
                                    <h1><?= $i ?></h1>
                                </div>
                            <?php 
                                endfor; ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div>
                            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">II. Knowledge of Subject</h5>
                            <?php
                                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 2'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }

                                foreach ($questions as $index => $question): 
                            ?>
                            <div class="flex">
                            <input type="hidden" name="tits[<?= $question['id'] ?>]" value="<?= $question['qid'] ?>">
   
                                <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                                
                                <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                            </div>

                            <div class="flex">
                            <?php 
                                for ($i = 1; $i <= 5; $i++): ?>
                                <div class="items-center flex mx-auto">
                                    <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                                    <br>
                                    <h1><?= $i ?></h1>
                                </div>
                            <?php 
                                endfor; ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div>
                            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">III. Teaching for independent learninig</h5>
                            <?php
                                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 3'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }

                                foreach ($questions as $index => $question): 
                            ?>
                            <div class="flex">
                            <input type="hidden" name="tits[<?= $question['id'] ?>]" value="<?= $question['qid'] ?>">
                                <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                                 
                                <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                            </div>

                            <div class="flex">
                            <?php 
                                for ($i = 1; $i <= 5; $i++): ?>
                                <div class="items-center flex mx-auto">
                                    <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                                    <br>
                                    <h1><?= $i ?></h1>
                                </div>
                            <?php 
                                endfor; ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div>
                            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">IV. Management of learninig</h5>
                            <?php
                                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 4'";
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }

                                foreach ($questions as $index => $question): 
                            ?>
                            <div class="flex">
                            <input type="hidden" name="tits[<?= $question['id'] ?>]" value="<?= $question['qid'] ?>">
                                <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                                 
                                <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                            </div>

                            <div class="flex">
                            <?php 
                                for ($i = 1; $i <= 5; $i++): ?>
                                <div class="items-center flex mx-auto">
                                    <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                                    <br>
                                    <h1><?= $i ?></h1>
                                </div>
                            <?php 
                                endfor; ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="ml-auto">
                            <button onclick="submitForm()" class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                SUBMIT FORM
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
    // Add event listener to the course dropdown
    var courseDropdown = document.getElementById('course');
    var facultyDropdown = document.getElementById('faculty_to_eval');

    // Initially disable the faculty dropdown
    facultyDropdown.disabled = true;
    facultyDropdown.innerHTML = '<option selected disabled hidden value="">Choose course first</option>';

    courseDropdown.addEventListener('change', function() {
        // Get the selected course value
        var selectedCourse = this.value;

        if (selectedCourse === '') {
            // If no course is selected, disable the faculty dropdown
            facultyDropdown.innerHTML = '<option selected disabled hidden value="">Choose course first</option>';
            facultyDropdown.disabled = true;
        } else {
            // Make an AJAX request to fetch faculty members based on the selected course
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Parse the JSON response
                    var facultyOptions = JSON.parse(this.responseText);

                    // Update the faculty member dropdown options
                    facultyDropdown.innerHTML = '<option selected disabled hidden value="">Choose</option>';
                    for (var i = 0; i < facultyOptions.length; i++) {
                        facultyDropdown.innerHTML += '<option value="' + facultyOptions[i].value + '">' + facultyOptions[i].text + '</option>';
                    }

                    // Enable the faculty dropdown
                    facultyDropdown.disabled = false;
                }
            };

            // Send the AJAX request with the correct path
            xhttp.open('GET', '../php/get_faculty_options.php?course=' + selectedCourse, true);
            xhttp.send();
        }
    });
</script>
</body>
</html>