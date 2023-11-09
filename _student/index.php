<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/Technological_University_of_the_Philippines_Seal.svg.png" type="image/png">
    <link href="../dist/output.css" rel="stylesheet" />
    <title>TUP-V Evaluation</title>
</head>
<body class="bg-[#C51E3A]">
<div class="w-full h-[100%]">
    <nav class="bg-white w-full h-[90px] flex justify-center items-center">
        <img class="w-[70px]" src="../images/Technological_University_of_the_Philippines_Seal.svg.png" alt="tupv-logo">
    </nav>
    <div class="flex justify-center items-center my-10">
        <div class="bg-white max-w-2xl w-full rounded-lg">
            <div class="pt-10 pr-10 pl-10 pb-10 flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-[24px] tracking-wider">Evaluation Form</h3>
                </div>
            </div>   
            <div class="pb-10 pr-20 pl-20">
                <form action="" method="POST">
                    <h1 class="mb-4 font-semibold text-[#C51E3A] uppercase">information</h1>
                    <div class="mb-10">
                        <label for="name" class="font-medium block mb-2">Name of Evaluator <span class="ml-10 italic font-normal text-[#908787] text-[10px]"><span class="text-[#C51E3A]">*</span> required</span></label>
                        <input type="text" name="name" placeholder="Name" class="border-b border-black w-full focus:outline-none py-1">
                    </div>
                    <div class="mb-10">
                        <label for="studentTech" class="font-medium block mb-2">Student's Tech/Section<span class="ml-10 italic font-normal text-[#908787] text-[10px]"><span class="text-[#C51E3A]">*</span> required</span></label>
                        <select id="studentTech" class="w-full p-2 border border-black rounded-lg">
                            <option selected>Choose--</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="term" class="font-medium block mb-2">Term<span class="ml-10 italic font-normal text-[#908787] text-[10px]"><span class="text-[#C51E3A]">*</span> required</span></label>
                        <div class="flex items-center mb-2">
                            <input checked id="first-term" type="radio" value="" name="term" class="w-4 h-4">
                            <label for="first-term" class="ml-2 text-sm font-medium">1st Term/Semester</label>
                        </div>
                        <div class="flex items-center mb-2">
                            <input id="second-term" type="radio" value="" name="term" class="w-4 h-4">
                            <label for="second-term" class="ml-2 text-sm font-medium">2nd Term/Semester</label>
                        </div>
                        <div class="flex items-center">
                            <input id="third-term" type="radio" value="" name="term" class="w-4 h-4">
                            <label for="third-term" class="ml-2 text-sm font-medium">3rd Term/Semeter</label>
                        </div>
                    </div>
                    <div class="mb-10">
                        <label for="sy" class="font-medium block mb-2">School Year<span class="ml-10 italic font-normal text-[#908787] text-[10px]"><span class="text-[#C51E3A]">*</span> required</span></label>
                        <select id="sy" class="w-full p-2 border border-black rounded-lg">
                            <option selected>Choose--</option>
                            <option value="US">2020-2021</option>
                            <option value="US">2021-2022</option>
                            <option value="US">2022-2023</option>
                        </select>
                    </div>


                    <!-- ONE  -->
                    <div class="mb-10">
                        <h1 class="mb-4 font-semibold text-gray-900">I. COMMITMENT</h1>
                        <h3 class="mb-4 font-semibold text-gray-900">1. Demonstrate sensitivity to student's ability to absorb content information.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="demonstrate-one" class="mb-4">1</label>
                                    <input id="demonstrate-one" type="radio" value="1" name="demonstrate-sensitivity" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="demonstrate-two" class="mb-4">2</label>
                                    <input id="demonstrate-two" type="radio" value="2" name="demonstrate-sensitivity" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="demonstrate-three" class="mb-4">3</label>
                                    <input id="demonstrate-three" type="radio" value="3" name="demonstrate-sensitivity" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="demonstrate-four" class="mb-4">4</label>
                                    <input id="demonstrate-four" type="radio" value="4" name="demonstrate-sensitivity" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="demonstrate-five" class="mb-4">5</label>
                                    <input id="demonstrate-five" type="radio" value="5" name="demonstrate-sensitivity" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- TWO -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">2. Integrate sensitively my learning objectives with those of the students in a collaborative process.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-one" class="mb-4">1</label>
                                    <input id="integrate-one" type="radio" value="1" name="integrate-sensitively" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-two" class="mb-4">2</label>
                                    <input id="integrate-two" type="radio" value="2" name="integrate-sensitively" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-three" class="mb-4">3</label>
                                    <input id="integrate-three" type="radio" value="3" name="integrate-sensitively" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-four" class="mb-4">4</label>
                                    <input id="integrate-four" type="radio" value="4" name="integrate-sensitively" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-five" class="mb-4">5</label>
                                    <input id="integrate-five" type="radio" value="5" name="integrate-sensitively" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- THREE -->

                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">3. Make myself available to students beyond  office teaching hours. <h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="available-one" class="mb-4">1</label>
                                    <input id="available-one" type="radio" value="1" name="make-myself-available" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="available-two" class="mb-4">2</label>
                                    <input id="available-two" type="radio" value="2" name="make-myself-available" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="available-three" class="mb-4">3</label>
                                    <input id="available-three" type="radio" value="3" name="make-myself-available" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="available-four" class="mb-4">4</label>
                                    <input id="available-four" type="radio" value="4" name="make-myself-available" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="available-five" class="mb-4">5</label>
                                    <input id="available-five" type="radio" value="5" name="make-myself-available" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- FOUR -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">4. Coordinate student needs with internal and  external enabling groups.
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="coordinate-one" class="mb-4">1</label>
                                    <input id="coordinate-one" type="radio" value="1" name="coordinate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="coordinate-two" class="mb-4">2</label>
                                    <input id="coordinate-two" type="radio" value="2" name="coordinate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="coordinate-three" class="mb-4">3</label>
                                    <input id="coordinate-three" type="radio" value="3" name="coordinate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="coordinate-four" class="mb-4">4</label>
                                    <input id="coordinate-four" type="radio" value="4" name="coordinate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="coordinate-five" class="mb-4">5</label>
                                    <input id="coordinate-five" type="radio" value="5" name="coordinate-student" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- FIVE -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">5. Supplement available resources.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="supplement-one" class="mb-4">1</label>
                                    <input id="supplement-one" type="radio" value="1" name="supplement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="supplement-two" class="mb-4">2</label>
                                    <input id="supplement-two" type="radio" value="2" name="supplement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="supplement-three" class="mb-4">3</label>
                                    <input id="supplement-three" type="radio" value="3" name="supplement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="supplement-four" class="mb-4">4</label>
                                    <input id="supplement-four" type="radio" value="4" name="supplement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="supplement-five" class="mb-4">5</label>
                                    <input id="supplement-five" type="radio" value="5" name="supplement" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- KNOWLEDGE -->

                    <!-- {{-- One --}} -->
                    <div class="mb-10">
                        <h1 class="mb-4 font-semibold text-gray-900">II. KNOWLEDGE OF SUBJECT</h1>
                        <h3 class="mb-4 font-semibold text-gray-900">1. Explain the subject matter without completely  relying on the prescribed reading.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relying-on-the-prescribed" class="mb-4">1</label>
                                    <input id="relying-on-the-prescribed" type="radio" value="1" name="relying-on-the-prescribed" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relying-on-the-prescribed" class="mb-4">2</label>
                                    <input id="relying-on-the-prescribed" type="radio" value="2" name="relying-on-the-prescribed" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relying-on-the-prescribed" class="mb-4">3</label>
                                    <input id="relying-on-the-prescribed" type="radio" value="3" name="relying-on-the-prescribed" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relying-on-the-prescribed" class="mb-4">4</label>
                                    <input id="relying-on-the-prescribed" type="radio" value="4" name="relying-on-the-prescribed" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relying-on-the-prescribed" class="mb-4">5</label>
                                    <input id="relying-on-the-prescribed" type="radio" value="5" name="relying-on-the-prescribed" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Two --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">2. Explain subject matter with depth.
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="depth" class="mb-4">1</label>
                                    <input id="depth" type="radio" value="1" name="depth" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="depth" class="mb-4">2</label>
                                    <input id="depth" type="radio" value="2" name="depth" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="depth" class="mb-4">3</label>
                                    <input id="depth" type="radio" value="3" name="depth" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="depth" class="mb-4">4</label>
                                    <input id="depth" type="radio" value="4" name="depth" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="depth" class="mb-4">5</label>
                                    <input id="depth" type="radio" value="5" name="depth" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Three --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">3. Integrate topics discussed in the lesson and  relates the topic being discussed to concepts previously learned by the students in the same course.<h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-topics" class="mb-4">1</label>
                                    <input id="integrate-topics" type="radio" value="1" name="integrate-topics" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-topics" class="mb-4">2</label>
                                    <input id="integrate-topics" type="radio" value="2" name="integrate-topics" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-topics" class="mb-4">3</label>
                                    <input id="integrate-topics" type="radio" value="3" name="integrate-topics" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-topics" class="mb-4">4</label>
                                    <input id="integrate-topics" type="radio" value="4" name="integrate-topics" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="integrate-topics" class="mb-4">5</label>
                                    <input id="integrate-topics" type="radio" value="5" name="integrate-topics" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
