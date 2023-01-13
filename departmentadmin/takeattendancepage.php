<?php
    include("../connection.php");
    include("departmentadminsession.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">

        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>takeattendancepage</title>
    </head>

    <body>
        <div class='header'>
        <h1>Take Student Attendance</h1><br>
        <?php
            echo "Welcome <b>".$session_department_admin_email."</b><br>";
            echo "Your Department is  <b>".$session_department_admin_department."</b><br><br>";
        ?>
        </div>
        <a class='back' href="departmentadminhomepage.php">Back</a>
        <div class="admin_radiobutton">
            <input type="radio" value="lecture" id="lecture" name="anyone" onclick="Lecture();">Lecture
            <input type="radio" value="practical" id="practical" name="anyone" onclick="Practical();">Practical
            <input type="radio" value="tutorial" id="tutorial" name="anyone" onclick="Tutorial();">Tutorial
        </div>

        <div class="lecture_notification hide">
            <h2>You are taking LECTURE attendance</h2>
        </div>
        <div class="practical_notification hide">
            <h2>You are taking PRACTICAL attendance</h2>
        </div>
        <div class="tutorial_notification hide">
            <h2>You are taking TUTORIAL attendance</h2>
        </div>

        <!--"first_year","second_year","third_year","fourthyear" id is only
         given to change the backgrounf color of button through javascript and nothing else -->

        <div class='buttons hide'>
        <button id="first_year" onclick="Firstyear();">First year</button>
        <button id="second_year" onclick="Secondyear();">Second year</button>
        <button id="third_year" onclick="Thirdyear();">Third year</button>
        <button id="fourth_year" onclick="Fourthyear();">Fourth year</button>
        
        <div id="refresh_div">
        <div class="hide" id="firstyear">
            <button id="firstsem" value="First semester" onclick="Firstsemseter();">First Semester</button>
            <button id="secondsem" value="Second semester" onclick="Secondsemseter();">Second Semester</button>
        </div>
        <div class="hide" id="secondyear">
            <button id="thirdsem" value="Third semester" onclick="Thirdsemseter();">Third Semester</button>
            <button id="fourthsem" value="Fourth semester" onclick="Fourthsemseter();">Fourth Semester</button>
        </div>
        <div class="hide" id="thirdyear">
            <button id="fifthsem" value="Fifth semester" onclick="Fifthsemseter();">Fifth Semester</button>
            <button id="sixthsem" value="Sixth semester" onclick="Sixthsemseter();">Sixth Semester</button>
        </div>
        <div class="hide" id="fourthyear">
            <button id="seventhsem" value="Seventh semester" onclick="Seventhsemseter();">Seventh Semester</button>
            <button id="eighthsem" value="Eighth semester" onclick="Eighthsemseter();">Eighth Semester</button>
        </div>

        <div class="teachersubject"></div>

        <div class="subjectteacher"></div>

        <div class="semstudent"></div>
        </div>

        </div>
        <script type="text/javascript">

            var which_type;
            function Lecture()
            {
                which_type = document.getElementById("lecture").value;
                console.log(which_type);
                $("#refresh_div").load(" #refresh_div");
                
                $('.buttons').removeClass("hide");
                $('.lecture_notification').removeClass("hide");
                $('.practical_notification').addClass("hide");
                $('.tutorial_notification').addClass("hide");
            }
            function Practical()
            {
                which_type = document.getElementById("practical").value;
                console.log(which_type);
                $("#refresh_div").load(" #refresh_div"); 

                $('.buttons').removeClass("hide");
                $('.lecture_notification').addClass("hide");
                $('.practical_notification').removeClass("hide");
                $('.tutorial_notification').addClass("hide");
            }
            function Tutorial()
            {
                which_type = document.getElementById("tutorial").value;
                console.log(which_type);
                $("#refresh_div").load(" #refresh_div");

                $('.buttons').removeClass("hide");
                $('.lecture_notification').addClass("hide");
                $('.practical_notification').addClass("hide");
                $('.tutorial_notification').removeClass("hide");
            }



            function Firstyear()
            {
                document.getElementById("first_year").style.backgroundColor = "yellow";
                document.getElementById("second_year").style.backgroundColor = "#5cb85c";
                document.getElementById("third_year").style.backgroundColor = "#5cb85c";
                document.getElementById("fourth_year").style.backgroundColor = "#5cb85c";
                
                $('#firstyear').removeClass("hide");
                $('#secondyear').addClass("hide");
                $('#thirdyear').addClass("hide");
                $('#fourthyear').addClass("hide");

            }
            function Secondyear()
            {
                document.getElementById("first_year").style.backgroundColor = "#5cb85c";
                document.getElementById("second_year").style.backgroundColor = "yellow";
                document.getElementById("third_year").style.backgroundColor = "#5cb85c";
                document.getElementById("fourth_year").style.backgroundColor = "#5cb85c";
                
                $('#firstyear').addClass("hide");
                $('#secondyear').removeClass("hide");
                $('#thirdyear').addClass("hide");
                $('#fourthyear').addClass("hide");
            }
            function Thirdyear()
            {
                document.getElementById("first_year").style.backgroundColor = "#5cb85c";
                document.getElementById("second_year").style.backgroundColor = "#5cb85c";
                document.getElementById("third_year").style.backgroundColor = "yellow";
                document.getElementById("fourth_year").style.backgroundColor = "#5cb85c";
                
                $('#firstyear').addClass("hide");
                $('#secondyear').addClass("hide");
                $('#thirdyear').removeClass("hide");
                $('#fourthyear').addClass("hide");
            }
            function Fourthyear()
            {
                document.getElementById("first_year").style.backgroundColor = "#5cb85c";
                document.getElementById("second_year").style.backgroundColor = "#5cb85c";
                document.getElementById("third_year").style.backgroundColor = "#5cb85c";
                document.getElementById("fourth_year").style.backgroundColor = "yellow";
                
                $('#firstyear').addClass("hide");
                $('#secondyear').addClass("hide");
                $('#thirdyear').addClass("hide");
                $('#fourthyear').removeClass("hide");
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */
            
            function Firstsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "yellow";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("firstsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Secondsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "yellow";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("secondsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Thirdsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "yellow";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("thirdsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Fourthsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "yellow";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("fourthsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Fifthsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "yellow";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("fifthsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Sixthsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "yellow";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
   
                var sem = document.getElementById("sixthsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Seventhsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "yellow";
                document.getElementById("eighthsem").style.backgroundColor = "#5cb85c";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("seventhsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve subject name of that particular semester */

            function Eighthsemseter()
            {
                document.getElementById("firstsem").style.backgroundColor = "#5cb85c";
                document.getElementById("secondsem").style.backgroundColor = "#5cb85c";
                document.getElementById("thirdsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fourthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("fifthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("sixthsem").style.backgroundColor = "#5cb85c";
                document.getElementById("seventhsem").style.backgroundColor = "#5cb85c";
                document.getElementById("eighthsem").style.backgroundColor = "yellow";

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                var sem = document.getElementById("eighthsem").value;
                console.log(sem);
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksemester:sem,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".teachersubject").html(data);
                        }
                        else
                        {
                            $(".teachersubject").html(data);
                        }
                    }
                });
            }

/* Sending data to teacherdata.php to retrieve teacher name of that particular subject */

            function Checksubject(subject)
            {
                
                $('.change_button_color').addClass("change_color");
                var sub = subject;
                //console.log(sub);

                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }

                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {checksubject:sub,postsubjecttype:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".subjectteacher").html(data);
                        }
                        else
                        {
                            $(".subjectteacher").html(data);
                        }
                    }
                });
            }

            function Checkteachersemester1(semester,teacher,subject)
            {
                /*
                var subject_type1 = document.getElementById("lecture").value;
                var subject_type2 = document.getElementById("practical").value;
                var subject_type3 = document.getElementById("tutorial").value; 
                */
                if(which_type=="lecture")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="practical")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                if(which_type=="tutorial")
                {
                    subject_type = which_type;
                    console.log(subject_type); 
                }
                var sem = semester;
                var teach = teacher;
                var sub = subject;
                console.log(sem);
                console.log(teach);
                console.log(subject);
                //console.log(subject_type);
                
                $.ajax({
                    url : "teacherdata.php",
                    method : "POST",
                    data :  {teachersemester:sem,postteacher:teacher,postsubject:subject,postsubject_type:subject_type},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".semstudent").html(data);
                        }
                        else
                        {
                            $(".semstudent").html(data);
                        }
                    }
                });
            }
        </script>
    </body>
</html>
