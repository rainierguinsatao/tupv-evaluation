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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
    <title>Evaluators' Status</title>
</head>
<body>
<?php
include './adminheader.php';
?>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">


        <?php 
                $sql = "SELECT * FROM sy";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $data = array();  
                $result = $stmt->get_result(); 

                while ($row = $result->fetch_assoc()): 
                   $sy = $row['sy'];
               endwhile; 



               $sql2 = "SELECT * FROM tem";
               $stmt2 = $conn->prepare($sql2);
               $stmt2->execute();
               $data2 = array();  
               $result2 = $stmt2->get_result(); 

               while ($row = $result2->fetch_assoc()): 
                  $term = $row['term'];
              endwhile; 
               
?>




<div class="flex my-6">
<h1 class="text-dark text-xl font-semibold">Current Evaluation for SY <span class = "font-black text-red-900"> <?php echo $sy?></span>, <span class = "font-black text-red-900"> <?php echo $term?></span></h1>
</div>



<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Students (Sections)</button>
        </li>



        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Faculty</button>
        </li>
   
    </ul>
</div>



<div id="default-tab-content">
 

    <div class="hidden p-4 rounded-lg bg-white" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
      
   



      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Section
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Student Evaluated
                </th>
        
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql = "SELECT section, COUNT(*) AS row_count
            FROM (
                SELECT studid, section
                FROM rate_score_tbl2 WHERE type = 'STUDENT'
                GROUP BY studid 
            ) AS subquery
            GROUP BY section;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $data = array();  
            $result = $stmt->get_result(); 

            while ($row = $result->fetch_assoc()): 
            $studid = $row['row_count'];
            $section = $row['section'];
        ?>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-bold text-lg text-dark ">
                <?php echo $section ?> 
                </th>
                <td class="px-6 py-4 text-lg font-bold text-red-700">
                <?php echo $studid ?> 
                </td>
             
              
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</div>





    </div>










    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <?php
                        $sql = "SELECT * FROM courses_tbl";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $data = array();
                        $result = $stmt->get_result();
                        ?>
                        <div class="m-5">
                        
                        <select  id="courseDropdown" name="course"  class="block p-5 w-full text-sm text-gray-900 bg-white shadow-lg rounded-lg border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-60 cursor-pointer ">
                            <option selected disabled>Filter (College - Department)</option>
                            <?php
                            while ($row = $result->fetch_assoc()) :
                                $dept_id = $row['dept_id'];
                                $dept_name = $row['dept']; 
                                $course_name = $row['courseName'];

                               ?>
                              <option value="<?php echo $dept_name?> - <?php echo $course_name?>"><?php echo $dept_name?> - <?php echo $course_name?></option>
                               <?php
                              
                            endwhile;
                            ?>
                </select>
                </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Peer Evaluated
                </th>

                <th scope="col" class="px-6 py-3">
                    Self Evaluated
                </th>

                <th scope="col" class="px-6 py-3">
                    Supervisor
                </th>


                <th scope="col" class="px-6 py-3">
                    Total
                </th>
        
        
            </tr>
        </thead>
        <tbody>


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-bold text-lg text-dark ">
                
                </th>
                <td class="px-6 py-4 text-lg font-bold text-red-700">
               
                </td>

                <td class="px-6 py-4 text-lg font-bold text-red-700">
               
               </td>


               <td  class="px-6 py-4 text-lg font-bold text-red-700">
                    
               </td>

               <td id="totalColumn" class="px-6 py-4 text-lg font-bold text-red-700">
                    
                    </td>
             
              
            </tr>
            <?php //endwhile;?>
        </tbody>
    </table>
    </div>

    
</div>






















            </div>
            </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

<script>
    document.getElementById('courseDropdown').addEventListener('change', function() {
        var selectedCourse = this.value;
        // Make an AJAX call to fetch the total count
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get.php?course=' + encodeURIComponent(selectedCourse), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Update the Total column with the fetched total count
                document.getElementById('totalColumn').textContent = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>


</body>
</html>