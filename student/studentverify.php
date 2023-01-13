<?php
    include("../connection.php");

    if(isset($_POST['studentrollno']))
    {
        $student_rollno = htmlspecialchars($_POST['studentrollno']);
        $student_name = htmlspecialchars($_POST['studentname']);

        $sql = "select studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch from student where studentrollno=?";
        $query = $conn->prepare($sql);
        $query->bind_param("i",$student_rollno);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($name,$rollno,$branch,$year,$semester,$batch);

        if($result>0)
        {
            $query->fetch();
            
            if(($student_rollno==$rollno)&&($student_name==$name))
            {
                session_start();
                $_SESSION['studentrollno'] = $rollno;
                //echo "user verified";
            }
            else
            {
                echo "name and rollno does not match";
            }
        }
        else
        {
            echo "Please insert correct rollno";
        }
    }
?>