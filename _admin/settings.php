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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <title>Settings</title>
</head>
<body>
<?php
include './adminheader.php';
?>
<div class="sm:ml-64 mt-14">
    <div class="p-6">
     
        <h1 class = "m-4 text-lg font-semibold">SETTINGS</h1>
        <div class="flex justify-end">
    <a href="./add_settings.php" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Add Course</a>


   
</div>




        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
            <table id="myTable" class="w-full text-sm text-left p-3 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 capitalized bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Course Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT * FROM courses_tbl";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $data = array();  
                $result = $stmt->get_result(); 

                while ($row = $result->fetch_assoc()): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4"><?= $row['courseName']; ?></td>
                        <td class="px-6 py-4"><?= $row['dept']; ?></td>
                        <td class="px-6 py-4 flex items-center gap-2">
                            <a href="edit_settings.php?id=<?= $row['id'];?>" class="font-medium text-green-600 dark:text-blue-500 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg> 
                            </a>
                           
                            <a href="javascript:(function(){ var result = confirm('Are you sure you want to delete: <?= $row['dept'] ?> - <?= $row['courseName'] ?>'); if(result) { window.location.href = '../php/settingsDelete.php?id=<?= $row['id'];?>&delsettings=true'; } })();" class="font-medium text-red-700 dark:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                </svg> 
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
                    
                </tbody>
            </table>
        </div>



        <div class="flex justify-end mt-5">
        <a href="./adddpt.php" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Add Department</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5 p-6">
            <table id="myTable" class="w-full text-sm text-left p-3 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 capitalized bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                     
                        <th scope="col" class="px-6 py-3">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT * FROM departmenttbl";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $data = array();  
                $result = $stmt->get_result(); 

                while ($row = $result->fetch_assoc()): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                   
                        <td class="px-6 py-4"><?= $row['dept']; ?></td>
                        <td class="px-6 py-4 flex items-center gap-2">
                            <a href="edit_dept.php?id=<?= $row['id'];?>" class="font-medium text-green-600 dark:text-blue-500 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg> 
                            </a>
                           
                            <a href="javascript:(function(){ var result = confirm('Are you sure you want to delete: <?= $row['dept'] ?>'); if(result) { window.location.href = '../php/settingsDelete.php?id=<?= $row['id'];?>&deldept=true'; } })();" class="font-medium text-red-700 dark:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                </svg> 
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
                    
                </tbody>
            </table>
        </div>




        <div class="flex justify-end mt-5">
        <a href="./addsec.php" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Add Section</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5 p-6">
            <table id="myTable" class="w-full text-sm text-left p-3 rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 capitalized bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                     
                        <th scope="col" class="px-6 py-3">
                            Sections
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "SELECT * FROM sections";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $data = array();  
                $result = $stmt->get_result(); 

                while ($row = $result->fetch_assoc()): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                   
                        <td class="px-6 py-4"><?= $row['section']; ?></td>
                        <td class="px-6 py-4"><?= $row['course']; ?></td>
                        <td class="px-6 py-4 flex items-center gap-2">
                            <a href="edit_sections.php?id=<?= $row['id'];?>" class="font-medium text-green-600 dark:text-blue-500 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                </svg> 
                            </a>
                           
                            <a href="javascript:(function(){ var result = confirm('Are you sure you want to delete: <?= $row['course'] ?>'); if(result) { window.location.href = '../php/settingsDelete.php?id=<?= $row['id'];?>&deldept=true'; } })();" class="font-medium text-red-700 dark:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                </svg> 
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
                    
                </tbody>
            </table>
        </div>




        <div>
    
            <div class="shadow-md sm:rounded-lg p-6">
            <h1 class="text-md text-secondary font-bold mb-5">Update Term on Evaluation</h1>
            <form action="../php/updateTerm.php" method="POST" class = "flex">
                <label for="term" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select id="term" name="selectedTerm" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <?php 
                    $sql = "SELECT * FROM tem";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result(); 

                    while ($row = $result->fetch_assoc()): 
                        if($row['term'] == "First Term") {
                            ?>
                            <option value="<?=$row['term']?>" selected><?=$row['term']?></option>
                            <option value="Second Term">Second Term</option>
                            <option value="Third Term">Third Term</option>
                            <?php

                        } else if($row['term'] == "Second Term") {
                            ?>
                            <option value="First Term">First Term</option>
                            <option value="<?=$row['term']?>" selected><?=$row['term']?></option>
                            <option value="Third Term">Third Term</option>
                            <?php

                        } else if($row['term'] == "Third Term") {
                            ?>
                            <option value="First Term">First Term</option>
                            <option value="Second Term">Second Term</option>
                            <option value="<?=$row['term']?>" selected><?=$row['term']?></option>
                            <?php
                        }
                        ?>
                        <!-- Use the value from the database row as the option value -->
                    
                    <?php endwhile; ?>

                </select>
                <!-- Add a submit button to submit the form -->
                <button type="submit" name="updateTerm" class="ml-2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 mb-4">Update Term</button>
            </form>

            </div>
        </div>


        <div>
            <div class="shadow-md sm:rounded-lg p-6">
            <h1 class="text-md text-secondary font-bold mb-5">Update School Year on Evaluation</h1>
            <form action="../php/updateTerm.php" method="POST">
             
               

                <?php 
                    $sql = "SELECT * FROM sy";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result(); 

                    while ($row = $result->fetch_assoc()): 
                     
    
                        ?>
                      <input type="text" name = "sy" maxlength="9" id="syInput" class = "rounded-lg shadow-md text-gray-900  text-secondary"  value = "<?php echo $row['sy']?>" required>
                    
                    <?php endwhile; ?>

           
                <!-- Add a submit button to submit the form -->
                <button type="submit" onclick="validateAndConfirmUpdate()" name="updateSy" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2">Update School Year</button>
            </form>

            </div>
        </div>
    </div>










    

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "paging": true,      
            "ordering": false,  
            "searching": true,
            "pageLength": 5, 
            "lengthMenu": [5, 10, 25, 50, 100],
            "responsive": true,  
            "search": "Search: " 
          
        });
    });


    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("syInput").addEventListener("input", function () {
            validateInput(this);
        });
    });

    function validateAndConfirmUpdate() {
        var inputValue = document.getElementById("syInput").value;

        // Check if the input has exactly 9 characters
        if (inputValue.length !== 9) {
            alert("Please follow the YYYY-YYYY format.");
        } else {
            // If the input is valid, proceed with the confirmation dialog
            confirmUpdate();
        }
    }

    function confirmUpdate() {
        var confirmation = confirm("Are you sure you want to update the School year? This will affect the evaluation process");
        if (confirmation) {
            // If the user clicks "OK" in the confirmation dialog, proceed with the update
            // You can add your update logic here
            alert("School Year updated successfully!"); // Replace this with your actual update code
        } else {
            // If the user clicks "Cancel" in the confirmation dialog, do nothing
            alert("Update canceled.");
        }
    }
</script>
</body>
</html>