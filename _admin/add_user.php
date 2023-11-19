<?php
    include '../php/session_admin.php';
    include '../db/conn.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $mi = $_POST['mi'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $facultyType = $_POST['ftype'];
    $dept = $_POST['dept'];
    $type = "user";
    $course = $_POST['course'];
    $pending = "3";

    // Update user information in the database
    $sql = "INSERT INTO accounts SET first_name = ?, last_name = ?,  mi = ?,  email = ?,  password = ?, type = ?, faculty_type = ?,  dept = ?,  course = ?, switch = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $firstName, $lastName, $mi, $email, $password, $type, $facultyType, $dept, $course, $pending);

    if ($stmt->execute()) {
        header("location: ./user.php");
        echo "Settings information Added successfully";
    } else {
        echo "Error Adding Settings information: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <title>Add New User</title>
</head>
<body>
<?php
include './adminheader.php';
?>
      <div class="p-4 sm:ml-64">
                <div class="p-4 mt-14">
                    <!-- Your HTML form for editing user information -->

                    <h1 class = "font-medium text-gray-600 my-10">
            Add New Department and Course.
        </h1>
          
                    <form method="POST" action="" class = "p-12 border border-gray-200 rounded-lg shadow">
                 
                     
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class=" p-6 m-5">

         
            <div class="grid md:grid-cols-3 md:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="mi" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Initial</label>
    </div>
</div>

<div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="email" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="password" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
    </div>
</div>

<div class="grid md:grid-cols-3 md:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <label for="editcrsdept" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
        <select name="dept" id="editcrsdept" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Select Department</option>
            <?php
            $sql = "SELECT DISTINCT `dept` FROM courses_tbl";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) :
                ?>
                <option value="<?php echo $row['dept']; ?>"><?php echo $row['dept']; ?></option>

            <?php endwhile; ?>
        </select>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <label for="editcrsdept" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
        <select name="course" id="editcrsdept" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Select Course</option>

        </select>
    </div>

    <div class="relative z-0 w-full mb-6 group">
        <label for="editcrsdept" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Faculty Type</label>
        <select name="ftype" id="editcrsdept" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Select Faculty Type</option>
            <option value="supervisor">supervisor</option>
            <option value="faculty">faculty</option>
        </select>
    </div>
</div>






            </div>             
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                      
                            
                        <div class="flex ">
                            <div class="mx-auto">
                            <button type="submit" class="text-gray-900 txt hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">add</button>
                          

                            <a href = "./user.php" type="submit" class="hover:text-gray-900 txt hover:bg-white text-white border border-gray-800 bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2dark:focus:ring-gray-800">Cancel</a>
                            </div>
                            
                        </div>
                       
                        </div>
                    </form>
                </div>
             
                </div>
</body>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
     document.addEventListener("DOMContentLoaded", function () {
        // Get the department dropdown and course dropdown
        var departmentDropdown = document.getElementById('editcrsdept');
        var courseDropdown = document.getElementsByName('course')[0]; // Assuming there's only one element with the name 'course'

        // Add an event listener to the department dropdown
        departmentDropdown.addEventListener('change', function () {
            // Get the selected department value
            var selectedDept = departmentDropdown.value;

            // Use AJAX to fetch courses based on the selected department
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './get_courses.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            // Send the selected department as a parameter
            xhr.send('dept=' + selectedDept);

            // Handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the course dropdown options
                    courseDropdown.innerHTML = xhr.responseText;
                }
            };
        });
    });
</script>
</html>