<?php
    include("../connection.php");

    if(isset($_POST['teacheremail']))
    {
        $teacher_email = htmlspecialchars($_POST['teacheremail']);
        $teacher_password = htmlspecialchars($_POST['teacherpassword']);

        $sql = "select teachername,teacheremail,teacherpassword,teacherdepartment from teacher where teacheremail=?";
        $query = $conn->prepare($sql);
        $query->bind_param("s",$teacher_email);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($teacher_name,$teacher_email1,$teacher_password1,$teacher_department);
        
        if($result>0)
        {
            $query->fetch();
            
            if(($teacher_email==$teacher_email1)&&($teacher_password==$teacher_password1))
            {
                session_start();
                $_SESSION['teacheremail'] = $teacher_email;
            }
            else
            {
                echo "emailid and password does not match";
            }
        }
        else
        {
            echo "Please insert correct emailid";
        }
    }

    if(isset($_POST['teachercheckemail']))
    {
        $teacher_email = htmlspecialchars($_POST['teachercheckemail']);

        $sql1 = "select teacheremail, teacherpassword from teacher where teacheremail=?";
        $query1 = $conn->prepare($sql1);
        $query1->bind_param("s",$teacher_email);
        $query1->execute();
        $query1->store_result();
        $result = $query1->num_rows;
        $query1->bind_result($techeremail,$teacher_password);

        if($result>0)
        {
            $query1->fetch();

            $to_email = $teacher_email;
            $subject = "Password Recovery";
            $body = "This is your password $teacher_password";
            $headers = "From:workspot001@gmail.com";
 
            if (mail($to_email, $subject, $body, $headers)) 
            {
                echo "Your password has successfully send to $to_email...";
            }           
            exit;
        }
        else
        {
            echo "Please Enter correct emailid";
            exit;
        }
        exit;
    }



?>