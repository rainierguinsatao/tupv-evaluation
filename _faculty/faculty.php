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
        <button type="button" class="flex  text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8  rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="">
        </button>
        </div>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
            <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
            </li>
            <li>
                <a href="../php/logout_faculty.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
            </li>
            </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>


    <!-- <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user"> -->
        <!-- <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
            </li>
        </ul> -->
    <!-- </div> -->
  </div>
</nav>



<main class="container mx-auto">
    <div>
        <?php
            $sql = "SELECT * FROM accounts WHERE id = {$_SESSION['id']}";
            $stmt = $conn->prepare($sql);
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $accounts = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            foreach ($accounts as $index => $acc):
        ?>
        
        


        <h1 class="text-2xl font-bold hidden">Hi, <?= $acc['first_name'] ?> <?= $acc['mi'] ?> <?= $acc['last_name'] ?></h1>
        <h1 id="user_course" class="text-2xl font-bold hidden"><?= $acc['course'] ?></h1>
       
        <h1 id="user_id" class="text-2xl font-bold hidden"><?= $_SESSION['id'] ?> </h1>
        <?php endforeach; ?>
    </div>
    <div class="w-[632px] mx-auto my-6">
    <div class="p-6 bg-white border rounded-lg mb-4">
            <div class="text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 mb-2">
                            <h1 class="font-semibold text-[#C51E3A] uppercase">information</h1>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">When evaluating teachers, honestly acknowledge their strengths, citing specific examples that impressed you, and express constructive concerns or suggestions for improvement. Thank you for your cooperation.</p>
                        </div>
            </div>

            <div class="p-6 bg-white border rounded-lg mb-4">
            <div class="text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 mb-2">
                            <p class="mt-1 text-md font-normal text-gray-900 dark:text-gray-400"><span class = "text-gray-400 uppercase text-xs">Name:</span> <?= $acc['first_name'] ?> <?= $acc['mi'] ?> <?= $acc['last_name'] ?></p>

                            <p class="mt-1 text-md font-normal text-gray-900 dark:text-gray-400"><span class = "text-gray-400 uppercase text-xs">DEPARTMENT|COURSE:</span> <?= $acc['course'] ?></p>
                        </div>
            </div>
        
        <form method="post" action="./process.php" id="myForm">
            <div class="p-6 bg-white border rounded-lg mb-4">
          
                <label for="selectOption" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option:</label>
                <select id="selectOption" name="selectOption" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="changeForm()" >
                    <option selected disabled hidden value="">Choose</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Peer to Peer">Peer to Peer</option>
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
    function changeForm() {
    var selectedOption = document.getElementById("selectOption").value;
    var formContainer = document.getElementById("formContainer");
    var courseText = document.getElementById("user_course").innerText;
    var courseid = document.getElementById("user_id").innerText;
    // Use AJAX to fetch form content from the server based on the selected option
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
        formContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "../php/getForm.php?option=" + selectedOption + "&course=" + encodeURIComponent(courseText) + "&id=" + encodeURIComponent(courseid), true);
    xhr.send();
    }
</script>
</body>
</html>