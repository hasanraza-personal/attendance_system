<?php
    include("../connection.php");
    include("teachersession.php");

    if(isset($_POST['subject1']))
    {
        $teacher_semester = htmlspecialchars($_POST['teachersemester']);

        $subject1 = $_POST['subject1'];
        $subject2 = $_POST['subject2'];
        $practical1 = $_POST['practical1'];
        $practical2 = $_POST['practical2'];
        $tutorial = $_POST['tutorial'];
        

        $sql = "insert into teacher(teachername,teacheremail,teacherdepartment,teachersemester,subject1,subject2,practical1,practical2,tutorial) values(?,?,?,?,?,?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->bind_param("sssssssss",$session_teacher_name,$session_teacher_email,$session_teacher_department,$teacher_semester,$subject1,$subject2,$practical1,$practical2,$tutorial);
        $query->execute();
        $query->close();

        echo "your data has been successfully submitted";
    }
    else
    {
        echo "error occured";
    }
?>