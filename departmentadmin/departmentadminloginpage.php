<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Departmentadminlogin</title>
    </head>

    <body>
    <div class='admin_login_form_box'>
        <div class='admin_login_form'>
        <p>Admin Login</p>
        <form method="post" action="departmentadminverify.php" name="form">
            <label>Email id</label>
            <br>
            <input type="email" name="departmentadminemail" id="departmentadminemail" required>
            <br>
            <br>
            <label>Password</label>
            <br>
            <input type="password" name="departmentadminpassword" id="departmentadminpassword" required>
            <br>
            <br>
            <button type="submit" name="departmentadminlogin" onclick="event.preventDefault(); Checkfield();">Login</button>
            <br>
            <div class="notfound"></div>
            <a href="departmentadminforgotpasswordpage.php">Forgot password</a>
            <br>
            <a href="departmentadminregistrationpage.php">Create an account</a>
        </form>
        <br>
            <a href="../index.php">Back to Mainpage</a>

        </div>
    </div>
        <script type="text/javascript">

            function Checkfield()
            {
                var email = document.getElementById("departmentadminemail").value;
                var password = document.getElementById("departmentadminpassword").value;
                console.log(email);
                console.log(password);

                if((email=="")||(password==""))
                {
                    alert("please fill all details");
                }
                else
                {
                    $.ajax({
                        url : "departmentadminverify.php",
                        method : "POST",
                        data :  {departmentadminemail:email,departmentadminpassword:password},
                        success : function(data)
                        {
                            $(".notfound").html(data)
                            {
                                if(data=="")
                                {
                                    window.location.href = "departmentadminhomepage.php";
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
