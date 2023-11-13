<?php
    include '../php/session_admin.php';
    include '../db/conn.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $deptName = $_POST['dept_name'];
    $courseName = $_POST['course_name'];

    // Update user information in the database
    $sql = "UPDATE courses_tbl SET courseName = ?, dept = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $courseName, $deptName, $id);

    if ($stmt->execute()) {
        header("location: ./settings.php");
        echo "Settings information updated successfully";
    } else {
        echo "Error updating Settings information: " . $stmt->error;
    }
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user data from the database based on the user ID
    $sql = "SELECT * FROM courses_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Display a form for editing user information
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include './adminheader.php';
?>
<div class="sm:ml-64 mt-14">
    <div class="p-4">
        <h1 class = "font-medium text-gray-600 my-10">
            Editing Information of <span class = "font-semibold text-gray-900"><?php echo $user['dept']; ?> - <?= $user['courseName'];?></span>
        </h1> 
        
        <div class="w-full border border-gray-200 rounded-lg shadow py-7 px-6">
            <form id="updateSettings" action="" method="post">
                <div class="flex gap-6 pt-2">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="dept_name" id="floating_dept_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value = "<?php echo $user['dept']; ?>" />
                        <label for="floating_dept_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Department</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="course_name" id="floating_course_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value = "<?php echo $user['courseName']; ?>" />
                        <label for="floating_course_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Course Name</label>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                </div>
            </form>
            <div class="flex ">
                <div class="mx-auto">
                    <button form="updateSettings" type="submit" class="text-gray-900 txt hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Update</button>
                

                    <a href = "./settings.php" type="submit" class="hover:text-gray-900 txt hover:bg-white text-white border border-gray-800 bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2dark:focus:ring-gray-800">Cancel</a>
                </div>
                
            </div>
        </div>
    </div>
    
</div>
</body>
</html>
<?php
    } else {
        echo "User not found";
    }
} else {
    echo "User ID not provided";
}
// Include necessary HTML structure and header/footer files
// ...
?>