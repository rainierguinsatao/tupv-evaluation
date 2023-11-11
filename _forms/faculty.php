<?php 
    include '../db/conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
    <title>FACULTY | EVALUATION</title>
</head>

<?php
include './header.php';
?>

<body class = "bg-red-800">

<div class="p-4 ">
        <div class="p-4 mt-12">

            <section>
                <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Welcome to TUP Visayas Evaluation System</h5>
                    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">This is a Qualitative Contribution Evaluation (QCE) for Faculty, please be honest upon rating base on you experience. Rest assured that confidentiality protocol will be fully implemented.  Thank you for your cooperation.</p>
                    <p class="mb-5 text-base text-gray-800 sm:text-lg dark:text-gray-400">Rating Legend</p>
                    <div class="items-center flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">

                <div class="row md:col">1 - POOR</div>
                <div class="row md:col">2 - FAIR</div>
                <div class="row md:col">3- SATISFACTORY</div>
                <div class="row md:col">4 - VERY SATISFACTORY</div>
                <div class="row md:col">5 - OUTSTANDING</div>

                </div>

                </div>

            </section>


            <section>
    <div class="flex">
        <div class="mx-auto m-6 w-screen">

        <div class="m-4">
            <div class="max-w-1/2 p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">I. Commitment</h5>
                <?php
                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 1'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                foreach ($questions as $index => $question): ?>
                    <div class="flex items-center">
                        <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                        <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                        
                    </div>

                    <div class="flex">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="text-center flex mx-auto">
                        <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                        <br>
                        <?= $i ?>
                    </div>
                <?php endfor; ?>
            </div>

                <?php endforeach ?>
            </div>
                    </div>





                      <!-- TITLE 2 -->
                      <div class="m-4">
                <div class="max-w-1/2 p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">II. Knowledge of Subject</h5>
                <?php
                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 2'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                foreach ($questions as $index => $question): ?>
                    <div class="flex items-center">
                        <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                        <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                        
                    </div>

                    <div class="flex">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="text-center flex mx-auto">
                        <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                        <br>
                        <?= $i ?>
                    </div>
                <?php endfor; ?>
            </div>

                <?php endforeach ?>
            </div>
            </div>




              <!-- TITLE 3 -->
              <div class="m-4">
                <div class="max-w-1/2 p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">III. Teaching for independent learninig</h5>
                <?php
                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 3'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                foreach ($questions as $index => $question): ?>
                    <div class="flex items-center">
                        <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                        <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                        
                    </div>

                    <div class="flex">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="text-center flex mx-auto">
                        <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                        <br>
                        <?= $i ?>
                    </div>
                <?php endfor; ?>
            </div>

                <?php endforeach ?>
            </div>
            </div>



              <!-- TITLE 4 -->
              <div class="m-4">
                <div class="max-w-1/2 p-6  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">IV. Management of learninig</h5>
                <?php
                $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 4'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                foreach ($questions as $index => $question): ?>
                    <div class="flex items-center">
                        <span class="m-2 text-gray-800"><?= ($index + 1) . "." ?></span>
                        <p class="m-2 font-normal text-gray-900 dark:text-gray-400" name="question[<?= $question['id'] ?>]"><?= $question['question'] ?></p>
                        
                    </div>

                    <div class="flex">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="text-center flex mx-auto">
                        <input type="radio" id="q<?= $question['id'] ?>_rating<?= $i ?>" name="question[<?= $question['id'] ?>]_rating" value="<?= $i ?>" class="m-2">
                        <br>
                        <?= $i ?>
                    </div>
                <?php endfor; ?>
            </div>

                <?php endforeach ?>
            </div>
            </div>


                    <div class="flex ">
                        <div class="ml-auto p-4">
                        <button onclick="submitForm()" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            SUBMIT FORM
                            </span>
                        </button>
                        </div>
                        </div>



                     







        </div>
    </div>
</section>







            </div>
            </div>



<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>


<script>
    function submitForm() {
        // Create an array to store the selected values
        let selectedValues = [];

        // Loop through all radio buttons and push the selected values to the array
        document.querySelectorAll('input[type="radio"]:checked').forEach(function (radio) {
            selectedValues.push({
                id: radio.id,
                value: radio.value
            });
        });

        // Send an AJAX request to the PHP script to handle database insertion
        // You need to replace "your_php_script.php" with the actual PHP script name
        fetch('./insert_score.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(selectedValues),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            // Optionally, you can redirect or display a success message here
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>
</body>
</html>