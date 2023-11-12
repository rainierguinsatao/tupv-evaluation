
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <link href="../dist/output.css" rel="stylesheet">
    <title>TUP-V Evaluation | Faculty</title>
</head>
<body>



<div class="flex">
  <div class="w-[55%] h-screen bg-gradient-to-r from-[#C51E3A] to-[#7E7E7E] hidden lg:block">
      <div class="flex justify-center items-center h-screen">
          <img src="../images/girl_key.svg" class="w-[700px] container mx-auto " alt="Phone image" />
      </div>
  </div>
  <div class="w-full lg:w-[45%] h-screen flex justify-center items-center">
      <div class="relative lg:border-none border border-gray-200 shadow-lg lg:shadow-none rounded-md w-full max-w-sm p-[20px] md:p-[0px] md:max-w-md bg-white flex flex-col">
          <div class="w-full py-[32px] flex flex-col items-center">
              <img class="w-[110px] mb-[24px]" src="../images/Technological_University_of_the_Philippines_Seal.svg.png" alt="tupv-logo">
              
              <?php 
            include "../_admin/alert.php";
            ?>
              <h3 class="font-bold text-[24px] text-[#C51E3A] mb-[24px]">FACULTY LOGIN</h3>
              <form action="../php/login_faculty.php" method="post" class="w-[70%]">
                <div class="w-full">
                  <div class="mb-4">
                    <label class="block mb-2 font-medium" for="email">
                      Email:
                    </label>
                    <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker" id="email" name="email" type="email" placeholder="Enter Email">
                  </div>
                  <div class="mb-4">
                    <label class="block mb-2 font-medium" for="password">
                      Password:
                    </label>
                    <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="Enter Password">
                  </div>
                  <button class="w-full bg-[#C51E3A] text-white rounded-full py-2 px-3 hover:bg-white border hover:border-[#C51E3A] hover:text-[#C51E3A] duration-200" type="submit" name="loginfacultybtn">Login</button>
                  <button class="w-full mt-3 text-[#C51E3A]  rounded-full py-2 px-3 duration-200" type="submit" name="loginstud">Student</button>
                  <span class="absolute bottom-[-70px] left-[25%] right-[25%] text-center inline-block align-baseline  text-sm text-blue hover:text-blue-darker">No account?<a class="font-medium" href="register.php">
                    Register Here! 
                 </a></span>
                  
                </div>
              </form>
            </div>
      </div>
  </div>
</div>



<?php
if (isset($_SESSION['showModal']) && $_SESSION['showModal']) {
    ?>
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Evaluation is closed
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    The evaluation is currently closed. Please check back later.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".bg-red-600").click(function() {
                $(".fixed").hide();
            });
        });
    </script>
    <?php
    $_SESSION['showModal'] = false;
}

if (isset($_SESSION['showAlert']) && $_SESSION['showAlert']) {
    ?>
    <div class="alert alert-danger" role="alert">
        Invalid email or password. Please try again.
    </div>
    <?php
    $_SESSION['showAlert'] = false;
}
?>


<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>