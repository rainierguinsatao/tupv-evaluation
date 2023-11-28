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
        <button type="button" class="flex mx-3 text-sm  rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                  <span class="sr-only">Open user menu</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
</svg>

              </button>
              <!-- Dropdown menu -->
              <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
               
                  <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                     
                      <li>
                      <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-dark pl-3" type="button">
                Change password
                </button>
                                    </li>


       
                  </ul>
                  <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                      <li>
                          <a href="#" onclick="confirmLogout()" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
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

        
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Change Password
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
            
            <form action="./update.php" method="POST" id="editAccount">
            <input type="hidden" name="userId" value="<?php echo $userId ?>">

            <div class="relative z-0 w-full mb-2 group" id="passwordFields">
                <input type="password" name="password" id="edituserpass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="accountPassword" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>

            <div class="relative z-0 w-full group" id="confirmPasswordFields">
                <input type="password" name="confirm_password" id="confirm-Password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                <label for="confirmPassword" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6" required>Confirm Password</label>
            </div>

            <p id="password-match-error-edit" class="text-xs mt-2 text-red-500 hidden">Passwords do not match.</p>

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="editAccount" data-modal-hide="static-modal"  onclick="confirmPasswordChange()"  type="submit" name="updateFaculty" class="text-main duration-200 hover:text-red-500 hover:bg-main font-medium rounded-lg text-sm px-5 py-2.5 text-center">Change Password</button>

                <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white rounded-lg  text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </form>

                
            </div>
        </div>
    </div>
</div>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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



    $(document).ready(function () {

var passwordFields = $("#passwordFields");
var confirmPasswordFields = $("#confirmPasswordFields");
var password = $("#edituserpass");
var confirmPassword = $("#confirm-Password");
var passwordMatchError = $("#password-match-error-edit");
var changePasswordBtn = $("#changePasswordBtn"); // Add this line

var editAccountForm = $("#editAccount");

changePasswordBtn.on('click', function () {
    passwordFields.toggleClass('hidden');
    confirmPasswordFields.toggleClass('hidden');
});

password.on('keyup', checkPasswordMatch);
confirmPassword.on('keyup', checkPasswordMatch);

function checkPasswordMatch() {
    if (password.val() === confirmPassword.val()) {
        passwordMatchError.addClass("hidden");
    } else {
        passwordMatchError.removeClass("hidden");
    }
}

});


function confirmPasswordChange() {
        // Display a confirmation dialog
        var isConfirmed = confirm("Are you sure you want to change your password?");
        
        // If the user confirms, proceed with form submission
        if (isConfirmed) {
            // You can add additional logic here if needed
            alert("Password changed successfully!"); // Display an alert
        } else {
            // If the user cancels, prevent the form submission
            event.preventDefault();
        }
    }
</script>
</body>
</html>