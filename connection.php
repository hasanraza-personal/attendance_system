<?php
    $server_name = "localhost";
    $user_name = "root";
    $user_password = "";
    $db_name = "attendance";

    $conn = new mysqli($server_name,$user_name,$user_password);

    $sql = "create database if not exists attendance";
    $conn->query($sql);

    $conn = new mysqli($server_name,$user_name,$user_password,$db_name);
?>