<?php
    include("../connection.php");
    include("departmentadminsession.php");

    session_destroy();

    header("location:departmentadminloginpage.php");
?>