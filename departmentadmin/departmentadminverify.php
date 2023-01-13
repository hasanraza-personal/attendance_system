<?php
    include("../connection.php");

    if(isset($_POST['departmentadminemail']))
    {
       // $department_admin_name = htmlspecialchars($_POST['departmentadminname']);
        $department_admin_email = htmlspecialchars($_POST['departmentadminemail']);
        $department_admin_password = htmlspecialchars($_POST['departmentadminpassword']);

        $sql = "select departmentadminname,departmentadminemail,departmentadminpassword from departmentadmin where departmentadminemail=?";
        $query = $conn->prepare($sql);
        $query->bind_param("s",$department_admin_email);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($department_admin_name,$department_admin_email1,$department_admin_password1);
        
        if($result>0)
        {
            $query->fetch();
            
            if(($department_admin_email==$department_admin_email1)&&($department_admin_password==$department_admin_password1))
            {
                session_start();
                $_SESSION['departmentadminemail'] = $department_admin_email;
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

    if(isset($_POST['departmentadmincheckemail']))
    {
        $department_admin_email = htmlspecialchars($_POST['departmentadmincheckemail']);

        $sql1 = "select departmentadminemail, departmentadminpassword from departmentadmin where departmentadminemail=?";
        $query1 = $conn->prepare($sql1);
        $query1->bind_param("s",$department_admin_email);
        $query1->execute();
        $query1->store_result();
        $result = $query1->num_rows;
        $query1->bind_result($departmentadminemail,$departmentadmin_password);

        if($result>0)
        {
            $query1->fetch();

            $to_email = $departmentadminemail;
            $subject = "Password Recovery";
            $body = "This is your password $departmentadmin_password";
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