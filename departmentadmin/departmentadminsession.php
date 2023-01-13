<?php
    include("../connection.php");
    session_start();

    $department_admin_session_email = $_SESSION['departmentadminemail'];

    $sql1 = "select departmentadminname,departmentadminemail,departmentadmindepartment from departmentadmin where departmentadminemail=?";
    $query1 = $conn->prepare($sql1);
    $query1->bind_param("s",$department_admin_session_email);
    $query1->execute();
    $query1->store_result();
    $result = $query1->num_rows;
    $query1->bind_result($session_department_admin_email,$session_department_admin_name,$session_department_admin_department);

    if($result>0)
    {
        $query1->fetch();
    }
?>