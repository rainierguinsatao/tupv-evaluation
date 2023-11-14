<?php 
    include '../php/session_admin.php';
    include '../db/conn.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/print.css">
    <title>EVALUATION | DASHBOARD</title>
</head>
<body>
<div class="print-hide">
<?php
include './adminheader.php';
?>
</div>
<div class="sm:ml-64 mt-14 print-hide">
    <div class="w-full">
        <div class="border-b p-4 print-hide">
            <h1 class="text-2xl font-bold">Comments Sheet</h1>
        </div>
        <div class="p-4">
            <form id="comments_evaluate-form" action="./comments_evaluation.php" method="post" class="print-hide">
                <div class="p-6 border rounded-lg flex gap-4">
                    <div>
                        <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term <span class="text-[#C51E3A]">*</span></label>
                        <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option selected disabled hidden value="">Choose Term</option>
                        <?php
                                $sql = "SELECT DISTINCT term FROM rate_score_tbl";
                                $stmt = $conn->prepare($sql);
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                foreach ($courses as $index => $course):
                            ?>
                        <option value="<?= $course['term'] ?>"><?= $course['term'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S.Y.</label>
                        <select id="schoolyear" name ='schoolyear' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected disabled hidden value="">Choose S.Y.</option>
                        <?php
                                $sql = "SELECT DISTINCT sy FROM rate_score_tbl";
                                $stmt = $conn->prepare($sql);
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                foreach ($courses as $index => $course):
                            ?>
                        <option value="<?= $course['sy'] ?>"><?= $course['sy'] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course <span class="text-[#C51E3A]">*</span></label>
                        <select id="course" name="course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected disabled hidden value="">Choose Course</option>
                            <?php
                                $sql = "SELECT DISTINCT course FROM rate_score_tbl";
                                $stmt = $conn->prepare($sql);
                                $result = mysqli_query($conn, $sql);

                                if ($result) {
                                    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                foreach ($courses as $index => $course):
                            ?>
                                <option value="<?= $course['course'] ?>"><?= $course['course'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="">
                        <div>
                            <label for="faculty_to_eval" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Faculty to Evaluate <span class="text-[#C51E3A]">*</span></label>
                            <select id="faculty_to_eval" name="faculty_to_eval" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled required>

                            </select>
                        </div>
                    </div>
                    <button type="submit" name="evaluate" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Evaluate</button>
                </div>
            </form>
            <div class="print-hide p-4 border my-2">   
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluate'])) {
                        // Your existing code for processing the form
                    
                        $terms = isset($_POST['term']) ? $_POST['term'] : "";
                        $schoolyear = isset($_POST['schoolyear']) ? $_POST['schoolyear'] : "";
                        $course = isset($_POST['course']) ? $_POST['course'] : "";
                        $faculty_to_eval = isset($_POST['faculty_to_eval']) ? $_POST['faculty_to_eval'] : "";

                        $sql = "SELECT DISTINCT comms, name FROM `rate_score_tbl` WHERE term LIKE '$terms' AND sy LIKE '$schoolyear' AND course LIKE '$course' AND faculty LIKE '$faculty_to_eval' AND comms != ''";
                        
                        $stmt = $conn->prepare($sql);
                        $result = mysqli_query($conn, $sql); 

                        if ($result) {
                            $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                        ?> 
                        <header class="mb-6 flex flex-col gap-4">
                            <div class="flex flex-col items-center text-center">
                                <div>
                                    <h1 class="font-bold">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES VISAYAS</h1>
                                    <h2 class="font-bold">City of Talisay, Negros Occidental</h2>
                                    <h3>Qualitative Contribution Evaluation (QCE) for Faculty</h3>
                                    <h1 class="font-bold">PERFORMANCE RATING SHEET</h1>


                                    <div class="border-4 border-black px-2">
                                        <h2 class="font-bold"><?= $terms ?> School Year <?= $schoolyear ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="flex gap-2 w-3/4">
                                    <div>
                                        <h1 class="font-bold text-end">
                                            Name of Faculty:
                                        </h1>
                                    </div>
                                    <div class="grow border-b-2 border-black">
                                        <h1><?= $faculty_to_eval ?></h1>
                                    </div>
                                </div>
                                <div class="flex gap-2 w-3/4">
                                    <div>
                                        <h1 class="font-bold text-end">
                                            Department:
                                        </h1>
                                    </div>
                                    <div class="grow border-b-2 border-black">
                                        <h1><?= $course ?></h1>
                                    </div>
                                </div>
                            </div>
                        </header>  
                        <div data-dial-init class="fixed end-6 bottom-6 group">
                            <button id="print-btn" type="button" data-dial-toggle="speed-dial-menu-square" aria-controls="speed-dial-menu-square" aria-expanded="false" class="flex items-center justify-center text-white bg-red-700 rounded-lg w-14 h-14 hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 focus:ring-4 focus:ring-red-300 focus:outline-none dark:focus:ring-red-800">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
                                    <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
                                </svg>
                                <span class="sr-only">Open actions menu</span>
                            </button>
                        </div>
                        <?php
                        $i = 1; // Initialize $i before the loop
                        foreach ($accounts as $index => $acc):
                    ?>            
                        <h1><span class="mr-4 print-hide mb-10"><span class = "text-md font-bold text-dark">NAME:</span> <?= $acc['name']?></h1>
                        <h1><span class="mr-4"><?php echo $i ?>.</span><?= $acc['comms']?></h1>
                        
                    <?php 
                    $i++; // Increment $i inside the loop
                    endforeach;
                    } else {
                        echo "<h1 class='text-center'>Fill up the Form above.</h1>";
                    }
                ?>        
                
            </div>
        </div>
    </div>                   
</div>
<div id="tally-sheet" class="text-sm hidden">   
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluate'])) {
            // Your existing code for processing the form
        
            $terms = isset($_POST['term']) ? $_POST['term'] : "";
            $schoolyear = isset($_POST['schoolyear']) ? $_POST['schoolyear'] : "";
            $course = isset($_POST['course']) ? $_POST['course'] : "";
            $faculty_to_eval = isset($_POST['faculty_to_eval']) ? $_POST['faculty_to_eval'] : "";

            $sql = "SELECT DISTINCT comms FROM `rate_score_tbl` WHERE term LIKE '$terms' AND sy LIKE '$schoolyear' AND course LIKE '$course' AND faculty LIKE '$faculty_to_eval' AND comms != ''";
            
            $stmt = $conn->prepare($sql);
            $result = mysqli_query($conn, $sql); 

            if ($result) {
                $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?> 
            <header class="mb-6 flex flex-col gap-4">
                <div class="flex flex-col items-center text-center">
                    <div>
                        <h1 class="font-bold">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES VISAYAS</h1>
                        <h2 class="font-bold">City of Talisay, Negros Occidental</h2>
                        <h3>Qualitative Contribution Evaluation (QCE) for Faculty</h3>
                        <h1 class="font-bold">PERFORMANCE RATING SHEET</h1>


                        <div class="border-4 border-black px-2">
                            <h2 class="font-bold"><?= $terms ?> School Year <?= $schoolyear ?></h2>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex gap-2">
                        <div>
                            <h1 class="font-bold text-end">
                                Name of Faculty:
                            </h1>
                        </div>
                        <div class="grow border-b-2 border-black">
                            <h1><?= $faculty_to_eval ?></h1>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div>
                            <h1 class="font-bold text-end">
                                Department:
                            </h1>
                        </div>
                        <div class="grow border-b-2 border-black">
                            <h1><?= $course ?></h1>
                        </div>
                    </div>
                </div>
            </header>  
            <?php
            $i = 1; // Initialize $i before the loop
            
            foreach ($accounts as $index => $acc):
        ?>       

        
                 
            <h1><span class="mr-4"><?php echo $i ?>.</span><?= $acc['comms']?></h1>
        <?php 
        $i++; // Increment $i inside the loop
        endforeach;
        } else {
            echo "<h1 class='text-center'>Fill up the Form above.</h1>";
        }
    ?>        
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
    document.getElementById('print-btn').addEventListener('click', function () {
        // Trigger the print action
        window.print();
    });
</script>
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