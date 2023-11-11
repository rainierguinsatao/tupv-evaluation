<?php
include "../db/conn.php";
$selectedOption = $_GET['option'];
$usercourse = $_GET['course'];
$userid = $_GET['id'];
// Query your database or generate form content based on $selectedOption
// For example:
if ($selectedOption == 'Supervisor' || $selectedOption == 'Peer to Peer') {
  // Fetch form content from the database for form1
  ?> 
    <div class="p-6 border rounded-lg">
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
    
    <div class="p-6 border rounded-lg">
        <label for="faculty_to_eval" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Faculty to Evaluate <span class="text-[#C51E3A]">*</span></label>
        <select id="faculty_to_eval" name="faculty_to_eval" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option selected disabled hidden value="">Choose</option>
            <?php 
            // Modify the SQL query to fetch faculty members based on the selected course
            $sql = "SELECT * FROM accounts 
            WHERE type = 'user' 
              AND course = '$usercourse' 
              AND id != '$userid'
            ORDER BY last_name ASC;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                $facultyOptions = array();
                while ($row = $result->fetch_assoc()) {
                $middleInitial = !empty($row['mi']) ? $row['mi'] . '.' : '';
            ?>
            
            <option value="<?=$row['last_name'] . ', ' . $row['first_name'] . ' ' . $middleInitial?>"><?=$row['last_name'] . ', ' . $row['first_name'] . ' ' . $middleInitial?></option>
            <?php 
                }
            }
            ?>
        </select>
    </div>
    <div class="p-6 border rounded-lg">
        <h1 class="text-2xl font-semibold">Form</h1>
        <div>
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">I. Commitment</h5>
            <?php
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 1'";
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
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 2'";
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
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 3'";
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
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 4'";
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
    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
  <?php
  
} elseif ($selectedOption == 'Self') {
  // Fetch form content from the database for form2
  ?> 
    <div class="p-6 border rounded-lg">
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
    <div class="p-6 border rounded-lg">
        <h1 class="text-2xl font-semibold">Form</h1>
        <div>
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">I. Commitment</h5>
            <?php
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 1'";
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
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 2'";
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
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 3'";
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
                $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 4'";
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
    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
  <?php
}
// Add more conditions as needed

?>
