<?php
    include("../connection.php");
    include("teachersession.php");

    if(isset($_POST['teachername']))
    {
        $teacher_name = htmlspecialchars($_POST['teachername']);
        $teacher_password = htmlspecialchars($_POST['teacherpassword']);

        if($teacher_password!="")
        {
            $sql = "update teacher set teachername=?,teacherpassword=? where teacheremail=?";
            $query = $conn->prepare($sql);
            $query->bind_param("sss",$teacher_name,$teacher_password,$session_teacher_email);
            $query->execute();
            $query->close();
        }
        else
        {
            $sql = "update teacher set teachername=? where teacheremail=?";
            $query = $conn->prepare($sql);
            $query->bind_param("sss",$teacher_name,$session_teacher_email);
            $query->execute();
            $query->close();
        }

        header("location:teachereditpage.php");
    }

    if(isset($_POST['editsubject']))
    {
        $sr_no = htmlspecialchars($_POST['editsubject']);
              
        if(!empty($_POST['subject1']))
        {
            $subject1 = htmlspecialchars($_POST['subject1']);
        }
        if(!empty($_POST['subject2']))
        {
            $subject2 = htmlspecialchars($_POST['subject2']);
        }
        
        if(!empty($_POST['practical1']))
        {
            $practical1 = htmlspecialchars($_POST['practical1']);
        }
        if(!empty($_POST['practical2']))
        {
            $practical2 = htmlspecialchars($_POST['practical2']);
        }

        if(!empty($_POST['tutorial']))
        {
            $tutorial = htmlspecialchars($_POST['tutorial']);
        }

        $sql = "update teacher set subject1=?,subject2=?,practical1=?,practical2=?,tutorial=? where srno=?";
        $query = $conn->prepare($sql);
        $query->bind_param("ssssss",$subject1,$subject2,$practical1,$practical2,$tutorial,$sr_no);
        $query->execute();
        $query->close();   

        header("location:teachereditpage.php");
    }

    if(isset($_POST['deletesubject']))
    {
        $sr_no = htmlspecialchars($_POST['deletesubject']);

        $sql = "delete from teacher where srno=?";
        $query = $conn->prepare($sql);
        $query->bind_param("s",$sr_no);
        $query->execute();
        $query->close();

        header("location:teachereditpage.php");
    }
?>