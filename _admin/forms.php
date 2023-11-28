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
    <h1 class="text-xl  m-4 font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
             <span class = "text-red-700">G</span>eneral Evaluation Form Editor
             </h1>
     <div class="w-full-screen bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
         <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
           
         <form id="generalForm" class="space-y-4 md:space-y-6" action="../php/inserttoforms.php" method="post">

                <h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">I. COMMITMENT</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 1'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "deltg1btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
   </div>
<?php endforeach; ?>
<div class="flex">


<input type="text"  name = "newtg1" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another question to the form?');" name= "tg1btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>




<!-- TITLE 2 -->

<h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">II. KNOWLEDGE OF SUBJECT</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 2'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "deltg2btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
   </div>
<?php endforeach; ?>

<div class="flex">

<input type="text"  name = "newtg2" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another question to the form?');" name= "tg2btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>



<!-- TITLE 3 -->

<h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">III. TEACHING OF INDIVIDUAL LEARNING</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 3'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "deltg3btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
   </div>
<?php endforeach; ?>
<div class="flex">

<input type="text"  name = "newtg3" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another question to the form?');" name= "tg3btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>



<!-- TITLE 4 -->

<h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">IV. MANAGEMENT LEARNING</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'GENERAL' AND title = 'TITLE 4'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "deltg4btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
   </div>
<?php endforeach; ?>

<div class="flex">

<input type="text"  name = "newtg4" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another question to the form?');" name= "tg4btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>


               <div class = "m-6">
               <button type="submit" name = "updategeneral" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-md px-5 py-2.5 text-center" onclick="return confirm('Are you sure you want to update the form?'); showAlert();">Update Form</button>
                 </div>
              
          
         </div>
     </div>

</section>

    </div>





    <!-- SELF FORM TAB ------------------------------------------------------------------- -->


    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <section class="bg-gray-50 dark:bg-gray-900">
    <h1 class="text-xl m-4 font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                <span class = "text-red-700">S</span>elf Evaluation Form Editor
             </h1>
     <div class="w-full-screen bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
         <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            
    
             <h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">I. COMMITMENT</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 1'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "delts1btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
       
   </div>
<?php endforeach; ?>

<div class="flex">

<input type="text"  name = "newts1" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another self question to the form?');" name= "ts1btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>




<!-- TITLE 2 -->

<h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">II. KNOWLEDGE OF SUBJECT</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 2'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "delts2btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
       
   </div>
<?php endforeach; ?>

<div class="flex">

<input type="text"  name = "newts2" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another self question to the form?');" name= "ts2btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>



<!-- TITLE 3 -->

<h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">III. TEACHING OF INDIVIDUAL LEARNING</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 3'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "delts3btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
       
   </div>
<?php endforeach; ?>

<div class="flex">

<input type="text"  name = "newts3" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another self question to the form?');" name= "ts3btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>



<!-- TITLE 4 -->

<h1 class = "text-sm font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">IV. MANAGEMENT LEARNING</h1>
             <?php
                 $sql = "SELECT * FROM froms_tbl WHERE type = 'SELF' AND title = 'TITLE 4'";
                 $result = mysqli_query($conn, $sql);
             
                 if ($result) {
                     $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
                 } else {
                     echo "Error: " . mysqli_error($conn);
                 }
                       
             foreach ($questions as $index => $question): ?>
   <div class="flex">
       <span class="m-4 text-gray-600"><?= ($index + 1) . "." ?></span>
       <input type="text" name="question[<?= $question['id'] ?>]" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="<?= $question['question'] ?>">
       <button type = "submit" name= "delts4btn" value="<?= $question['id'] ?>" onclick="return confirm('Delete question?');" class = "bg-red-800  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
</svg>
             </button>
       
   </div>
<?php endforeach; ?>

<div class="flex">

<input type="text"  name = "newts4" placeholder="Add new questions to form" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
<button type = "submit" onclick="return confirm('Are you sure you want to Add another self question to the form?');" name= "ts4btn" class = "bg-blue-500  rounded-lg text-white p-3 m-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
</svg>
</button>


</div>

           


               <div class = "m-6">
               <button type="submit" name = "updateself" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-md px-5 py-2.5 text-center" onclick="return confirm('Are you sure you want to update the form?'); showAlertS();">Update Self Form</button>

                 </div>
              
             </form>
         </div>
     </div>

</section>
    </div>
   
</div>





  





   </div>
</div>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

<script>
  function showAlert() {
    alert('Genral Form updated successfully!');
  
  }


  function showAlertS() {
    alert('Self Form updated successfully!');
  
  }
</script>
</body>
</html>