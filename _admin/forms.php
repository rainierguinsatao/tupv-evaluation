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
    <title>FORMS | DASHBOARD</title>
</head>
<body>
<?php
    include './adminheader.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Loop through each question and update it in the database
        foreach ($_POST['question'] as $id => $question) {
            $sql = "UPDATE froms_tbl SET question='$question' WHERE id=$id";
            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    $sql = "SELECT * FROM froms_tbl";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>

<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">


   <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">General Form</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Self Form</button>
        </li>

        </ul>
</div>
     



<div id="default-tab-content">

<!-- GENERAL FORM TAB ================ -->
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <section class="bg-gray-50 dark:bg-gray-900">
     
     <div class="w-full-screen bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
         <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
             <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                 Evaluation Form Editor
             </h1>
             <form class="space-y-4 md:space-y-6" action="#" method = "post">
     
             <?php foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
   </div>
<?php endforeach; ?>


               <div class = "m-6">
                 <button type="submit" onclick="confirmAndUpdateForm()" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Update Form</button>
                 </div>
              
             </form>
         </div>
     </div>

</section>

    </div>





    <!-- SELF FORM TAB ----------------- -->

    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
   
</div>





  





   </div>
</div>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

<script>
    function confirmAndUpdateForm() {
        // Use JavaScript confirm to ask for confirmation
        var isConfirmed = confirm('Are you sure you want to update the form?');

        // If user confirms, submit the form
        if (isConfirmed) {
            document.forms[0].submit(); // Assuming this is the first form on the page
            alert('Form updated.');
        } else {
            // If user cancels, you can show an alert or perform other actions
            alert('Form update canceled.');
        }
    }
</script>
</body>
</html>