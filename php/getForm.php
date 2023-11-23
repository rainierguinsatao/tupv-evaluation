<?php
include "../db/conn.php";

$selectedOption = $_GET['option'];
$usercourse = $_GET['course'];
$userdept = $_GET['dept'];
$userid = $_GET['id'];

if ($selectedOption == 'Supervisor') {

    $sql = "SELECT * FROM accounts WHERE id = '$userid'";
    $stmt = $conn->prepare($sql);
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    foreach ($accounts as $index => $acc):
        $ft = $acc['faculty_type'];
    ?>
    <input type="hidden" name = "nagrateid" value = "<?= $acc['id'] ?>">
    <input type="hidden" name="full_name" value="<?= $acc['last_name'] . ', ' . $acc['first_name'] . ' ' . $acc['mi'] ?>.">
    <input type="hidden" name = "course" value = "<?= $acc['dept'] ?> - <?= $acc['course'] ?>">
    <input type="hidden" name = "ftype" value = "supervisor">
    <input type="hidden" name = "ftype1" value = "<?= $acc['faculty_type'] ?>">
    <?php endforeach; 
    ?> 
    <div class="p-6 bg-white border rounded-lg">
        <div>
            <?php 
            if ($ft == 'supervisor') {
            ?>

            
            <label for="selectedClass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate as: </label>
            <select id="selectedClass" name="selectedClass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected disabled hidden value="">Choose</option>
                <option value="supervisor">Supervisor</option>
                <option value="faculty">Peer</option>
            
                <!-- Add more options as needed -->
            </select>

            <?php }?>



            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term <span class="text-[#C51E3A]">*</span></label>
            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Term</option>
                                <?php
                                $sql = "SELECT * FROM tem";
                                $stmt = $conn->prepare($sql);
                                $result = mysqli_query($conn, $sql);
                            
                                if ($result) {
                                    $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            
                                
                                ?>
                                <?php foreach ($accounts as $index => $acc): ?>
                                <option value="<?= $acc['term'] ?>"><?= $acc['term'] ?></option>
                            
                                <?php endforeach;?> 
                            </select>
        </div>
        <div>
            <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S.Y.</label>
            <select id="schoolyear" name = 'schoolyear' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <?php 
                 $sql = "SELECT * FROM sy";
                 $stmt = $conn->prepare($sql);
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
             
                 
                 ?>
                 <?php foreach ($accounts as $index => $acc): ?>
                 <option value="<?= $acc['sy'] ?>"><?= $acc['sy'] ?></option>
             
                 <?php endforeach;?>
            </select>
        </div>
    </div>
    
    <div class="p-6 border bg-white rounded-lg">
    <label for="faculty_to_eval" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Faculty to Evaluate <span class="text-[#C51E3A]">*</span></label>
    <select id="faculty_to_eval" name="faculty_to_eval" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        <option selected disabled hidden value="">Choose</option>

        <?php
    // Modify the SQL query to fetch faculty members not evaluated by the user
    echo $sql = "SELECT * FROM accounts 
            WHERE faculty_type = 'supervisor' 
            AND course = '$userdept' 
            AND dept = '$usercourse'
            AND id != '$userid'
            AND NOT EXISTS (
                SELECT 1 FROM rate_score_tbl2
                WHERE gnrateid = accounts.id
                AND nagrateid = '$userid'
                AND type = 'Supervisor'
            )   
            ORDER BY last_name ASC;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $facultyOptions = array();
        while ($row = $result->fetch_assoc()) {
            $middleInitial = !empty($row['mi']) ? $row['mi'] . '.' : '';
            $fullName = $row['last_name'] . ', ' . $row['first_name'] . ' ' . $middleInitial;
            ?>
            <option value="<?=$row['id'] . '|' . $fullName?>"><?=$fullName?></option>
            <?php
        }
    }
    ?>
    </select>


    </div>
    <div class="p-6 border bg-white rounded-lg">
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
    <button type="submit" onclick="return confirm('Are you sure you want to submit SUPERVISOR evaluation?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>


    
    
    <button onclick="confirmLogout2()" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Cancel Submission</button>
  <?php
  
} elseif ($selectedOption == 'Peer to Peer') {
    
    $sql = "SELECT * FROM accounts WHERE id = '$userid'";
    $stmt = $conn->prepare($sql);
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    foreach ($accounts as $index => $acc):
        $ft = $acc['faculty_type'];
    ?>
    <input type="hidden" name = "nagrateid" value = "<?= $acc['id'] ?>">
    <input type="hidden" name="full_name" value="<?= $acc['last_name'] . ', ' . $acc['first_name'] . ' ' . $acc['mi'] ?>.">
    <input type="hidden" name = "course" value = "<?= $acc['dept'] ?> - <?= $acc['course'] ?>">
    <input type="hidden" name = "ftype" value = "<?= $acc['faculty_type'] ?>">
    <input type="hidden" name = "ftype1" value = "<?= $acc['faculty_type'] ?>">

    <?php endforeach; 
  // Fetch form content from the database for form1
  ?> 
    <div class="p-6 border bg-white rounded-lg">
        <div>
        <?php 
            if ($ft == 'supervisor') {
            ?>

            
            <label for="selectedClass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate as: </label>
            <select id="selectedClass" name="selectedClass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected disabled hidden value="">Choose</option>
                <option value="supervisor">Supervisor</option>
                <option value="faculty">Peer</option>
            
                <!-- Add more options as needed -->
            </select>

            <?php }?>

            
            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term <span class="text-[#C51E3A]">*</span></label>
            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Term</option>
                                <?php
                                $sql = "SELECT * FROM tem";
                                $stmt = $conn->prepare($sql);
                                $result = mysqli_query($conn, $sql);
                            
                                if ($result) {
                                    $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            
                                
                                ?>
                                <?php foreach ($accounts as $index => $acc): ?>
                                <option value="<?= $acc['term'] ?>"><?= $acc['term'] ?></option>
                            
                                <?php endforeach;?> 
                            </select>
        </div>
        <div>
            <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S.Y.</label>
            <select id="schoolyear" name = 'schoolyear' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <?php 
                 $sql = "SELECT * FROM sy";
                 $stmt = $conn->prepare($sql);
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
             
                 
                 ?>
                 <?php foreach ($accounts as $index => $acc): ?>
                 <option value="<?= $acc['sy'] ?>"><?= $acc['sy'] ?></option>
             
                 <?php endforeach;?>
            </select>
        </div>
    </div>
    
    <div class="p-6 border bg-white rounded-lg">
    <label for="faculty_to_eval" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Faculty to Evaluate <span class="text-[#C51E3A]">*</span></label>
    <select id="faculty_to_eval" name="faculty_to_eval" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
    <option selected disabled hidden value="">Choose</option>

    <?php
    // Modify the SQL query to fetch faculty members not evaluated by the user


    $sql = "SELECT * FROM accounts 
            WHERE course = '$userdept' 
            AND dept = '$usercourse'
            AND id != '$userid'
            AND NOT EXISTS (
                SELECT 1 FROM rate_score_tbl2
                WHERE gnrateid = accounts.id
                AND nagrateid = '$userid'
                AND type = 'Peer to Peer'
            )
            ORDER BY last_name ASC;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $facultyOptions = array();
        while ($row = $result->fetch_assoc()) {
            $middleInitial = !empty($row['mi']) ? $row['mi'] . '.' : '';
            $fullName = $row['last_name'] . ', ' . $row['first_name'] . ' ' . $middleInitial;
            ?>
            <option value="<?=$row['id'] . '|' . $fullName?>"><?=$fullName?></option>
            <?php
        }
    }
    ?>
    </select>
    </div>
    <div class="p-6 border bg-white rounded-lg">
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
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">IV. Management of learning</h5>
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
    <button type="submit" onclick="return confirm('Are you sure you want to submit PEER TO PEER evaluation?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
    
    <button onclick="confirmLogout2()" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Cancel Submission</button>
   
  <?php



} elseif ($selectedOption == 'Self') {
    $sql = "SELECT * FROM accounts WHERE id = '$userid'";
    $stmt = $conn->prepare($sql);
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    foreach ($accounts as $index => $acc):
        $ft = $acc['faculty_type'];
    ?>
    <input type="hidden" name = "nagrateid" value = "<?= $acc['id'] ?>">
    <input type="hidden" name="full_name" value="<?= $acc['last_name'] . ', ' . $acc['first_name'] . ' ' . $acc['mi'] ?>.">
    <input type="hidden" name = "course" value = "<?= $acc['dept'] ?> - <?= $acc['course'] ?>">
    <input type="hidden" name = "ftype" value = "<?= $acc['faculty_type'] ?>">
    <input type="hidden" name = "ftype1" value = "<?= $acc['faculty_type'] ?>">

    <?php endforeach; 
  // Fetch form content from the database for form2
  ?> 
    <div class="p-6 border bg-white rounded-lg">
        <div>
            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Term <span class="text-[#C51E3A]">*</span></label>
            <select id="term" name="term" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled hidden value="">Choose Term</option>
                                <?php
                                $sql = "SELECT * FROM tem";
                                $stmt = $conn->prepare($sql);
                                $result = mysqli_query($conn, $sql);
                            
                                if ($result) {
                                    $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            
                                
                                ?>
                                <?php foreach ($accounts as $index => $acc): ?>
                                <option value="<?= $acc['term'] ?>"><?= $acc['term'] ?></option>
                            
                                <?php endforeach;?> 
                            </select>
        </div>
        <div>
            <label for="schoolyear" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S.Y.</label>
            <select id="schoolyear" name = 'schoolyear' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <?php 
                 $sql = "SELECT * FROM sy";
                 $stmt = $conn->prepare($sql);
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
             
                 
                 ?>
                 <?php foreach ($accounts as $index => $acc): ?>
                 <option value="<?= $acc['sy'] ?>"><?= $acc['sy'] ?></option>
             
                 <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="p-6 border bg-white rounded-lg">
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
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">IV. Management of learning</h5>
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
    <button type="submit" onclick="return confirm('Are you sure you want to submit SELF evaluation?')" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
    
    <button onclick="confirmLogout2()" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Cancel Submission</button>
  <?php
}
// Add more conditions as needed

?>
