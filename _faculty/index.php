
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
  <div class="w-[50%] h-screen hidden lg:block">
      <div class="flex justify-center items-center h-screen">
 
        <img class="w-[90%] mx-auto" src="../images/login.png" alt="tupv-logo">


          
   
        
      </div>
  </div>
  <div class="w-full lg:w-[50%] h-screen flex justify-center items-center">
      <div class="relative   border border-gray-200  shadow  rounded-md w-full max-w-sm p-[20px] md:p-[0px] md:max-w-md bg-white flex flex-col">
          <div class="w-full py-[32px] flex flex-col items-center">
          <img class="w-[20%] mb-5 mx-auto" src="../images/Technological_University_of_the_Philippines_Seal.svg.png" alt="tupv-logo">
      <img src="../images/LOGO.png" class="w-[50%] mb-5 container mx-auto " alt="Phone image" />
             
              <form action="../php/login_faculty.php" method="post" class="w-[70%]">
                <div class="w-full">
                  <div class="mb-4">
                  <h3 class="font-semibold text-rigt text-md text-dark mt-4 mb-1">Faculty Login</h3>
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
                  <button class="w-full mt-3 text-[#C51E3A]  border hover:border-red-600 rounded-full py-2 px-3 duration-200" type="submit" name="loginstud">Student</button>

                
                  <a href="../_admin/index.php" class=" mt-5 flex mx-auto text-center  hover:text-red-700 hoer:text-underlined  text-sm text-blue hover:text-blue-darker">Login as Admin </a>
                  
                </div>
              </form>
            </div>
      </div>
  </div>
</div>





<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>