<?php
    include '../php/session_admin.php';
    include '../db/conn.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $deptName = $_POST['dept_name'];


    // Update user information in the database
    $sql = "INSERT INTO departmenttbl SET dept = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $deptName);

    if ($stmt->execute()) {
        header("location: ./settings.php");
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
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <title>Document</title>
</head>
<body>
<?php
include './adminheader.php';
?>
<div class="sm:ml-64 mt-14">
    <div class="p-4">
        <h1 class = "font-medium text-gray-600 my-10">
            Add New Department
        </h1> 
        
        <div class="w-full border border-gray-200 rounded-lg shadow py-7 px-6">
            <form id="addSettings" action="" method="post">
                <div class="flex gap-6 pt-2">
        



                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="dept_name" id="floating_course_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"/>
                        <label for="floating_course_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Course Name</label>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                </div>
            </form>
            <div class="flex">
                <div class="mx-auto">
                    <button form="addSettings" type="submit" class="text-gray-900 txt hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Add</button>
                

                    <a href = "./settings.php" type="submit" class="hover:text-gray-900 txt hover:bg-white text-white border border-gray-800 bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2dark:focus:ring-gray-800">Cancel</a>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
</body>
</html>