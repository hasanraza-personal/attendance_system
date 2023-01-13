<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Teacherlogin</title>
    </head>

    <body>

    <div class="teacher_login_box">
        <div class="teacher_login_form">
        <p>Teacher Login</p>
        <form method="post" action="verifyteacher.php" name="form">
            <label>Email id</label>
            <br>
            <input type="email" name="teacheremail" id="teacheremail" required>
            <br>
            <br>
            <label>Password</label>
            <br>
            <input type="password" name="teacherpassword" id="teacherpassword" required>
            <br>
            <input type="checkbox" onclick="Showpassword();"> Show Password
            <br>
            <br>
            <button type="submit" name="teacherlogin" onclick="event.preventDefault(); Checkfield();">Login</button>
            <br>
            <div class="notfound"></div>
            <a href="teacherforgotpasswordpage.php">Forgot password</a>
            <br>
            <a href="teacherregistrationpage.php">Create an account</a>
        </form>
        <br>
            <a href="../index.php">Back to Mainpage</a>
        </div>
    </div>
        <script type="text/javascript">

        function Showpassword()
        {
            var pass = document.getElementById("teacherpassword");

            if (pass.type === "password") 
            {
                pass.type = "text";
            } 
            else 
            {
                pass.type = "password";
            }
        }
            function Checkfield()
            {
                var email = document.getElementById("teacheremail").value;
                var password = document.getElementById("teacherpassword").value;
                console.log(email);
                console.log(password);

                if((email=="")||(password==""))
                {
                    alert("please fill all details");
                }
                else
                {
                    $.ajax({
                        url : "teacherverify.php",
                        method : "POST",
                        data :  {teacheremail:email,teacherpassword:password},
                        success : function(data)
                        {
                            if(data=="")
                            {
                                window.location.href = "teacherhomepage.php";
                            }
                            else
                            {
                                $(".notfound").html(data)
                            }
                        }
                    });
                }
            }

        </script>
    </body>
</html>