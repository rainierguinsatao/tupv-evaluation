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
            <h1 class="text-2xl font-bold">Evaluation</h1>
        </div>
        <div class=" p-4">
            <form id="evaluate-form" action="./evaluation.php" method="post" class="print-hide">
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
            <div class="print-hide">                      
                <div class="w-full flex flex-col gap-4 p-4 border my-2">
                    <?php 
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluate'])) {
                            // Your existing code for processing the form
                        
                            $terms = isset($_POST['term']) ? $_POST['term'] : "";
                            $schoolyear = isset($_POST['schoolyear']) ? $_POST['schoolyear'] : "";
                            $course = isset($_POST['course']) ? $_POST['course'] : "";
                            $faculty_to_eval = isset($_POST['faculty_to_eval']) ? $_POST['faculty_to_eval'] : "";

                            // Split the course into department and course
                            list($dept, $courseFinal) = explode(' - ', $course, 2);

                            // Output for testing
                            '$dept: ' . $dept . '<br>';
                            '$courseFinal: ' . $courseFinal;

                            // Split the string into parts
                            $parts = explode(', ', $faculty_to_eval);

                            // Assign values to variables
                            $faculty_to_eval_lname = $parts[0];
                            $faculty_to_eval_fname_mi = isset($parts[1]) ? $parts[1] : '';

                            // Split the first_name_mi into first_name and mi
                            $names = explode(' ', $faculty_to_eval_fname_mi);
                            $faculty_to_eval_fname = implode(' ', array_slice($names, 0, -1));
                            $faculty_to_eval_mi = end($names);

                            // Output for testing
                            '$faculty_to_eval_lname: ' . $faculty_to_eval_lname . '<br>';
                            '$faculty_to_eval_fname: ' . $faculty_to_eval_fname . '<br>';
                            '$faculty_to_eval_mi: ' . $faculty_to_eval_mi;

                            $sql = "SELECT `rate_score_tbl`.`type` AS formType, 
                            `rate_score_tbl`.*, 
                            `accounts`.* FROM `rate_score_tbl`
                            INNER JOIN `accounts` ON `accounts`.`id` = `rate_score_tbl`.`gnrateid`
                            WHERE `rate_score_tbl`.`term` LIKE '$terms' AND `rate_score_tbl`.`sy` LIKE '$schoolyear' AND `rate_score_tbl`.`course` LIKE '$course' AND `accounts`.`first_name` LIKE '$faculty_to_eval_fname' AND `accounts`.`last_name` LIKE '$faculty_to_eval_lname' AND `accounts`.`mi` LIKE '$faculty_to_eval_mi';";

                            

                            $stmt = $conn->prepare($sql);
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                $scores = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                // Filter the results based on the 'type' column
                                $filterstudent = array_filter($scores, function($score) {
                                    return $score['kind'] == 'student';
                                });

                                $filterpeer2peer = array_filter($scores, function($score) {
                                    return $score['kind'] == 'faculty';
                                });

                                $filtersupervisor = array_filter($scores, function($score) {
                                    return $score['kind'] == 'supervisor';
                                });

                                $filterself = array_filter($scores, function($score) {
                                    return $score['formType'] == 'Self';
                                   ;
                                });

                                
                    ?>                        
                    <header class="mb-6 flex flex-col gap-4">
                        <div class="flex flex-col items-center text-center">
                            <div>
                                <h1 class="font-bold">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES VISAYAS</h1>
                                <h2 class="font-bold">City of Talisay, Negros Occidental</h2>
                                <h3>Qualitative Contribution Evaluation (QCE) for Faculty</h3>
                                <h1 class="font-bold">PERFORMANCE RATING SHEET</h1>


                                <div class="border-4 border-black px-2">
                                    <h2 class="font-bold">
                                    <?php
                                        echo $terms;
                                        ?> 
                                        School Year 
                                        <?= $schoolyear ?>
                                    </h2>
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


                    <section>

                                    



                        <!-- LEGEND -->
                        <div class="grid grid-cols-10 text-sm px-4 gap-2">
                            <div class="col-span-4">
                            </div>
                            <div class="col-span-1">
                                <h1 class="font-semibold">Average</h1>
                            </div>
                            <div class="col-span-1">
                                <h1 class="font-semibold">2x Average</h1>
                            </div>
                            <div class="col-span-1">
                                <h1 class="font-semibold">Weight</h1>
                            </div>
                            <div class="col-span-1">
                                <h1 class="font-semibold">Weighted Average</h1>
                            </div>
                            <div class="col-span-1">
                                <h1 class="font-semibold">Level Weight</h1>
                            </div>
                            <div class="col-span-1">
                                <h1 class="font-semibold">Level Weight Average</h1>
                            </div>
                        </div>

                        <!-- STUDENT EVALUATION -->
                        <div class="w-full border-y-2 border-black">
                            <h1 class="font-semibold text-base">I. STUDENT EVALUATION</h1>
                        </div>



                        <!-- ROW A -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>A. Commitment</h2>
                            </div>


                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAve = 0;
                                    $countAve = 0;
                                    $averageAve = 0;
                                    // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                                    foreach ($filterstudent as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG1') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAve += $scoreAve['score'];
                                            $countAve++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAve > 0) {
                                        $averageAve = $sumAve / $countAve;
                                        echo number_format($averageAve, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                    <?php echo number_format($averageAve *2, 4)?>
                                </h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAve * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>



                        <!-- ROW B -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>B. Knowledge of Subject</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAve2 = 0;
                                    $countAve2 = 0;
                                    $averageAve2 = 0;
                                    // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                                    foreach ($filterstudent as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG2') {
                                            // Accumulate the scoreTG2 for average calculation
                                            $sumAve2 += $scoreAve['score'];
                                            $countAve2++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAve2 > 0) {
                                        $averageAve2 = $sumAve2 / $countAve2;
                                        echo number_format($averageAve2, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAve2 *2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAve2 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW C -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>C. Teaching of Individual Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAve3 = 0;
                                    $countAve3 = 0;
                                    $averageAve3 = 0;
                                    // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                                    foreach ($filterstudent as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG3') {
                                            // Accumulate the scoreTG3 for average calculation
                                            $sumAve3 += $scoreAve['score'];
                                            $countAve3++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAve3 > 0) {
                                        $averageAve3 = $sumAve3 / $countAve3;
                                        echo number_format($averageAve3, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAve3 *2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAve3 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW D -->
                        <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                            <div class="col-span-4">
                                <h2>D. Management Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAve4 = 0;
                                    $countAve4 = 0;
                                    $averageAve4 = 0;
                                    // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                                    foreach ($filterstudent as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG4') {
                                            // Accumulate the scoreTG4 for average calculation
                                            $sumAve4 += $scoreAve['score'];
                                            $countAve4++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAve4 > 0) {
                                        $averageAve4 = $sumAve4 / $countAve4;
                                        echo number_format($averageAve4, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAve4 *2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAve4 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- TOTAL: -->
                        <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                            <div class="col-span-4 text-end">
                                <h2 class="">TOTAL:</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                    <?php 
                                    $ave = $averageAve + $averageAve2 + $averageAve3 + $averageAve4;
                                    
                                    echo number_format($ave / 4, 4);
                                    ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                    <?php 
                                    $ave2 = (($averageAve * 2) * 0.25) + (($averageAve2 * 2) * 0.25) + (($averageAve3 * 2) * 0.25) + (($averageAve4 * 2) * 0.25) ;
                                    
                                    echo number_format($ave2, 4);
                                    ?>
                                </h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class="">0.3000</h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                    <?php 
                                    echo number_format($ave2 * 0.3, 4)
                                    ?>
                                </h1>
                            </div>
                        </div>


                    </section>


                    <section>

                        <!-- PEER EVALUATION -->
                        <div class="w-full border-y-2 border-black">
                            <h1 class="font-semibold text-base">II. PEER EVALUATION</h1>
                        </div>


                        <!-- ROW A -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>A. Commitment</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAvep2p = 0;
                                    $countAvep2p = 0;
                                    $averageAvep2p = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterpeer2peer as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG1') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAvep2p += $scoreAve['score'];
                                            $countAvep2p++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAvep2p > 0) {
                                        $averageAvep2p = $sumAvep2p / $countAvep2p;
                                        echo number_format($averageAvep2p, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAvep2p * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAvep2p * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW B -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>B. Knowledge of Subject</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAvep2p2 = 0;
                                    $countAvep2p2 = 0;
                                    $averageAvep2p2 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterpeer2peer as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG2') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAvep2p2 += $scoreAve['score'];
                                            $countAvep2p2++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAvep2p2 > 0) {
                                        $averageAvep2p2 = $sumAvep2p2 / $countAvep2p2;
                                        echo number_format($averageAvep2p2, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAvep2p2 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAvep2p2 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW C -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>C. Teaching of Individual Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAvep2p3 = 0;
                                    $countAvep2p3 = 0;
                                    $averageAvep2p3 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterpeer2peer as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG3') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAvep2p3 += $scoreAve['score'];
                                            $countAvep2p3++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAvep2p3 > 0) {
                                        $averageAvep2p3 = $sumAvep2p3 / $countAvep2p3;
                                        echo number_format($averageAvep2p3, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAvep2p3 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAvep2p3 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW D -->
                        <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                            <div class="col-span-4">
                                <h2>D. Management Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAvep2p4 = 0;
                                    $countAvep2p4 = 0;
                                    $averageAvep2p4 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterpeer2peer as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG4') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAvep2p4 += $scoreAve['score'];
                                            $countAvep2p4++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAvep2p4 > 0) {
                                        $averageAvep2p4 = $sumAvep2p4 / $countAvep2p4;
                                        echo number_format($averageAvep2p4, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAvep2p4 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAvep2p4 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- TOTAL: -->
                        <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                            <div class="col-span-4 text-end">
                                <h2 class="">TOTAL:</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    $avep2p = $averageAvep2p + $averageAvep2p2 + $averageAvep2p3 + $averageAvep2p4;
                                    
                                    echo number_format($avep2p / 4, 4);
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    $ave2p2p = (($averageAvep2p * 2) * 0.25) + (($averageAvep2p2 * 2) * 0.25) + (($averageAvep2p3 * 2) * 0.25) + (($averageAvep2p4 * 2) * 0.25) ;
                                    
                                    echo number_format($ave2p2p, 4);
                                ?>
                                </h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class="">0.2000</h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    echo number_format($ave2p2p * 0.2, 4)
                                ?>
                                </h1>
                            </div>
                        </div>
                    </section>


                    <section>
                        <!-- SUPERVISOR EVALUATION -->
                        <div class="w-full border-y-2 border-black">
                            <h1 class="font-semibold text-base">III. SUPERVISOR EVALUATION</h1>
                        </div>


                        <!-- ROW A -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>A. Commitment</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSup = 0;
                                    $countAveSup = 0;
                                    $averageAveSup = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filtersupervisor as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG1') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSup += $scoreAve['score'];
                                            $countAveSup++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSup > 0) {
                                        $averageAveSup = $sumAveSup / $countAveSup;
                                        echo number_format($averageAveSup, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSup * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSup * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW B -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>B. Knowledge of Subject</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSup2 = 0;
                                    $countAveSup2 = 0;
                                    $averageAveSup2 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filtersupervisor as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG2') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSup2 += $scoreAve['score'];
                                            $countAveSup2++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSup2 > 0) {
                                        $averageAveSup2 = $sumAveSup2 / $countAveSup2;
                                        echo number_format($averageAveSup2, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSup2 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSup2 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW C -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>C. Teaching of Individual Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSup3 = 0;
                                    $countAveSup3 = 0;
                                    $averageAveSup3 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filtersupervisor as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG3') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSup3 += $scoreAve['score'];
                                            $countAveSup3++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSup3 > 0) {
                                        $averageAveSup3 = $sumAveSup3 / $countAveSup3;
                                        echo number_format($averageAveSup3, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSup3 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSup3 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW D -->
                        <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                            <div class="col-span-4">
                                <h2>D. Management Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSup4 = 0;
                                    $countAveSup4 = 0;
                                    $averageAveSup4 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filtersupervisor as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TG4') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSup4 += $scoreAve['score'];
                                            $countAveSup4++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSup4 > 0) {
                                        $averageAveSup4 = $sumAveSup4 / $countAveSup4;
                                        echo number_format($averageAveSup4, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSup4 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSup4 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- TOTAL: -->
                        <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                            <div class="col-span-4 text-end">
                                <h2 class="">TOTAL:</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    $aveSup = $averageAveSup + $averageAveSup2 + $averageAveSup3 + $averageAveSup4;
                                    
                                    echo number_format($aveSup / 4, 4);
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    $ave2Sup = (($averageAveSup * 2) * 0.25) + (($averageAveSup2 * 2) * 0.25) + (($averageAveSup3 * 2) * 0.25) + (($averageAveSup4 * 2) * 0.25) ;
                                    
                                    echo number_format($ave2Sup, 4);
                                ?>
                                </h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class="">0.3000</h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    echo number_format($ave2Sup * 0.3, 4)
                                ?>
                                </h1>
                            </div>
                        </div>
                    </section>


                    <section>
                        <!-- SELF EVALUATION -->
                        <div class="w-full border-y-2 border-black">
                            <h1 class="font-semibold text-base">IV. SELF EVALUATION</h1>
                        </div>


                        <!-- ROW A -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>A. Commitment</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSelf = 0;
                                    $countAveSelf = 0;
                                    $averageAveSelf = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterself as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TS1') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSelf += $scoreAve['score'];
                                            $countAveSelf++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSelf > 0) {
                                        $averageAveSelf = $sumAveSelf / $countAveSelf;
                                        echo number_format($averageAveSelf, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSelf * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSelf * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW B -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>B. Knowledge of Subject</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSelf2 = 0;
                                    $countAveSelf2 = 0;
                                    $averageAveSelf2 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterself as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TS2') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSelf2 += $scoreAve['score'];
                                            $countAveSelf2++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSelf2 > 0) {
                                        $averageAveSelf2 = $sumAveSelf2 / $countAveSelf2;
                                        echo number_format($averageAveSelf2, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSelf2 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSelf2 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW C -->
                        <div class="grid grid-cols-10 px-4 gap-2">
                            <div class="col-span-4">
                                <h2>C. Teaching of Individual Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSelf3 = 0;
                                    $countAveSelf3 = 0;
                                    $averageAveSelf3 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterself as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TS3') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSelf3 += $scoreAve['score'];
                                            $countAveSelf3++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSelf3 > 0) {
                                        $averageAveSelf3 = $sumAveSelf3 / $countAveSelf3;
                                        echo number_format($averageAveSelf3, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSelf3 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSelf3 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- ROW D -->
                        <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                            <div class="col-span-4">
                                <h2>D. Management Learning</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    // Initialize variables for average calculation
                                    $sumAveSelf4 = 0;
                                    $countAveSelf4 = 0;
                                    $averageAveSelf4 = 0;
                                    // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                                    foreach ($filterself as $index => $scoreAve) {
                                        if ($scoreAve['tits'] == 'TS4') {
                                            // Accumulate the scoreTG1 for average calculation
                                            $sumAveSelf4 += $scoreAve['score'];
                                            $countAveSelf4++;
                                        }
                                    }
                                    // Calculate the average
                                    if ($countAveSelf4 > 0) {
                                        $averageAveSelf4 = $sumAveSelf4 / $countAveSelf4;
                                        echo number_format($averageAveSelf4, 4);
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format($averageAveSelf4 * 2, 4)?></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class="">0.2500</h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""><?php echo number_format(($averageAveSelf4 * 2) * 0.25, 4)?></h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                        </div>


                        <!-- TOTAL: -->
                        <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                            <div class="col-span-4 text-end">
                                <h2 class="">TOTAL:</h2>
                            </div>
                            <!-- AVERAGE -->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    $aveSelf = $averageAveSelf + $averageAveSelf2 + $averageAveSelf3 + $averageAveSelf4;
                                    
                                    echo number_format($aveSelf / 4, 4);
                                ?>
                                </h1>
                            </div>
                            <!-- 2X AVERAGE -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT -->
                            <div class="col-span-1">
                                <h1 class=""></h1>
                            </div>
                            <!-- WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    $ave2Self = (($averageAveSelf * 2) * 0.25) + (($averageAveSelf2 * 2) * 0.25) + (($averageAveSelf3 * 2) * 0.25) + (($averageAveSelf4 * 2) * 0.25) ;
                                    
                                    echo number_format($ave2Self, 4);
                                ?>
                                </h1>
                            </div>
                            <!-- LEVEL WEIGHT-->
                            <div class="col-span-1">
                                <h1 class="">0.2000</h1>
                            </div>
                            <!-- LEVEL WEIGHT AVERAGE-->
                            <div class="col-span-1">
                                <h1 class="">
                                <?php 
                                    echo number_format($ave2Self * 0.2, 4)
                                ?>
                                </h1>
                            </div>
                        </div>
                    </section>


                    <!-- DALOM -->     
                    <footer class="w-full">

                        <div class="border-t-2 border-black py-4">
                            <!-- RATING -->
                            <div class="flex justify-end font-bold">
                                <div class="flex items-center gap-2">
                                    <h1>Rating:</h1>
                                    <div class="border-4 border-black px-4">
                                    <?php 
                                        
                                        $rating = ($ave2 * 0.3) + ($ave2p2p * 0.2) + ($ave2Sup * 0.3) + ($ave2Self * 0.2);
                                        echo number_format($rating, 4);

                                    ?>      
                                    </div>
                                </div>
                            </div>
                            
                            <!-- DESCRIPTIVE EQUIVALENT -->  
                            <div class="flex flex-col items-center gap-2">
                            <?php
                                function getDescriptiveEquivalent($numericRating) {
                                    switch (true) {
                                        case $numericRating >= 9.3:
                                            return "Outstanding (O)";
                                        case $numericRating >= 7.5:
                                            return "Very Satisfactory (VS)";
                                        case $numericRating >= 4.7:
                                            return "Satisfactory (S)";
                                        case $numericRating >= 2.7:
                                            return "Fair (F)";
                                        case $numericRating >= 2.0:
                                            return "Needs Improvement (NI)";
                                        default:
                                            return "Invalid Rating";
                                    }
                                }

                                // Example usage: // Replace this with the actual numeric rating
                                $descriptiveEquivalent = getDescriptiveEquivalent($rating);

                                
                                ?>

                                <div class="flex items-center gap-2 font-bold">
                                    <h1>DESCRIPTIVE EQUIVALENT:</h1>
                                    <div class="border-4 border-black px-10">
                                        <?= $descriptiveEquivalent; ?>
                                    </div>
                                </div>

                                <div class="border-4 border-black p-2">
                                    <h1 class="font-bold">Descriptive Equivalent of Numerical Ratings:</h1>
                                    <div class="grid grid-cols-5 px-4 gap-x-4">
                                        <div class="col-span-2">9.300 - above</div><div class="col-span-3">- Outstanding (O)</div>
                                        <div class="col-span-2">7.500 - 9.299</div><div class="col-span-3">- Very Satisfactory (VS)</div>
                                        <div class="col-span-2">4.700 - 7.499</div><div class="col-span-3">- Satisfactory (S)</div>
                                        <div class="col-span-2">2.700 - 4.699</div><div class="col-span-3">- Fair (F)</div>
                                        <div class="col-span-2">2.000 - 2.699</div><div class="col-span-3">- Needs Improvement (NI)</div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        
                    </footer>
                    
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
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        } else {
                            echo "<h1 class='text-center'>Fill up the Form above.</h1>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tally-sheet" class="hidden">                      
    <div class="w-full flex flex-col gap-4 text-xs">
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluate'])) {
            // Your existing code for processing the form
        
            $terms = isset($_POST['term']) ? $_POST['term'] : "";
            $schoolyear = isset($_POST['schoolyear']) ? $_POST['schoolyear'] : "";
            $course = isset($_POST['course']) ? $_POST['course'] : "";
            $faculty_to_eval = isset($_POST['faculty_to_eval']) ? $_POST['faculty_to_eval'] : "";

            // Split the course into department and course
            list($dept, $courseFinal) = explode(' - ', $course, 2);

            // Output for testing
            '$dept: ' . $dept . '<br>';
            '$courseFinal: ' . $courseFinal;

            // Split the string into parts
            $parts = explode(', ', $faculty_to_eval);

            // Assign values to variables
            $faculty_to_eval_lname = $parts[0];
            $faculty_to_eval_fname_mi = isset($parts[1]) ? $parts[1] : '';

            // Split the first_name_mi into first_name and mi
            $names = explode(' ', $faculty_to_eval_fname_mi);
            $faculty_to_eval_fname = implode(' ', array_slice($names, 0, -1));
            $faculty_to_eval_mi = end($names);

            // Output for testing
            '$faculty_to_eval_lname: ' . $faculty_to_eval_lname . '<br>';
            '$faculty_to_eval_fname: ' . $faculty_to_eval_fname . '<br>';
            '$faculty_to_eval_mi: ' . $faculty_to_eval_mi;

            $sql = "SELECT `rate_score_tbl`.`type` AS formType, 
            `rate_score_tbl`.*, 
            `accounts`.* FROM `rate_score_tbl`
            INNER JOIN `accounts` ON `accounts`.`id` = `rate_score_tbl`.`gnrateid`
            WHERE `rate_score_tbl`.`term` LIKE '$terms' AND `rate_score_tbl`.`sy` LIKE '$schoolyear' AND `rate_score_tbl`.`course` LIKE '$course' AND `accounts`.`first_name` LIKE '$faculty_to_eval_fname' AND `accounts`.`last_name` LIKE '$faculty_to_eval_lname' AND `accounts`.`mi` LIKE '$faculty_to_eval_mi';";

            

            $stmt = $conn->prepare($sql);
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $scores = mysqli_fetch_all($result, MYSQLI_ASSOC);
                // Filter the results based on the 'type' column
                $filterstudent = array_filter($scores, function($score) {
                    return $score['kind'] == 'student';
                });

                $filterpeer2peer = array_filter($scores, function($score) {
                    return $score['kind'] == 'faculty';
                });

                $filtersupervisor = array_filter($scores, function($score) {
                    return $score['kind'] == 'supervisor';
                });

                $filterself = array_filter($scores, function($score) {
                    return $score['formType'] == 'Self';
                    ;
                });
                

                
    ?>                           
        <header class="mb-6 flex flex-col gap-4">
            <div class="flex flex-col items-center text-center">
                <div>
                    <h1 class="font-bold">TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES VISAYAS</h1>
                    <h2 class="font-bold">City of Talisay, Negros Occidental</h2>
                    <h3>Qualitative Contribution Evaluation (QCE) for Faculty</h3>
                    <h1 class="font-bold">PERFORMANCE RATING SHEET</h1>


                    <div class="border-4 border-black px-2">
                        <h2 class="font-bold">
                            <?php
                            echo $terms;
                            ?>
                            School Year 
                            <?= $schoolyear ?></h2>
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


        <section>

                        



            <!-- LEGEND -->
            <div class="grid grid-cols-10 text-sm px-4 gap-2">
                <div class="col-span-4">
                </div>
                <div class="col-span-1">
                    <h1 class="font-semibold">Average</h1>
                </div>
                <div class="col-span-1">
                    <h1 class="font-semibold">2x Average</h1>
                </div>
                <div class="col-span-1">
                    <h1 class="font-semibold">Weight</h1>
                </div>
                <div class="col-span-1">
                    <h1 class="font-semibold">Weighted Average</h1>
                </div>
                <div class="col-span-1">
                    <h1 class="font-semibold">Level Weight</h1>
                </div>
                <div class="col-span-1">
                    <h1 class="font-semibold">Level Weight Average</h1>
                </div>
            </div>

            <!-- STUDENT EVALUATION -->
            <div class="w-full border-y-2 border-black">
                <h1 class="font-semibold text-base">I. STUDENT EVALUATION</h1>
            </div>



            <!-- ROW A -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>A. Commitment</h2>
                </div>


                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAve = 0;
                        $countAve = 0;
                        $averageAve = 0;
                        // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                        foreach ($filterstudent as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG1') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAve += $scoreAve['score'];
                                $countAve++;
                            }
                        }
                        // Calculate the average
                        if ($countAve > 0) {
                            $averageAve = $sumAve / $countAve;
                            echo number_format($averageAve, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                        <?php echo number_format($averageAve *2, 4)?>
                    </h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAve * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>



            <!-- ROW B -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>B. Knowledge of Subject</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAve2 = 0;
                        $countAve2 = 0;
                        $averageAve2 = 0;
                        // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                        foreach ($filterstudent as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG2') {
                                // Accumulate the scoreTG2 for average calculation
                                $sumAve2 += $scoreAve['score'];
                                $countAve2++;
                            }
                        }
                        // Calculate the average
                        if ($countAve2 > 0) {
                            $averageAve2 = $sumAve2 / $countAve2;
                            echo number_format($averageAve2, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAve2 *2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAve2 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW C -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>C. Teaching of Individual Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAve3 = 0;
                        $countAve3 = 0;
                        $averageAve3 = 0;
                        // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                        foreach ($filterstudent as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG3') {
                                // Accumulate the scoreTG3 for average calculation
                                $sumAve3 += $scoreAve['score'];
                                $countAve3++;
                            }
                        }
                        // Calculate the average
                        if ($countAve3 > 0) {
                            $averageAve3 = $sumAve3 / $countAve3;
                            echo number_format($averageAve3, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAve3 *2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAve3 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW D -->
            <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                <div class="col-span-4">
                    <h2>D. Management Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAve4 = 0;
                        $countAve4 = 0;
                        $averageAve4 = 0;
                        // Now $filterstudent contains only the rows where 'type' is 'STUDENT'
                        foreach ($filterstudent as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG4') {
                                // Accumulate the scoreTG4 for average calculation
                                $sumAve4 += $scoreAve['score'];
                                $countAve4++;
                            }
                        }
                        // Calculate the average
                        if ($countAve4 > 0) {
                            $averageAve4 = $sumAve4 / $countAve4;
                            echo number_format($averageAve4, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAve4 *2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAve4 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- TOTAL: -->
            <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                <div class="col-span-4 text-end">
                    <h2 class="">TOTAL:</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                        <?php 
                        $ave = $averageAve + $averageAve2 + $averageAve3 + $averageAve4;
                        
                        echo number_format($ave / 4, 4);
                        ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                        <?php 
                        $ave2 = (($averageAve * 2) * 0.25) + (($averageAve2 * 2) * 0.25) + (($averageAve3 * 2) * 0.25) + (($averageAve4 * 2) * 0.25) ;
                        
                        echo number_format($ave2, 4);
                        ?>
                    </h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class="">0.3000</h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                        <?php 
                        echo number_format($ave2 * 0.3, 4)
                        ?>
                    </h1>
                </div>
            </div>


        </section>


        <section>

            <!-- PEER EVALUATION -->
            <div class="w-full border-y-2 border-black">
                <h1 class="font-semibold text-base">II. PEER EVALUATION</h1>
            </div>


            <!-- ROW A -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>A. Commitment</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAvep2p = 0;
                        $countAvep2p = 0;
                        $averageAvep2p = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterpeer2peer as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG1') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAvep2p += $scoreAve['score'];
                                $countAvep2p++;
                            }
                        }
                        // Calculate the average
                        if ($countAvep2p > 0) {
                            $averageAvep2p = $sumAvep2p / $countAvep2p;
                            echo number_format($averageAvep2p, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAvep2p * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAvep2p * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW B -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>B. Knowledge of Subject</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAvep2p2 = 0;
                        $countAvep2p2 = 0;
                        $averageAvep2p2 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterpeer2peer as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG2') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAvep2p2 += $scoreAve['score'];
                                $countAvep2p2++;
                            }
                        }
                        // Calculate the average
                        if ($countAvep2p2 > 0) {
                            $averageAvep2p2 = $sumAvep2p2 / $countAvep2p2;
                            echo number_format($averageAvep2p2, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAvep2p2 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAvep2p2 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW C -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>C. Teaching of Individual Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAvep2p3 = 0;
                        $countAvep2p3 = 0;
                        $averageAvep2p3 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterpeer2peer as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG3') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAvep2p3 += $scoreAve['score'];
                                $countAvep2p3++;
                            }
                        }
                        // Calculate the average
                        if ($countAvep2p3 > 0) {
                            $averageAvep2p3 = $sumAvep2p3 / $countAvep2p3;
                            echo number_format($averageAvep2p3, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAvep2p3 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAvep2p3 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW D -->
            <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                <div class="col-span-4">
                    <h2>D. Management Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAvep2p4 = 0;
                        $countAvep2p4 = 0;
                        $averageAvep2p4 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterpeer2peer as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG4') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAvep2p4 += $scoreAve['score'];
                                $countAvep2p4++;
                            }
                        }
                        // Calculate the average
                        if ($countAvep2p4 > 0) {
                            $averageAvep2p4 = $sumAvep2p4 / $countAvep2p4;
                            echo number_format($averageAvep2p4, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAvep2p4 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAvep2p4 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- TOTAL: -->
            <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                <div class="col-span-4 text-end">
                    <h2 class="">TOTAL:</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        $avep2p = $averageAvep2p + $averageAvep2p2 + $averageAvep2p3 + $averageAvep2p4;
                        
                        echo number_format($avep2p / 4, 4);
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        $ave2p2p = (($averageAvep2p * 2) * 0.25) + (($averageAvep2p2 * 2) * 0.25) + (($averageAvep2p3 * 2) * 0.25) + (($averageAvep2p4 * 2) * 0.25) ;
                        
                        echo number_format($ave2p2p, 4);
                    ?>
                    </h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class="">0.2000</h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        echo number_format($ave2p2p * 0.2, 4)
                    ?>
                    </h1>
                </div>
            </div>
        </section>


        <section>
            <!-- SUPERVISOR EVALUATION -->
            <div class="w-full border-y-2 border-black">
                <h1 class="font-semibold text-base">III. SUPERVISOR EVALUATION</h1>
            </div>


            <!-- ROW A -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>A. Commitment</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSup = 0;
                        $countAveSup = 0;
                        $averageAveSup = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filtersupervisor as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG1') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSup += $scoreAve['score'];
                                $countAveSup++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSup > 0) {
                            $averageAveSup = $sumAveSup / $countAveSup;
                            echo number_format($averageAveSup, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSup * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSup * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW B -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>B. Knowledge of Subject</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSup2 = 0;
                        $countAveSup2 = 0;
                        $averageAveSup2 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filtersupervisor as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG2') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSup2 += $scoreAve['score'];
                                $countAveSup2++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSup2 > 0) {
                            $averageAveSup2 = $sumAveSup2 / $countAveSup2;
                            echo number_format($averageAveSup2, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSup2 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSup2 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW C -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>C. Teaching of Individual Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSup3 = 0;
                        $countAveSup3 = 0;
                        $averageAveSup3 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filtersupervisor as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG3') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSup3 += $scoreAve['score'];
                                $countAveSup3++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSup3 > 0) {
                            $averageAveSup3 = $sumAveSup3 / $countAveSup3;
                            echo number_format($averageAveSup3, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSup3 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSup3 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW D -->
            <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                <div class="col-span-4">
                    <h2>D. Management Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSup4 = 0;
                        $countAveSup4 = 0;
                        $averageAveSup4 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filtersupervisor as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TG4') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSup4 += $scoreAve['score'];
                                $countAveSup4++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSup4 > 0) {
                            $averageAveSup4 = $sumAveSup4 / $countAveSup4;
                            echo number_format($averageAveSup4, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSup4 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSup4 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- TOTAL: -->
            <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                <div class="col-span-4 text-end">
                    <h2 class="">TOTAL:</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        $aveSup = $averageAveSup + $averageAveSup2 + $averageAveSup3 + $averageAveSup4;
                        
                        echo number_format($aveSup / 4, 4);
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        $ave2Sup = (($averageAveSup * 2) * 0.25) + (($averageAveSup2 * 2) * 0.25) + (($averageAveSup3 * 2) * 0.25) + (($averageAveSup4 * 2) * 0.25) ;
                        
                        echo number_format($ave2Sup, 4);
                    ?>
                    </h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class="">0.3000</h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        echo number_format($ave2Sup * 0.3, 4)
                    ?>
                    </h1>
                </div>
            </div>
        </section>


        <section>
            <!-- SELF EVALUATION -->
            <div class="w-full border-y-2 border-black">
                <h1 class="font-semibold text-base">IV. SELF EVALUATION</h1>
            </div>


            <!-- ROW A -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>A. Commitment</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSelf = 0;
                        $countAveSelf = 0;
                        $averageAveSelf = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterself as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TS1') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSelf += $scoreAve['score'];
                                $countAveSelf++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSelf > 0) {
                            $averageAveSelf = $sumAveSelf / $countAveSelf;
                            echo number_format($averageAveSelf, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSelf * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSelf * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW B -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>B. Knowledge of Subject</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSelf2 = 0;
                        $countAveSelf2 = 0;
                        $averageAveSelf2 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterself as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TS2') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSelf2 += $scoreAve['score'];
                                $countAveSelf2++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSelf2 > 0) {
                            $averageAveSelf2 = $sumAveSelf2 / $countAveSelf2;
                            echo number_format($averageAveSelf2, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSelf2 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSelf2 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW C -->
            <div class="grid grid-cols-10 px-4 gap-2">
                <div class="col-span-4">
                    <h2>C. Teaching of Individual Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSelf3 = 0;
                        $countAveSelf3 = 0;
                        $averageAveSelf3 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterself as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TS3') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSelf3 += $scoreAve['score'];
                                $countAveSelf3++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSelf3 > 0) {
                            $averageAveSelf3 = $sumAveSelf3 / $countAveSelf3;
                            echo number_format($averageAveSelf3, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSelf3 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSelf3 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- ROW D -->
            <div class="grid grid-cols-10 px-4 gap-2 border-b-2 border-black">
                <div class="col-span-4">
                    <h2>D. Management Learning</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        // Initialize variables for average calculation
                        $sumAveSelf4 = 0;
                        $countAveSelf4 = 0;
                        $averageAveSelf4 = 0;
                        // Now $filterpeer2peer contains only the rows where 'type' is 'peer2peer'
                        foreach ($filterself as $index => $scoreAve) {
                            if ($scoreAve['tits'] == 'TS4') {
                                // Accumulate the scoreTG1 for average calculation
                                $sumAveSelf4 += $scoreAve['score'];
                                $countAveSelf4++;
                            }
                        }
                        // Calculate the average
                        if ($countAveSelf4 > 0) {
                            $averageAveSelf4 = $sumAveSelf4 / $countAveSelf4;
                            echo number_format($averageAveSelf4, 4);
                        } else {
                            echo "N/A";
                        }
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format($averageAveSelf4 * 2, 4)?></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class="">0.2500</h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""><?php echo number_format(($averageAveSelf4 * 2) * 0.25, 4)?></h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
            </div>


            <!-- TOTAL: -->
            <div class="grid grid-cols-10 px-4 gap-2 font-bold">
                <div class="col-span-4 text-end">
                    <h2 class="">TOTAL:</h2>
                </div>
                <!-- AVERAGE -->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        $aveSelf = $averageAveSelf + $averageAveSelf2 + $averageAveSelf3 + $averageAveSelf4;
                        
                        echo number_format($aveSelf / 4, 4);
                    ?>
                    </h1>
                </div>
                <!-- 2X AVERAGE -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT -->
                <div class="col-span-1">
                    <h1 class=""></h1>
                </div>
                <!-- WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        $ave2Self = (($averageAveSelf * 2) * 0.25) + (($averageAveSelf2 * 2) * 0.25) + (($averageAveSelf3 * 2) * 0.25) + (($averageAveSelf4 * 2) * 0.25) ;
                        
                        echo number_format($ave2Self, 4);
                    ?>
                    </h1>
                </div>
                <!-- LEVEL WEIGHT-->
                <div class="col-span-1">
                    <h1 class="">0.2000</h1>
                </div>
                <!-- LEVEL WEIGHT AVERAGE-->
                <div class="col-span-1">
                    <h1 class="">
                    <?php 
                        echo number_format($ave2Self * 0.2, 4)
                    ?>
                    </h1>
                </div>
            </div>
        </section>


        <!-- DALOM -->     
        <footer class="w-full">

            <div class="border-t-2 border-black py-4">
                <!-- RATING -->
                <div class="flex justify-end font-bold">
                    <div class="flex items-center gap-2">
                        <h1>Rating:</h1>
                        <div class="border-4 border-black px-4">
                        <?php 
                            
                            $rating = ($ave2* 0.3) + ($ave2p2p * 0.2) + ($ave2Sup * 0.3) + ($ave2Self * 0.2);
                            echo number_format($rating, 4);

                        ?>      
                        </div>
                    </div>
                </div>
                
                <!-- DESCRIPTIVE EQUIVALENT -->  
                <div class="flex flex-col items-center gap-2">
                <?php
                    // function getDescriptiveEquivalent($numericRating) {
                    //     switch (true) {
                    //         case $numericRating >= 9.3:
                    //             return "Outstanding (O)";
                    //         case $numericRating >= 7.5:
                    //             return "Very Satisfactory (VS)";
                    //         case $numericRating >= 4.7:
                    //             return "Satisfactory (S)";
                    //         case $numericRating >= 2.7:
                    //             return "Fair (F)";
                    //         case $numericRating >= 2.0:
                    //             return "Needs Improvement (NI)";
                    //         default:
                    //             return "Invalid Rating";
                    //     }
                    // }

                    // Example usage: // Replace this with the actual numeric rating
                    $descriptiveEquivalent = getDescriptiveEquivalent($rating);

                    
                    ?>

                    <div class="flex items-center gap-2 font-bold">
                        <h1>DESCRIPTIVE EQUIVALENT:</h1>
                        <div class="border-4 border-black px-10">
                            <?= $descriptiveEquivalent; ?>
                        </div>
                    </div>

                    <div class="border-4 border-black p-2">
                        <h1 class="font-bold">Descriptive Equivalent of Numerical Ratings:</h1>
                        <div class="grid grid-cols-5 px-4 gap-x-4">
                            <div class="col-span-2">9.300 - above</div><div class="col-span-3">- Outstanding (O)</div>
                            <div class="col-span-2">7.500 - 9.299</div><div class="col-span-3">- Very Satisfactory (VS)</div>
                            <div class="col-span-2">4.700 - 7.499</div><div class="col-span-3">- Satisfactory (S)</div>
                            <div class="col-span-2">2.700 - 4.699</div><div class="col-span-3">- Fair (F)</div>
                            <div class="col-span-2">2.000 - 2.699</div><div class="col-span-3">- Needs Improvement (NI)</div>
                        </div>
                    </div>


                </div>
            </div>


            
        </footer>
        
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
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "<h1 class='text-center'>Fill up the Form above.</h1>";
            }
        ?>
    </div>
    
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
        // console.log(selectedCourse);
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
            console.log('../php/get_faculty_options1.php?course=' + selectedCourse);
            // Send the AJAX request with the correct path
            xhttp.open('GET', '../php/get_faculty_options1.php?course=' + selectedCourse, true);
            xhttp.send();
        }
    });
    
</script>
</body>
</html>