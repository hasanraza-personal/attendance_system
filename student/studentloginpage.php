<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Studentlogin</title>
    </head>

    <body>

    <div class="student_login_box">
        <div class="student_login_form">
        <p>Student Login Page</p>
        <form method="post" action="studentverify.php" class="form">
            <label>Your Name</label>
            <input type="text" name="studentname" id="studentname" required>
            <br>
            <br>
            <label>Roll no</label>
            <input type="number" id="studentrollno" name="studentrollno" required>
            <br>
            <br>
            <button type="submit" class="showattendancebutton" name="showattendance" onclick="event.preventDefault(); Checkfield();">Show attendance</button>
            <br>
            <div class="notfound"></div>
            <a href="studentregistrationpage.php">Haven't Registered yet?</a>
        </form>
            <br>
            <a href="../index.php">Back to Mainpage</a>
</div>
</div>
        <script type="text/javascript">

            function Checkfield()
            {
                var name = document.getElementById("studentname").value;
                var rollno = document.getElementById("studentrollno").value;
                console.log(name);
                console.log(rollno);

                if((name=="")||(rollno==""))
                {
                    alert("please fill all details");
                }
                else
                {
                    $.ajax({
                        url : "studentverify.php",
                        method : "POST",
                        data :  {studentrollno:rollno,studentname:name},
                        success : function(data)
                        {
                            $(".notfound").html(data)
                            {
                                if(data=="")
                                {
                                    window.location.href = "studenthomepage.php";
                                }
                                else
                                {
                                    $(".notfound").html(data)
                                }
                            }
                        }
                    });
                }
            }

        </script>
    </body>
</html>