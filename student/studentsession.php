<?php
    include("../connection.php");
    session_start();

    $student_rollno = $_SESSION['studentrollno'];

    $sql1 = "select studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch from student where studentrollno=?";
    $query1 = $conn->prepare($sql1);
    $query1->bind_param("i",$student_rollno);
    $query1->execute();
    $query1->store_result();
    $result = $query1->num_rows;
    $query1->bind_result($session_student_name,$session_student_rollno,$session_student_department,$session_student_year,$session_student_semester,$session_student_batch);

    if($result>0)
    {
        $query1->fetch();
    }
?>