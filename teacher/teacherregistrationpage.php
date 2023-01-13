<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Teacherregistration</title>
    </head>

    <body>
        <div class="teacher_reg_box">
        <div class="teacher_reg_form">
        <p>Teacher Registration</p>
        <form method="post" action="addteacher.php" id="teacherregistrationform">
            <label>Name</label><span class="required">*</span>
            <br>
            <input type="text" name="teachername" required>
            <br><br>
            <label>Department</label><span class="required">*</span>
            <select name="teacherdepartment" id="department" required>
                <option>Select department</option>
                <option>IT</option>
                <option>COMPUTER</option>
                <option>MECHANICAL</option>
                <option>CIVIL</option>
                <option>AUTOMOBILE</option>
            </select>
            <br><br>
            
            <label>Email id</label><span class="required">*</span>
            <br>
            <input type="email" name="teacheremail" id="teacheremail" onfocusout="Searchemail();">
            <div class="emailiderror"></div>
            <br><br>
            <label>Password</label><span class="required">*</span>
            <br>
            <input type="password" name="teacherpassword">
            <br><br>
            <button type="submit" name="registerteacher" id="registerbutton" onclick="event.preventDefault(); Checkemail();">Register</button>
        </form>
        <a href="teacherloginpage.php">back to login page</a>
        </div>
        </div>
        <script type="text/javascript">


            function Searchemail()
            {
                var email = document.getElementById("teacheremail").value;
                console.log(email);

                $.ajax({
                    url : "addteacher.php",
                    method : "POST",
                    data :  {checkemail:email},
                    success : function(data)
                    {
                        $(".emailiderror").html(data);
                    }
                });
            }

            function Checkemail()
            {
                var department = document.getElementById("department").value;
                var email = document.getElementById("teacheremail").value;
                console.log(email);

                $.ajax({
                    url : "addteacher.php",
                    method : "POST",
                    data :  {checkemail:email},
                    success : function(data)
                    {
                        if(data == "emailid already exist")
                        {
                            $(".emailiderror").html(data);
                        }
                        else
                        {
                            if(department=="Select department")
                            {
                                alert("Please select all field");
                            }
                            else
                            {
                                document.getElementById("registerbutton").onclick=null;
        	                    document.getElementById("teacherregistrationform").submit();
        	                    document.getElementById("teacherregistrationform").reset();
                            }
                        }
                    }
                });
            }

        </script>
    </body>
</html>