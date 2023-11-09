<?php 
    include '../db/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <link href="../dist/output.css" rel="stylesheet">
    <title>ADMIN | Evaluation</title>
</head>
<body>
     <div class="flex">
        <div class="w-[55%] h-screen bg-gradient-to-r from-[#C51E3A] to-[#7E7E7E] hidden lg:block">
            <div class="flex justify-center items-center h-screen">
                <img src="../images/girl_key.svg" class="w-[700px] container mx-auto " alt="Phone image" />
            </div>
        </div>
        <div class="w-full lg:w-[45%] h-screen flex justify-center items-center">
            <div class="relative w-full p-[20px] md:p-[0px] bg-white flex flex-col">
                <div class="mb-[32px] w-full flex flex-col items-center">
                    <img class="w-[110px] mb-[24px]" src="../images/Technological_University_of_the_Philippines_Seal.svg.png" alt="tupv-logo">
                    <h3 class="font-bold text-[24px] text-[#C51E3A] mb-[24px]">ADMIN LOGIN</h3>
                    <!-- {{-- <div class="flex flex-row justify-between items-center space-x-[24px]">
                        <a href="" class="border bg-[#C51E3A] rounded-full text-white py-[6px] px-[33px]">Student</a>
                        <a href="" class="border border-[#C51E3A] text-[#C51E3A] rounded-full py-[6px] px-[33px] hover:text-white hover:bg-[#C51E3A]">Faculty</a>
                    </div> --}} -->
                    <form id="login-form" action="../php/login.php" method="post" class="w-full max-w-sm">
                      <div class="w-full">
                        <div class="mb-4">
                          <label class="block mb-2 font-medium" for="username">
                            Email:
                          </label>
                          <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker" id="email" name="email" type="email" placeholder="Enter Email">
                        </div>
                        <div class="mb-4">
                          <label class="block mb-2 font-medium" for="password">
                            Password:
                          </label>
                          <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" name="password" type="password" placeholder="Enter Password">
                          <!-- {{-- <p class="text-red text-xs italic">Please choose a password.</p> --}} -->
                        </div>
                        <button form="login-form" class="w-full bg-[#C51E3A] text-white rounded-full py-2 px-3 hover:bg-white border hover:border-[#C51E3A] hover:text-[#C51E3A] duration-200" type="submit" name="loginbtn">Login</button>
                        
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
    
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>