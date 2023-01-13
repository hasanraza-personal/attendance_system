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
        <title>Studentmanagementpage</title>
    </head>

    <body>
        <div class='header'>
        <h1>Student Management Page</h1><br>
        <?php
            echo "Welcome <b>".$session_department_admin_email."</b><br>";
            echo "Your Department is  <b>".$session_department_admin_department."</b><br><br>";
        ?>
        </div>
        <a class='back' href="departmentadminhomepage.php">Back</a>
        <div class='buttons'>
        <button onclick="Firstyear();">First year</button>
        <button onclick="Secondyear();">Second year</button>
        <button onclick="Thirdyear();">Third year</button>
        <button onclick="Fourthyear();">Fourth year</button>

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

        <div class="display"></div>
        </div>
        <script type="text/javascript">

            function Firstyear()
            {
                $('#firstyear').removeClass("hide");
                $('#secondyear').addClass("hide");
                $('#thirdyear').addClass("hide");
                $('#fourthyear').addClass("hide");

            }
            function Secondyear()
            {
                $('#firstyear').addClass("hide");
                $('#secondyear').removeClass("hide");
                $('#thirdyear').addClass("hide");
                $('#fourthyear').addClass("hide");
            }
            function Thirdyear()
            {
                $('#firstyear').addClass("hide");
                $('#secondyear').addClass("hide");
                $('#thirdyear').removeClass("hide");
                $('#fourthyear').addClass("hide");
            }
            function Fourthyear()
            {
                $('#firstyear').addClass("hide");
                $('#secondyear').addClass("hide");
                $('#thirdyear').addClass("hide");
                $('#fourthyear').removeClass("hide");
            }


            function Firstsemseter()
            {
                var sem = document.getElementById("firstsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Secondsemseter()
            {
                var sem = document.getElementById("secondsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Thirdsemseter()
            {
                var sem = document.getElementById("thirdsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Fourthsemseter()
            {
                var sem = document.getElementById("fourthsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Fifthsemseter()
            {
                var sem = document.getElementById("fifthsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Sixthsemseter()
            {
                var sem = document.getElementById("sixthsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Seventhsemseter()
            {
                var sem = document.getElementById("seventhsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }

            function Eighthsemseter()
            {
                var sem = document.getElementById("eighthsem").value;
                console.log(sem);
                $.ajax({
                    url : "studentdata.php",
                    method : "POST",
                    data :  {checksemester:sem},
                    success : function(data)
                    {
                        if(data == "no data found")
                        {
                            $(".display").html(data);
                        }
                        else
                        {
                            $(".display").html(data);
                        }
                    }
                });
            }
        </script>
    </body>
</html>
