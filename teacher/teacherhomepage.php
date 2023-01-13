<?php
    include("../connection.php");
    include("teachersession.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <style rel="stylesheet" src="css/style.css"></style>
        
        <title>Teacherhomepage</title>
    </head>

    <body>
        <h1>Welcome <?php echo $session_teacher_name;?></h1>
        <br>
        <a href="teacherlogout.php">Logout</a>
        <br><br>
        <a href="teachereditpage.php">Edit</a>
        <br><br>
        <a href="teachersubjectpage.php">Add subject</a>
        <br><br>

        <span>Your Name is <?php echo $session_teacher_name;?></span>
        <br><br>
        <span>Your Emaill id is <?php echo $session_teacher_email;?></span>
        <br><br>
        <span>Your Department is <?php echo $session_teacher_department;?></span>
        <br><br>

        
        <?php
            $sql = "select teachername,teacheremail,teacherpassword,teacherdepartment,teachersemester,subject1,subject2,practical1,practical2,tutorial from teacher where teacheremail=?";
            $query = $conn->prepare($sql);
            $query->bind_param("s",$session_teacher_email);
            $query->execute();
            $query->store_result();
            $result = $query->num_rows;
            $query->bind_result($teacher_name,$teacher_email,$teacher_password,$teacher_department,$teacher_semester,$subject1,$subject2,$practical1,$practical2,$tutorial);
            
            if($result>0)
            {
                while($query->fetch())
                {
                    if($teacher_semester!="")
                    {
                        echo "<span>Semester is $teacher_semester</span><br><br>";
                    }
                    if($subject1!="")
                    {
                        echo "<span>First Subject is $subject1</span><br><br>";
                    }
                    if($subject2!="")
                    {
                        echo "<span>Second Subject is $subject2</span><br><br>";
                    }
                    if($practical1!="")
                    {
                        echo "<span>First Practical is $practical1</span><br><br>";
                    }
                    if($practical2!="")
                    {
                        echo "<span>Second Practical is $practical2</span><br><br>";
                    }
                    if($tutorial!="")
                    {
                        echo "<span>Tutorial is $tutorial</span><br><br>";
                    }
                    echo "*********************************************************<br><br>";
        
                }
            }
        ?>
        
    </body>
</html>