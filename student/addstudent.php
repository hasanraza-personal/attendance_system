<?php
    include("../connection.php");

    if(isset($_POST['checkrollno']))
    {
        $roll_no = htmlspecialchars($_POST['checkrollno']);

        $sql1 = "select studentrollno from student where studentrollno=?";
        $query1 = $conn->prepare($sql1);
        $query1->bind_param("i",$roll_no);
        $query1->execute();
        $query1->store_result();
        $result = $query1->num_rows;
        //$query1->bind_result($rollno_exist);

        if($result>0)
        {
            echo "Rollno already registered";
            exit;
        }
        exit;
    }
    
    if(isset($_POST['studentrollno']))
    {
        $student_name=htmlspecialchars($_POST['studentname']);
        $student_rollno=htmlspecialchars($_POST['studentrollno']);
        $student_department=htmlspecialchars($_POST['studentdepartment']);
        $student_year=htmlspecialchars($_POST['studentyear']);
        $student_semester=htmlspecialchars($_POST['studentsemester']);
        $student_batch=htmlspecialchars($_POST['studentbatch']);

        $sql = "insert into student(studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch) values(?,?,?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->bind_param("ssssss",$student_name,$student_rollno,$student_department,$student_year,$student_semester,$student_batch);
        $query->execute();
        $query->close();

        header("location:studentloginpage.php");
    }
    else
    {
        echo "error occured";
    }
?>