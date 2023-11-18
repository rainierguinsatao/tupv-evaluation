<?php
    include '../db/conn.php';
    include '../php/session_faculty.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <link href="../dist/output.css" rel="stylesheet">
    <title>TUP-V Evaluation | Faculty</title>
</head>
<body class = "bg-red-700">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="container mx-auto flex flex-wrap items-center justify-between py-4">
    <img src="../images/LOGO.png" class="h-6 ml-4" alt=" Logo" />
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <div class="mr-4">
        <button type="button" onclick="confirmLogout()" class="flex group/item text-sm p-1 border-2 border-black rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8  rounded-full" src="../images/computer-power-button.png" alt="">
        </button>
        </div>
        

        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>


  </div>
</nav>



<main class="container mx-auto">
    <div>
    <?php
            // Fetch information from the accounts table
            $sql = "SELECT * FROM accounts WHERE id = {$_SESSION['id']}";
            $stmt = $conn->prepare($sql);
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Process information from the accounts table
            foreach ($accounts as $index => $acc):
                $facultyType = $acc['faculty_type'];
                $userFirstName = $acc['first_name'];
                $userMI = $acc['mi'];
                $userLastName = $acc['last_name'];
                $userDept = $acc['dept'];
                $userCourse = $acc['course'];
                $userId = $_SESSION['id'];
            endforeach;

            // Fetch information from the rate_score_tbl table
            $sql = "SELECT * FROM rate_score_tbl2 WHERE nagrateid = {$_SESSION['id']}";
            $stmt = $conn->prepare($sql);
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Process information from the rate_score_tbl table
            foreach ($accounts as $index => $acc):
                $selectedClass = $acc['kind'];
            endforeach;
            ?>

            <!-- Print HTML elements using the fetched data -->
            <h1 class="text-2xl font-bold hidden">Hi, <?= $userFirstName ?> <?= $userMI ?> <?= $userLastName ?></h1>
            <h1 id="user_course" class="text-2xl font-bold hidden"><?= $userDept ?></h1>
            <h1 id="user_dept" class="text-2xl font-bold hidden"><?= $userCourse ?></h1>
            <h1 id="ftype" class="text-2xl font-bold hidden"><?= $facultyType ?></h1>
            <h1 id="user_id" class="text-2xl font-bold hidden"><?= $userId ?></h1>
            <h1 id="selectedClass" class="text-2xl font-bold hidden"><?= $selectedClass ?></h1>

    </div>
    <?php   include '../_admin/alert.php';
        ?>
    <div class="w-[632px] mx-auto my-6">
    <div class="p-6 bg-white border rounded-lg mb-4">
      
            <div class="text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 mb-2">
                            <h1 class="font-semibold text-[#C51E3A] uppercase">information</h1>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">When evaluating teachers, honestly acknowledge their strengths, citing specific examples that impressed you, and express constructive concerns or suggestions for improvement. Thank you for your cooperation.</p>

                            <h1 class="font-semibold text-[#C51E3A] text-sm italic uppercase mt-5">NOTE: Once you click finished evaluation, it is considered that you are done on evaluating your; SUPERVISORS, PEERS, and your SELF. You can't login until the next evaluation.</h1>


                        </div>
            </div>

            <div class="p-6 bg-white border rounded-lg mb-4">
            <div class="text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 mb-2">
                            <p class="mt-1 text-md font-normal text-gray-900 dark:text-gray-400"><span class = "text-gray-400 uppercase text-xs">Name:</span><?= $userFirstName ?> <?= $userMI ?> <?= $userLastName ?></p>

                            <p class="mt-1 text-md font-normal text-gray-900 dark:text-gray-400"><span class = "text-gray-400 uppercase text-xs">DEPARTMENT|COURSE:</span><?= $userDept ?> - <?= $userCourse ?></p>

                            <p class="mt-1 text-md font-normal text-gray-900 dark:text-gray-400 uppercase"><span class = "text-gray-400 uppercase text-xs">TYPE:</span> <?= $facultyType ?></p>
                        </div>
            </div>
        
        <form method="post" action="../_faculty/a_process.php" id="myForm">
            <div class="p-6 bg-white border rounded-lg mb-4">

   
            <label for="selectedClassDropdown" id="labelSCD" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate as: </label>
            <select id="selectedClassDropdown" name="selectedClass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="changeForm2()">
                <option selected disabled hidden value="">Choose</option>
                <option value="supervisor">Supervisor</option>
                <option value="faculty">Peer</option>
            
                <!-- Add more options as needed -->
            </select>
          

                <label for="selectOption" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option:</label>
                <select id="selectOption" name="selectOption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="changeForm()" >
                    <option selected disabled hidden value="">Choose</option>
              
                    <option value="Peer to Peer">Peer</option>
                    <option value="Self">Self</option>
             
                    <!-- Add more options as needed -->
                </select>


         
            </div>
            
                
          


            <div id="formContainer" class="flex flex-col gap-4">
                <!-- Form content will be dynamically inserted here -->
            </div>

            
        </form>
    </div>
</main>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>

document.getElementById("selectOption").addEventListener("change", function() {
        var selectedOption = this.value;
        var selectedClassDropdown = document.getElementById("selectedClassDropdown");
        var labelSCD = document.getElementById("labelSCD");
        

        // Check if the selected option is "Self"
        if (selectedOption === "Self") {
            // If "Self" is selected, hide the selectedClassDropdown
            selectedClassDropdown.style.display = "none";
            labelSCD.style.display = "none";
        } else {
            // If any other option is selected, show the selectedClassDropdown
            selectedClassDropdown.style.display = "block";
            labelSCD.style.display = "block";
        }
    });

    
document.getElementById("selectedClassDropdown").addEventListener("change", function() {
    // Call changeForm() whenever the selection changes
    changeForm();
});


    function changeForm() {
    var selectedClass = document.getElementById("selectedClassDropdown").value;
    var selectedOption = document.getElementById("selectOption").value;
    var formContainer = document.getElementById("formContainer");
    var courseText = document.getElementById("user_course").innerText;
    var deptText = document.getElementById("user_dept").innerText;
    console.log(selectedClass);
    console.log(selectedOption);
    var courseid = document.getElementById("user_id").innerText;
    // Use AJAX to fetch form content from the server based on the selected option
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
        formContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "../php/a_form.php?option=" + selectedOption + "&course=" + encodeURIComponent(courseText) + "&dept=" + encodeURIComponent(deptText) + "&id=" + encodeURIComponent(courseid) + "&selectedClass=" + encodeURIComponent(selectedClass), true);
    xhr.send();
    }







</script>
<script>
        function confirmLogout() {
        var confirmLogout = confirm("Are you sure you want to sign out?");
        if (confirmLogout) {
            window.location.href = "../php/logout_faculty.php";
        }
    }

    function confirmLogout2() {
        var confirmLogout2 = confirm("Are you sure you want to Cancel you evaluation?");
        if (confirmLogout2) {
            window.location.href = "../php/logout_faculty.php";
        }
    }
</script>
</body>
</html>