<?php 
    include '../php/session_admin.php';
    include '../db/conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <title> USER Settings | Evaluation</title>
</head>
<body>
<?php
    include './adminheader.php';
?>

<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">

  <div class = "m-4 flex">
    <h1 class="text-gray-800 font-bold text-xl"><span class = "text-red-800">U</span>ser <span class = "text-red-800">S</span>ettings</h1>
  </div>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            
    <table id="myTable" class="w-full text-sm text-left p-3 rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 capitalized bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    First Name
                </th>
                <th scope="col" class="px-6 py-3">
                Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Middle Inital
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Password
                </th>
                <th scope="col" class="px-6 py-3">
                    Faculty Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Department
                </th>
                <th scope="col" class="px-6 py-3">
                    Course
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only"></span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only"></span>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php 
    $sql = "SELECT * FROM accounts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = array();  
    $result = $stmt->get_result(); 

    while ($row = $result->fetch_assoc()): ?>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['first_name']; ?></th>
            <td class="px-6 py-4"><?= $row['last_name']; ?></td>
            <td class="px-6 py-4"><?= $row['mi']; ?></td>
            <td class="px-6 py-4"><?= $row['email']; ?></td>
            <td class="px-6 py-4"><?= $row['password']; ?></td>
            <td class="px-6 py-4"><?= $row['faculty_type']; ?></td>
            <td class="px-6 py-4"><?= $row['dept']; ?></td>
            <td class="px-6 py-4"><?= $row['course']; ?></td>
            <td class="px-6 py-4">
            <a href="edit_user.php?id=<?= $row['id']; ?>" class="font-medium text-green-600 dark:text-blue-500 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
              </svg> </a>
            </td>

            <td class="px-6 py-4">
            <a href="#" class="font-medium text-red-700 dark:text-blue-500 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
        </svg> 

              </a>
            </td>
        </tr>
    <?php endwhile; ?>
            
        </tbody>
    </table>
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
</script>


</body>
</html>