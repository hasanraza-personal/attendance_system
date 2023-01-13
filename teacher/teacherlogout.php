<?php
    include("../connection.php");
    include("teachersession.php");

    session_destroy();
    header("location:teacherloginpage.php");
?>