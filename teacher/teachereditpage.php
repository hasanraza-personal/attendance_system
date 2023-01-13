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
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        
        <title>Teachereditpage</title>
    </head>

    <body>
        <h1>Welcome <?php echo $session_teacher_name;?></h1>
        <br>
        <a href="teacherlogout.php">Logout</a>
        <br><br>
        <a href="teacherhomepage.php">Back</a>
        <br><br>
        
        <div class="teacher_reg_form">
        <form method="post" action="modifyteacherdetails.php" id="teacherregistrationform">
            <label>Name</label>
            <br>
            <input type="text" value="<?php echo $session_teacher_name;?>" id="teachername" name="teachername">
            <br><br>
            <label>Emailid</label>
            <br>
            <input type="text" value="<?php echo $session_teacher_email;?>" id="teacheremail" disabled>
            <br><br>
            <label>Department</label>
            <br>
            <input type="text" value="<?php echo $session_teacher_department;?>" id="department" disabled>
            <br><br>
            <label>Old password</label>
            <br>
            <input type="password" id="teacheroldpassword" onfocusout="Checkpassword();">
            <br><br>
            <label>New password</label>
            <br>
            <input type="password" id="teachernewpassword" name="teacherpassword">
            <br><br>
            <label>Confirm Password</label>
            <br>
            <input type="password" id="teacherconfirmpassword">
            <br>
            <input type="checkbox" onclick="Showpassword();"> Show Password
            <br><br>
            <button type="submit" id="registerbutton" onclick="event.preventDefault(); Checkdetails();">Change personal details</button>
        </form>
        </div>
        
        <?php
            $sql = "select srno,teachername,teacheremail,teacherpassword,teacherdepartment,teachersemester,subject1,subject2,practical1,practical2,tutorial from teacher where teacheremail=?";
            $query = $conn->prepare($sql);
            $query->bind_param("s",$session_teacher_email);
            $query->execute();
            $query->store_result();
            $result = $query->num_rows;
            $query->bind_result($srno,$teacher_name,$teacher_email,$teacher_password,$teacher_department,$teacher_semester,$subject1,$subject2,$practical1,$practical2,$tutorial);
            
            if($result>0)
            {
                while($query->fetch())
                {
        ?>      <div class="teacher_reg_form">
                    <form method="post" action="modifyteacherdetails.php">
                        <?php
                            if($teacher_semester!="")
                            {
                        ?>
                                <label>Semester</label>
                                <br>
                                <input type="text" name="semester" value="<?php echo $teacher_semester;?>" disabled>
                                <br><br>
                        <?php
                            }
                        ?>

                        <?php
                            if($subject1!="")
                            {
                        ?>
                                <label>Subject 1</label>
                                <br>
                                <input type="text" name="subject1" value="<?php echo $subject1;?>">
                                <br><br>
                        <?php
                            }
                        ?>

                        <?php
                            if($subject2!="")
                            {
                        ?>
                                <label>Subject 2</label>
                                <br>
                                <input type="text" name="subject2" value="<?php echo $subject2;?>">
                                <br><br>
                        <?php
                            }
                        ?>

                        <?php
                            if($practical1!="")
                            {
                        ?>
                                <label>Practical 1</label>
                                <br>
                                <input type="text" name="practical1" value="<?php echo $practical1;?>">
                                <br><br>
                        <?php
                            }
                        ?>

                        <?php
                            if($practical2!="")
                            {
                        ?>
                                <label>Practical 2</label>
                                <br>
                                <input type="text" name="practical2" value="<?php echo $practical2;?>">
                                <br><br>
                        <?php
                            }
                        ?>

                        <?php
                            if($tutorial!="")
                            {
                        ?>
                                <label>Tutorial</label>
                                <br>
                                <input type="text" name="tutorial" value="<?php echo $tutorial;?>">
                                <br><br>
                        <?php
                            }
                        ?>

                        <?php
                            if(($teacher_semester!="")||($subject1!="")||($subject2!="")||($practical1!="")||($practical2!="")||($tutorial!=""))
                            {
                        ?>
                                <button type="submit" name="editsubject" value="<?php echo $srno;?>">Edit subject</button>
                                <button type="submit" name="deletesubject" value="<?php echo $srno;?>">Delete</button>
                        <?php
                            }
                        ?>
                    </form>
                </div>
        <?php
                }
            }
        ?>
        
        <script type="text/javascript">

        function Showpassword()
        {
            var pass1 = document.getElementById("teacheroldpassword");
            var pass2 = document.getElementById("teachernewpassword");
            var pass3 = document.getElementById("teacherconfirmpassword");

            if ((pass1.type === "password")||(pass2.type === "password")||(pass3.type === "password")) 
            {
                pass1.type = "text";
                pass2.type = "text";
                pass3.type = "text";
            } 
            else 
            {
                pass1.type = "password";
                pass2.type = "password";
                pass3.type = "password";
            }
        }

        function Checkpassword()
        {
            var originalpassword = "<?php echo $session_teacher_password?>";
            var pass1 = document.getElementById("teacheroldpassword").value;
            console.log(originalpassword);

            if(pass1!=originalpassword)
            {
                alert("Please Enter a correct password");
            }
        }

        function Checkdetails()
        {
            var name = document.getElementById("teachername").value;
            var originalpassword = "<?php echo $session_teacher_password?>";
            var pass1 = document.getElementById("teacheroldpassword").value;
            var pass2 = document.getElementById("teachernewpassword").value;
            var pass3 = document.getElementById("teacherconfirmpassword").value;
            
            console.log(originalpassword);

            if(pass1 == originalpassword)
            {
                if(pass2 == pass3)
                {
                    if((name!="")||(pass1!="")||(pass2!="")||(pass3!=""))
                    {
                        document.getElementById("registerbutton").onclick=null;
        	            document.getElementById("teacherregistrationform").submit();
                    }
                    else
                    {
                        alert("Please Enter all details");
                    }
                }
                else
                {
                    alert("Password does not match");
                }
            }
            else
            {
                alert("Please Enter a correct password");
            }
        }

        </script>
    </body>
</html>