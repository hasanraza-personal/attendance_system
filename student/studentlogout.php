<?php
    include("../connection.php");
    include("studentsession.php");

    session_destroy();
    header("location:studentloginpage.php");
?>