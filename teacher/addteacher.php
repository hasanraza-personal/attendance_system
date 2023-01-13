<?php
    include("../connection.php");

    if(isset($_POST['checkemail']))
    {
        $teacher_email = htmlspecialchars($_POST['checkemail']);

        $sql1 = "select teacheremail from teacher where teacheremail=?";
        $query1 = $conn->prepare($sql1);
        $query1->bind_param("s",$teacher_email);
        $query1->execute();
        $query1->store_result();
        $result = $query1->num_rows;
        //$query1->bind_result($rollno_exist);

        if($result>0)
        {
            echo "emailid already exist";
            exit;
        }
        exit;
    }

    if(isset($_POST['teachername']))
    {
        $teacher_name = htmlspecialchars($_POST['teachername']);
        $teacher_department = htmlspecialchars($_POST['teacherdepartment']);
        $teacher_email = htmlspecialchars($_POST['teacheremail']);
        $teacher_password = htmlspecialchars($_POST['teacherpassword']);
     

        $sql = "insert into teacher(teachername,teacheremail,teacherpassword,teacherdepartment) values(?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->bind_param("ssss",$teacher_name,$teacher_email,$teacher_password,$teacher_department);
        $query->execute();
        $query->close();

        header("location:teacherloginpage.php");

    }
?>