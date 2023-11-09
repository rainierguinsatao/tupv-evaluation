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



    $sqls = "SELECT DISTINCT sy FROM froms_tbl";
    $results = mysqli_query($conn, $sqls);

    if ($results) {
        $sy = mysqli_fetch_all($results, MYSQLI_ASSOC);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
?>

<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
     
   <section class="bg-gray-50 dark:bg-gray-900">
     
      <div class="w-full-screen bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                 Evaluation Form Editor
              </h1>
                <div class="flex">
              <span class = "m-4">S.Y</span>
            <select id="syDropdown" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-27 p-2.5">
            <option selected>Choose sy</option>
            <?php foreach ($sy as $row): ?>
            <option value="<?php echo $row['sy'] ?>"><?php echo $row['sy'] ?></option>
            <?php endforeach; ?>
          
            </select>
            </div>
              <form class="space-y-4 md:space-y-6" action="#" method = "post">
      
              
            <div class="flex" id="questionsContainer">
                <span class="m-4 text-gray-600"></span>
                <input type="text" name="question" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="choose sy to view form" required="" value="">
            </div>



                <div class = "m-6">
                  <button type="submit" onclick="return confirm('Are you sure you want to update the form?')" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Update Form</button>
                  </div>
               
              </form>
          </div>
      </div>

</section>






   </div>
</div>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

<script>
     document.getElementById('syDropdown').addEventListener('change', function() {
        var selectedSy = this.value;
        fetchQuestions(selectedSy);
    });

    function fetchQuestions(selectedSy) {
        // Make an AJAX request to fetch questions for the selected academic year
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Parse the response and update the questions
                var questionsContainer = document.getElementById('questionsContainer');
                questionsContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.open('GET', 'get_questions.php?sy=' + selectedSy, true);
        xhr.send();
    }
</script>



</body>
</html>