<?php
    include("../connection.php");

    if(isset($_POST['checkdepartmentadminemail']))
    {
        $department_admin_email = htmlspecialchars($_POST['checkdepartmentadminemail']);

        $sql1 = "select departmentadminemail from departmentadmin where departmentadminemail=?";
        $query1 = $conn->prepare($sql1);
        $query1->bind_param("s",$department_admin_email);
        $query1->execute();
        $query1->store_result();
        $result = $query1->num_rows;
        //$query1->bind_result($rollno_exist);

        if($result>0)
        {
            echo "emailid already registered";
            exit;
        }
        exit;
    }


    if(isset($_POST['departmentadminname']))
    {
        echo $department_admin_department = htmlspecialchars($_POST['departmentadmindepartment']);
        $department_admin_name = htmlspecialchars($_POST['departmentadminname']);
        $department_admin_email = htmlspecialchars($_POST['departmentadminemail']);
        $department_admin_password = htmlspecialchars($_POST['departmentadminpassword']);

        $sql = "insert into departmentadmin(departmentadmindepartment,departmentadminname,departmentadminemail,departmentadminpassword) values(?,?,?,?)";
        $query = $conn->prepare($sql);
        $query->bind_param("ssss",$department_admin_department,$department_admin_name,$department_admin_email,$department_admin_password);
        $query->execute();
        $query->close();

        header("location:departmentadminloginpage.php");
    }
?>