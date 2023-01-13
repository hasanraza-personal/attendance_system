<?php
    include("../connection.php");
    session_start();

    $teacher_session_email = $_SESSION['teacheremail'];

    $sql1 = "select teachername,teacheremail,teacherpassword,teacherdepartment from teacher where teacheremail=?";
    $query1 = $conn->prepare($sql1);
    $query1->bind_param("s",$teacher_session_email);
    $query1->execute();
    $query1->store_result();
    $result = $query1->num_rows;
    $query1->bind_result($session_teacher_name,$session_teacher_email,$session_teacher_password,$session_teacher_department);

    if($result>0)
    {
        $query1->fetch();
    }
?>