<!--     
                    {{-- Four --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">4. Relate the subject matter to other pertinent  topics.	
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relate-the-subject" class="mb-4">1</label>
                                    <input id="relate-the-subject" type="radio" value="1" name="relate-the-subject" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relate-the-subject" class="mb-4">2</label>
                                    <input id="relate-the-subject" type="radio" value="2" name="relate-the-subject" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relate-the-subject" class="mb-4">3</label>
                                    <input id="relate-the-subject" type="radio" value="3" name="relate-the-subject" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relate-the-subject" class="mb-4">4</label>
                                    <input id="relate-the-subject" type="radio" value="4" name="relate-the-subject" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="relate-the-subject" class="mb-4">5</label>
                                    <input id="relate-the-subject" type="radio" value="5" name="relate-the-subject" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Five --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">5. Raise problems and issues relevant to the  topic(s) of discussion.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="raise-problems-and-issues" class="mb-4">1</label>
                                    <input id="raise-problems-and-issues" type="radio" value="1" name="raise-problems-and-issues" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="raise-problems-and-issues" class="mb-4">2</label>
                                    <input id="raise-problems-and-issues" type="radio" value="2" name="raise-problems-and-issues" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="raise-problems-and-issues" class="mb-4">3</label>
                                    <input id="raise-problems-and-issues" type="radio" value="3" name="raise-problems-and-issues" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="raise-problems-and-issues" class="mb-4">4</label>
                                    <input id="raise-problems-and-issues" type="radio" value="4" name="raise-problems-and-issues" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="raise-problems-and-issues" class="mb-4">5</label>
                                    <input id="raise-problems-and-issues" type="radio" value="5" name="raise-problems-and-issues" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- TEACHING FOR INDEPENDENT LEARNING -->

                    <!-- {{-- One --}} -->
                    <div class="mb-10">
                        <h1 class="mb-4 font-semibold text-gray-900">III. TEACHING FOR INDEPENDENT LEARNING</h1>
                        <h3 class="mb-4 font-semibold text-gray-900">1. Create teaching strategies that allow students to practice using concepts they need to understand.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-teaching" class="mb-4">1</label>
                                    <input id="create-teaching" type="radio" value="1" name="create-teaching" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-teaching" class="mb-4">2</label>
                                    <input id="create-teaching" type="radio" value="2" name="create-teaching" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-teaching" class="mb-4">3</label>
                                    <input id="create-teaching" type="radio" value="3" name="create-teaching" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-teaching" class="mb-4">4</label>
                                    <input id="create-teaching" type="radio" value="4" name="create-teaching" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-teaching" class="mb-4">5</label>
                                    <input id="create-teaching" type="radio" value="5" name="create-teaching" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Two --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">2. Provide exercises which develop analytical  thinking among the students.
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="provide-exercises" class="mb-4">1</label>
                                    <input id="provide-exercises" type="radio" value="1" name="provide-exercises" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="provide-exercises" class="mb-4">2</label>
                                    <input id="provide-exercises" type="radio" value="2" name="provide-exercises" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="provide-exercises" class="mb-4">3</label>
                                    <input id="provide-exercises" type="radio" value="3" name="provide-exercises" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="provide-exercises" class="mb-4">4</label>
                                    <input id="provide-exercises" type="radio" value="4" name="provide-exercises" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="provide-exercises" class="mb-4">5</label>
                                    <input id="provide-exercises" type="radio" value="5" name="provide-exercises" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Three --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">3. Enhance students' self-esteem through the  proper recognition of their abilities.<h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="enhance-student" class="mb-4">1</label>
                                    <input id="enhance-student" type="radio" value="1" name="enhance-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="enhance-student" class="mb-4">2</label>
                                    <input id="enhance-student" type="radio" value="2" name="enhance-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="enhance-student" class="mb-4">3</label>
                                    <input id="enhance-student" type="radio" value="3" name="enhance-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="enhance-student" class="mb-4">4</label>
                                    <input id="enhance-student" type="radio" value="4" name="enhance-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="enhance-student" class="mb-4">5</label>
                                    <input id="enhance-student" type="radio" value="5" name="enhance-student" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>

                    <!-- {{-- Four --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">4. Allow students to create their own course with  the use of well-defined objectives and external enabling groups.	
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-course" class="mb-4">1</label>
                                    <input id="allow-students-course" type="radio" value="1" name="allow-students-course" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-course" class="mb-4">2</label>
                                    <input id="allow-students-course" type="radio" value="2" name="allow-students-course" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-course" class="mb-4">3</label>
                                    <input id="allow-students-course" type="radio" value="3" name="allow-students-course" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-course" class="mb-4">4</label>
                                    <input id="allow-students-course" type="radio" value="4" name="allow-students-course" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-course" class="mb-4">5</label>
                                    <input id="allow-students-course" type="radio" value="5" name="allow-students-course" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Five --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">5. Allow students to make their own decisions and be accountable for their performance.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-decisions" class="mb-4">1</label>
                                    <input id="allow-students-decisions" type="radio" value="1" name="allow-students-decisions" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-decisions" class="mb-4">2</label>
                                    <input id="allow-students-decisions" type="radio" value="2" name="allow-students-decisions" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-decisions" class="mb-4">3</label>
                                    <input id="allow-students-decisions" type="radio" value="3" name="allow-students-decisions" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-decisions" class="mb-4">4</label>
                                    <input id="allow-students-decisions" type="radio" value="4" name="allow-students-decisions" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="allow-students-decisions" class="mb-4">5</label>
                                    <input id="allow-students-decisions" type="radio" value="5" name="allow-students-decisions" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
                    
                    <!-- MANAGEMENT OF LEARNING -->

                    <!-- {{-- One --}} -->
                    <div class="mb-10">
                        <h1 class="mb-4 font-semibold text-gray-900">IV. MANAGEMENT OF LEARNING</h1>
                        <h3 class="mb-4 font-semibold text-gray-900">1. Create opportunities for extensive contribution of students (e.g. breaks class into dyads, triads, or buzz/task groups).</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-opportunities" class="mb-4">1</label>
                                    <input id="create-opportunities" type="radio" value="1" name="create-opportunities" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-opportunities" class="mb-4">2</label>
                                    <input id="create-opportunities" type="radio" value="2" name="create-opportunities" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-opportunities" class="mb-4">3</label>
                                    <input id="create-opportunities" type="radio" value="3" name="create-opportunities" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-opportunities" class="mb-4">4</label>
                                    <input id="create-opportunities" type="radio" value="4" name="create-opportunities" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="create-opportunities" class="mb-4">5</label>
                                    <input id="create-opportunities" type="radio" value="5" name="create-opportunities" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Two --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">2. Assume roles as facilitator, resource, coach,  inquisitor, integrator, referee in drawing students to contribute to knowledge and understanding of the concepts at hand.
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="assume-roles" class="mb-4">1</label>
                                    <input id="assume-roles" type="radio" value="1" name="assume-roles" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="assume-roles" class="mb-4">2</label>
                                    <input id="assume-roles" type="radio" value="2" name="assume-roles" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="assume-roles" class="mb-4">3</label>
                                    <input id="assume-roles" type="radio" value="3" name="assume-roles" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="assume-roles" class="mb-4">4</label>
                                    <input id="assume-roles" type="radio" value="4" name="assume-roles" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="assume-roles" class="mb-4">5</label>
                                    <input id="assume-roles" type="radio" value="5" name="assume-roles" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Three --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">3. Design and implement learning conditions  and experience that promote healthy exchange and/or confrontations.<h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="design-and-implement" class="mb-4">1</label>
                                    <input id="design-and-implement" type="radio" value="1" name="design-and-implement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="design-and-implement" class="mb-4">2</label>
                                    <input id="design-and-implement" type="radio" value="2" name="design-and-implement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="design-and-implement" class="mb-4">3</label>
                                    <input id="design-and-implement" type="radio" value="3" name="design-and-implement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="design-and-implement" class="mb-4">4</label>
                                    <input id="design-and-implement" type="radio" value="4" name="design-and-implement" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="design-and-implement" class="mb-4">5</label>
                                    <input id="design-and-implement" type="radio" value="5" name="design-and-implement" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Four --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">4. Structure/re-structure learning and teaching- learning context to enhance attainment of collective learning objectives.		
                        </h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="structure-learning" class="mb-4">1</label>
                                    <input id="structure-learning" type="radio" value="1" name="structure-learning" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="structure-learning" class="mb-4">2</label>
                                    <input id="structure-learning" type="radio" value="2" name="structure-learning" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="structure-learning" class="mb-4">3</label>
                                    <input id="structure-learning" type="radio" value="3" name="structure-learning" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="structure-learning" class="mb-4">4</label>
                                    <input id="structure-learning" type="radio" value="4" name="structure-learning" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="structure-learning" class="mb-4">5</label>
                                    <input id="structure-learning" type="radio" value="5" name="structure-learning" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>
    
                    <!-- {{-- Five --}} -->
                    <div class="mb-10">
                        <h3 class="mb-4 font-semibold text-gray-900">5. Stimulate students' desire and interest to learn more about the subject matter.</h3>
                        <ul class="flex justify-between items-center">
                            <li class="text-[#C51E3A]">Poor</li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="stimulate-student" class="mb-4">1</label>
                                    <input id="stimulate-student" type="radio" value="1" name="stimulate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="stimulate-student" class="mb-4">2</label>
                                    <input id="stimulate-student" type="radio" value="2" name="stimulate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="stimulate-student" class="mb-4">3</label>
                                    <input id="stimulate-student" type="radio" value="3" name="stimulate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="stimulate-student" class="mb-4">4</label>
                                    <input id="stimulate-student" type="radio" value="4" name="stimulate-student" class="">
                                </div>
                            </li>
                            <li>
                                <div class="flex flex-col items-center justify-center">
                                    <label for="stimulate-student" class="mb-4">5</label>
                                    <input id="stimulate-student" type="radio" value="5" name="stimulate-student" class="">
                                </div>
                            </li>
                            <li class="text-[#C51E3A]">Outstanding</li>
                        </ul>
                    </div>


                    <!-- COMMENT -->
                    <div class="w-full mb-6">
                        <label for="comment" class="block mb-4 font-bold">Comments: (Optional)</label>
                        <textarea name="comment" id="" cols="20" rows="10" placeholder="Your answer" class="border border-black p-5 rounded-md w-full"></textarea>
                    </div>
                    <p class="text-lg font-bold uppercase text-center mb-6">thank you for evaluating!</p>
                    
                </form>
            </div>  
        </div>
    </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>