<?php
    include("../connection.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Recoverypage</title>
    </head>

    <body>

    <div class="teacher_forget_box">
        <div class="teacher_forget_form">
        <p>Recover Password</p>
        <form method="post" action="teacherverify.php" id="form">
            <label>Your Emailid</label>
            <br>
            <input type="email" name="teacheremail" id="teacheremail">
            <br><br>
            <button type="submit" name="checkemail" onclick="event.preventDefault(); Checkemail();">Recover</button>
            <div class="notfound"></div>
        </form>
        <a href="teacherloginpage.php">Back to login page</a>
        </div>
    </div>
        <script type="text/javascript">

            function Checkemail()
            {
                var email = document.getElementById("teacheremail").value;

                console.log(email);


                if(email=="")
                {
                    alert("please enter emailid");
                }
                else
                {
                    $.ajax({
                        url : "teacherverify.php",
                        method : "POST",
                        data :  {teachercheckemail:email},
                        success : function(data)
                        {
                            $(".notfound").html(data)
                            {
                                if(data=="Please Enter correct emailid")
                                {
                                    $(".notfound").html(data)
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