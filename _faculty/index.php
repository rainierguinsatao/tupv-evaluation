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
                  <span class="absolute bottom-[-70px] left-[25%] right-[25%] text-center inline-block align-baseline  text-sm text-blue hover:text-blue-darker">No account?<a class="font-medium" href="register.php">
                    Register Here! 
                 </a></span>
                  
                </div>
              </form>
            </div>
      </div>
  </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>