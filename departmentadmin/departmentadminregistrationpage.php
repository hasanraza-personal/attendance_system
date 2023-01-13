<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Departmentadminregister</title>
    </head>

    <body>

    <div class="admin_register_box">
        <div class="admin_register_form">
        <p>Admin Registration</p>
        <form method="post" action="adddepartmentadmin.php" name="form" id="departmentadminregistrationform">
            <label>Department</label>
            <br>
            <select name="departmentadmindepartment" id="departmentadmindepartment" required>
                <option>Select department</option>
                <option>IT</option>
                <option>COMPUTER</option>
                <option>MECHANICAL</option>
                <option>CIVIL</option>
                <option>AUTOMOBILE</option>
            </select>
            <br>
            <br>
            <label>Name</label>
            <br>
            <input type="text" name="departmentadminname" id="departmentadminname" required>
            <br><br>
            <label>Email id</label>
            <br>
            <input type="email" name="departmentadminemail" id="departmentadminemail" required onfocusout="Checkemail();">
            <div class="emailerror"></div>
            <br>
            <br>
            <label>Password</label>
            <br>
            <input type="password" name="departmentadminpassword" id="departmentadminpassword" required>
            <br>
            <br>
            <button type="submit" name="departmentadminregister" id="registerbutton" onclick="event.preventDefault(); Checkfield();">Signup</button>
            <br>
            <div class="notfound"></div>
            <a href="departmentadminloginpage.php">Back</a>
        </form>
        </div>
    </div>
        <script type="text/javascript">

            function Checkfield()
            {
                var department = document.getElementById("departmentadmindepartment").value;
                var name = document.getElementById("departmentadminname").value;
                var email = document.getElementById("departmentadminemail").value;
                var password = document.getElementById("departmentadminpassword").value;
                console.log(email);
                console.log(password);
                console.log(department);

                if((email=="")||(password=="")||(name=="")||(department=="Select department"))
                {
                    alert("please fill all details");
                }
                else
                {
                    $.ajax({
                        url : "adddepartmentadmin.php",
                        method : "POST",
                        data :  {checkdepartmentadminemail:email},
                        success : function(data)
                        {
                            if(data=="emailid already registered")
                            {
                                $(".notfound").html(data);
                            }
                            else
                            {
                                document.getElementById("registerbutton").onclick=null;
        	                    document.getElementById("departmentadminregistrationform").submit();
        	                    document.getElementById("departmentadminregistrationform").reset();
                            }
                        }
                    });
                }
            }

            function Checkemail()
            {
                var email = document.getElementById("departmentadminemail").value;

                $.ajax({
                    url : "adddepartmentadmin.php",
                    method : "POST",
                    data :  {checkdepartmentadminemail:email},
                    success : function(data)
                    {
                        $(".emailerror").html(data);
                    }
                });
            }

        </script>
    </body>
</html>
