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
        <link rel="stylesheet" href="../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Departmentadminhomepage</title>
    </head>

    <body>
        <br>
        <div class='links'>

        <h1>Department Admin Homepage</h1>

        <?php
            echo "<div class='welcome'>";
            echo "<p>Welcome <b>".$session_department_admin_email."</b><br></p>";
            echo "<p>Your Department is  <b>".$session_department_admin_department."</b><br><p>";
            echo "</div>";
        ?>

        <a href="studentmanagementpage.php">Student Management</a>

        <a href="takeattendancepage.php">Take Attendance</a>

        <a href="#">Edit Attendance</a>

        <a href="#">View Attendance</a>

        <a href="departmentadmineditprofilepage.php">Edit Profile</a>

        <a href="departmentadminlogoutpage.php">Logout</a>


        </div>


    </body>
</html>
