<?php
    include("connection.php");

    $sql = "create table if not exists student
    (
        srno int not null auto_increment,
        studentname text,
        studentrollno int,
        studentdepartment text,
        studentyear text,
        studentsemester text,
        studentbatch text,
        primary key(srno)
    );";
    $query=$conn->prepare($sql);
    $query->execute();
    $query->close();

    $sql1 = "create table if not exists teacher
    (
        srno int not null auto_increment,
        teachername text,
        teacheremail text,
        teacherpassword text,
        teacherdepartment text,
        teachersemester text,
        subject1 text,
        subject2 text,
        practical1 text,
        practical2 text,
        tutorial text,
        primary key(srno)
    );";
    $query1=$conn->prepare($sql1);
    $query1->execute();
    $query1->close();


    $sql2 = "create table if not exists departmentadmin
    (
        srno int not null auto_increment,
        departmentadmindepartment text,
        departmentadminname text,
        departmentadminemail text,
        departmentadminpassword text,
        primary key(srno)
    );";
    $query2=$conn->prepare($sql2);
    $query2->execute();
    $query2->close();

    $sql3 = "create table it_first_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query3=$conn->prepare($sql3);
    $query3->execute();
    $query3->close();

    $sql4 = "create table it_second_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query4=$conn->prepare($sql4);
    $query4->execute();
    $query4->close();

    $sql5 = "create table it_third_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query5=$conn->prepare($sql5);
    $query5->execute();
    $query5->close();

    $sql6 = "create table it_fourth_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query6=$conn->prepare($sql6);
    $query6->execute();
    $query6->close();

    $sql7 = "create table it_fifth_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query7=$conn->prepare($sql7);
    $query7->execute();
    $query7->close();

    $sql8 = "create table it_sixth_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query8=$conn->prepare($sql8);
    $query8->execute();
    $query8->close();

    $sql9 = "create table it_seventh_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query9=$conn->prepare($sql9);
    $query9->execute();
    $query9->close();

    $sql10 = "create table it_eighth_semester
    (
        srno int not null auto_increment,
        rollno int,
        name text,
        department text,
        year text,
        semester text,
        batch text,
        workingdate date,
        teachername text,
        lecturename text,
        totallecture int,
        practicalname text,
        totalpractical int,
        tutorialname text,
        totaltutorial int,
        studentpresent int,
        studentabsent int,
        totalpresent int,
        totalabsent int,
        primary key(srno)
    );";
    $query10=$conn->prepare($sql10);
    $query10->execute();
    $query10->close();
    
    $sql11 = "create table teacher_count
    (
        srno int not null auto_increment,
        teachername text,
        teacherdepartment text,
        studentyear text,
        studentsemester text,
        workingdate date,
        lecturename text,
        lecturecount int,
        practicalname text,
        practicalcount int,
        tutorialname text,
        tutorialcount int,
        primary key(srno)
    );";
    $query11=$conn->prepare($sql11);
    $query11->execute();
    $query11->close();

?>