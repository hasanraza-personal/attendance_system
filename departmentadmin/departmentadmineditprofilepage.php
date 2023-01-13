<?php
    include("../connection.php");
    include("departmentadminsession.php");

        $sql = "select departmentadminname,departmentadminemail,departmentadminpassword from departmentadmin";
        $query = $conn->prepare($sql);
        //$query->bind_param("s",$session_department_admin_email);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($department_admin_name,$department_admin_email1,$department_admin_password1);

        $query->fetch();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <title>Departmentadmineditpage</title>
    </head>

    <body>
        <div class="form">
        <p>Department Admin Editpage</p>
        <form method="post" action="updatedepartmentadmin">
            <label>Name</label>
            <br>
            <input type="text" name="departmentadminname" id="departmentadminname" value="<?php echo $department_admin_name;?>" required>
            <br><br>
            <label>Email id</label>
            <br>
            <input type="email" name="departmentadminemail" id="departmentadminemail" value="<?php echo $department_admin_email1;?>" disabled>
            <div class="emailerror"></div>
            <br>
            <br>
            <label>Password</label>
            <br>
            <input type="password" name="departmentadminpassword" id="departmentadminpassword">
            <br>
            <input type="checkbox" onclick="Showpassword();">
            <label>show password</label>
            <br>
            <br>
            <button type="submit" name="departmentadminregister" id="registerbutton" onclick="event.preventDefault(); Checkfield();">Update</button>
            <br>
            <div class="notfound"></div>
            <a href="departmentadminhomepage.php">Back</a>
        </form>
        </div>


    <script type="text/javascript">
        function Showpassword()
        {
            var pass = document.getElementById("departmentadminpassword");

            if (pass.type === "password") 
            {
                pass.type = "text";
            } 
            else 
            {
                pass.type = "password";
            }
        }
    </script>
    </body>
</html>
