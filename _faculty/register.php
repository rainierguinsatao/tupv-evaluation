<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="w-full bg-gradient-to-r from-[#C51E3A] to-[#7E7E7E]">
    <div class="w-full max-w-md mx-auto">
        <div class="w-full h-screen flex flex-col justify-center items-center">
            <div class="w-full p-10 bg-gray-50 border border-gray-200 rounded">
                <h3 class="font-bold text-[24px] text-[#C51E3A] mb-[24px] text-center uppercase">Register</h3>
                <form action="../php/register_faculty.php" method="post" class="w-full">
                    <div class="mb-4">
                        <label class="block mb-2 font-medium" for="name">
                        Name
                        </label>
                        <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker"  id="name" name="name" type="name" placeholder="Enter name">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-medium" for="email">
                        Email
                        </label>
                        <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker" id="email" name="email" type="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-medium" for="password">
                        Password
                        </label>
                        <input class="border border-[#C51E3A] rounded w-full py-2 px-3 text-grey-darker" id="password"  name="password" type="password" placeholder="Enter password">
                    </div>
                    <button class="w-full bg-[#C51E3A] text-white rounded-full py-2 px-3 hover:bg-white border hover:border-[#C51E3A] hover:text-[#C51E3A] duration-200" type="submit" name="registerbtn">Register</button>
                    
                </form>
                
            </div>
            <span class="text-center inline-block align-baseline  text-sm text-white hover:text-blue-darker mt-6">Already have an account?<a class="font-medium text-black" href="index.php">
                Login Here! 
             </a></span>
        </div>
    </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>