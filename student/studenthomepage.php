<?php
    include("../connection.php");
    include("studentsession.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <style rel="stylesheet" src="css/style.css"></style>
        
        <style>
            table 
            {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 70%;
            }
            td, th 
            {
                border: 1px solid black;
                text-align: center;
                padding: 10px;
            }
            tr:nth-child(even) 
            {
                background-color: #dddddd;
            }
        </style>

        <title>Studentpage</title>
    </head>

    <body>
        <h1>Welcome Student</h1>
        <a href="studentloginpage.php">Logout</a>
        <br><br>
        <?php
            echo $session_student_rollno."<br><br>";
            echo $session_student_name."<br><br>";
            echo $session_student_semester."<br><br>";
            echo $session_student_department."<br><br>";

            $table_name = $session_student_department . ' ' . $session_student_semester;
        
            $table_name = strtolower($table_name);

            echo $table_name = str_replace(' ', '_', $table_name);

            $sql = "select subject1,subject2,practical1,practical2,tutorial from teacher where teachersemester='$session_student_semester' AND teacherdepartment='$session_student_department'";
            $result = $conn->query($sql);
            $count = $result->num_rows;

            if($count>0)
            {
                while($row=$result->fetch_array())
                {
                    $subject1[] = $row['subject1'];
                    $subject2[] = $row['subject2'];
                    $practical1[] = $row['practical1'];
                    $practical2[] = $row['practical2'];
                    $tutorial[] = $row['tutorial'];
                }
                //For Lecture only
                $subject = (array_merge($subject1,$subject2));
                $subject = array_filter($subject);
                $subject = array_unique($subject);
                $subject=(array_values($subject));
                print_r($subject);echo "<br><br>";
                $lecture_main_count=count($subject);

                //For practical only
                $practical = (array_merge($practical1,$practical2));
                $practical = array_filter($practical);
                $practical = array_unique($practical);
                $practical=(array_values($practical));
                print_r($practical);echo "<br><br>";
                $practical_main_count=count($practical);

                //For Tutorial only
                $tutorial = array_filter($tutorial);
                $tutorial = array_unique($tutorial);
                $tutorial=(array_values($tutorial));
                print_r($tutorial);echo "<br><br>";
                $tutorial_main_count=count($tutorial);
?>
                <table>
                    <tr>
                        <th>Srno</td>
                        <th>Subject Name</th>
                        <th>Total Period</th>
                        <th>Total Present</th>
                        <th>Percentage</th>
                    </tr>
                    <tr><th>LECTURE</th><tr>
<?php
                for($i=0;$i<$lecture_main_count;$i++)
                {
                    $total_lecture_count_ = 0;
                    $total_present_count = 0;

                    echo "<br>".$sem_subject = $subject[$i];
                    
                    $sql1 = "select teachername from teacher where ((subject1='$sem_subject' OR subject2='$sem_subject') AND (teachersemester='$session_student_semester' AND teacherdepartment='$session_student_department'))";
                    $result1 = $conn->query($sql1);
                    $count1 = $result1->num_rows;

                    if($count1>0)
                    {
                        $teacher = array();
                        while($row1 = $result1->fetch_array())
                        {
                            $teacher[] = $row1['teachername'];
                        }
                        for($j=0;$j<$count1;$j++)
                        {
                            echo "<br>".$teacher_name = $teacher[$j];

                            $sql2 = "select lecturecount from teacher_count where teachername='$teacher_name' AND studentsemester='$session_student_semester' AND teacherdepartment='$session_student_department' AND lecturename='$sem_subject'";
                            $result2 = $conn->query($sql2);
                            $count2 = $result2->num_rows;
                            
                            if($count2>0)
                            {
                                $lecturecount = array();
                                while($row2 = $result2->fetch_array())
                                {
                                   $lecturecount[] = $row2['lecturecount'];
                                }
                                $lecture_count = array_filter($lecturecount);
                                $lecture_count = array_unique($lecture_count);
                                $lecture_count=(array_values($lecture_count));
                                print_r($lecture_count);echo "<br><br>";
                                $lecture_individual_main_count=count($lecture_count);
                                
                                for($k=0;$k<$lecture_individual_main_count;$k++)
                                {
                                    /*echo "<br>".$teacher_name."<br>";
                                    echo "<br>".$session_student_rollno."<br>";
                                    echo "<br>".$sem_subject."<br>";*/
                                    //echo $table_name;
                                    $total_lecture_count = $lecture_count[$k];
                                    echo $total_lecture_count_ = $total_lecture_count_ + $total_lecture_count;

                                    $sql3 = "select * from `".$table_name."` where rollno='$session_student_rollno' AND teachername='$teacher_name' AND lecturename='$sem_subject'";
                                    $result3 = $conn->query($sql3);
                                    $count3 = $result3->num_rows;

                                    if($count3>0)
                                    {
                                        $presentcount = array();
                                        while($row3 = $result3->fetch_array())
                                        {
                                            $presentcount[] = $row3['totalpresent'];
                                        }
                                        $present_count = array_filter($presentcount);
                                        $present_count = array_unique($present_count);
                                        $present_count=(array_values($present_count));
                                        print_r($present_count);echo "<br><br>";
                                        $lecture_individual_present_count=count($present_count);

                                        for($l = 0;$l<$lecture_individual_present_count;$l++)
                                        {
                                            $totalpresentcount = $present_count[$l];
                                            echo "presnt".$total_present_count = $total_present_count + $totalpresentcount;
                                        }
                                    }
                                    else
                                    {
                                        echo "student section error";
                                    }
                                }
                            }
                        }
                    }
?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $sem_subject;?></td>
                        <td><?php echo $total_lecture_count_;?></td>
                        <td><?php echo $total_present_count;?></td>
                        <td>100</td>
                    <tr>
<?php           } ?>

<!--FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL  FOR PRACTICAL-->
                <tr><td>PRACTICAL</td></tr>
<?php
                for($i=0;$i<$practical_main_count;$i++)
                {
                    $total_practical_count_ = 0;
                    $total_present_count = 0;

                    echo "<br>".$sem_subject = $subject[$i];
                    
                    $sql1 = "select teachername from teacher where ((practical1='$sem_subject' OR practical2='$sem_subject') AND (teachersemester='$session_student_semester' AND teacherdepartment='$session_student_department'))";
                    $result1 = $conn->query($sql1);
                    $count1 = $result1->num_rows;

                    if($count1>0)
                    {
                        $teacher = array();
                        while($row1 = $result1->fetch_array())
                        {
                            $teacher[] = $row1['teachername'];
                        }
                        for($j=0;$j<$count1;$j++)
                        {
                            echo "<br>".$teacher_name = $teacher[$j];

                            $sql2 = "select practicalcount from teacher_count where teachername='$teacher_name' AND studentsemester='$session_student_semester' AND teacherdepartment='$session_student_department' AND lecturename='$sem_subject'";
                            $result2 = $conn->query($sql2);
                            $count2 = $result2->num_rows;
                            
                            if($count2>0)
                            {
                                $practicalcount = array();
                                while($row2 = $result2->fetch_array())
                                {
                                   $practicalcount[] = $row2['practicalcount'];
                                }
                                $practical_count = array_filter($practicalcount);
                                $practical_count = array_unique($practical_count);
                                $practical_count=(array_values($practical_count));
                                print_r($practical_count);echo "<br><br>";
                                $practical_individual_main_count=count($practical_count);
                                
                                for($k=0;$k<$practical_individual_main_count;$k++)
                                {
                                    /*echo "<br>".$teacher_name."<br>";
                                    echo "<br>".$session_student_rollno."<br>";
                                    echo "<br>".$sem_subject."<br>";*/
                                    //echo $table_name;
                                    $total_practical_count = $practical_count[$k];
                                    echo $total_practical_count_ = $total_practical_count_ + $total_practical_count;

                                    $sql3 = "select * from `".$table_name."` where rollno='$session_student_rollno' AND teachername='$teacher_name' AND practicalname='$sem_subject'";
                                    $result3 = $conn->query($sql3);
                                    $count3 = $result3->num_rows;

                                    if($count3>0)
                                    {
                                        $presentcount = array();
                                        while($row3 = $result3->fetch_array())
                                        {
                                            $presentcount[] = $row3['totalpresent'];
                                        }
                                        $present_count = array_filter($presentcount);
                                        $present_count = array_unique($present_count);
                                        $present_count=(array_values($present_count));
                                        print_r($present_count);echo "<br><br>";
                                        $lecture_individual_present_count=count($present_count);

                                        for($l = 0;$l<$lecture_individual_present_count;$l++)
                                        {
                                            $totalpresentcount = $present_count[$l];
                                            echo "presnt".$total_present_count = $total_present_count + $totalpresentcount;
                                        }
                                    }
                                    else
                                    {
                                        echo "student section error";
                                    }
                                }
                            }
                        }
                    }
?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $sem_subject;?></td>
                        <td><?php echo $total_practical_count_;?></td>
                        <td><?php echo $total_present_count;?></td>
                        <td>100</td>
                    <tr>
<?php           } ?>

<!--FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL   FOR TUTORIAL-->

<tr><td>TUTORIAL</td></tr>
<?php
                for($i=0;$i<$tutorial_main_count;$i++)
                {
                    $total_tutorial_count_ = 0;
                    $total_present_count = 0;

                    echo "<br>".$sem_subject = $subject[$i];
                    
                    $sql1 = "select teachername from teacher where tutorial='$sem_subject' AND teachersemester='$session_student_semester' AND teacherdepartment='$session_student_department'";
                    $result1 = $conn->query($sql1);
                    $count1 = $result1->num_rows;

                    if($count1>0)
                    {
                        $teacher = array();
                        while($row1 = $result1->fetch_array())
                        {
                            $teacher[] = $row1['teachername'];
                        }
                        for($j=0;$j<$count1;$j++)
                        {
                            echo "<br>".$teacher_name = $teacher[$j];

                            $sql2 = "select tutorialcount from teacher_count where teachername='$teacher_name' AND studentsemester='$session_student_semester' AND teacherdepartment='$session_student_department' AND lecturename='$sem_subject'";
                            $result2 = $conn->query($sql2);
                            $count2 = $result2->num_rows;
                            
                            if($count2>0)
                            {
                                $tutorialcount = array();
                                while($row2 = $result2->fetch_array())
                                {
                                   $tutorialcount[] = $row2['tutorialcount'];
                                }
                                $tutorial_count = array_filter($tutorialcount);
                                $tutorial_count = array_unique($tutorial_count);
                                $tutorial_count=(array_values($tutorial_count));
                                print_r($tutorial_count);echo "<br><br>";
                                $tutorial_individual_main_count=count($tutorial_count);
                                
                                for($k=0;$k<$tutorial_individual_main_count;$k++)
                                {
                                    /*echo "<br>".$teacher_name."<br>";
                                    echo "<br>".$session_student_rollno."<br>";
                                    echo "<br>".$sem_subject."<br>";*/
                                    //echo $table_name;
                                    $total_tutorial_count = $tutorial_count[$k];
                                    echo $total_tutorial_count_ = $total_tutorial_count_ + $total_tutorial_count;

                                    $sql3 = "select * from `".$table_name."` where rollno='$session_student_rollno' AND teachername='$teacher_name' AND tutorialname='$sem_subject'";
                                    $result3 = $conn->query($sql3);
                                    $count3 = $result3->num_rows;

                                    if($count3>0)
                                    {
                                        $presentcount = array();
                                        while($row3 = $result3->fetch_array())
                                        {
                                            $presentcount[] = $row3['totalpresent'];
                                        }
                                        $present_count = array_filter($presentcount);
                                        $present_count = array_unique($present_count);
                                        $present_count=(array_values($present_count));
                                        print_r($present_count);echo "<br><br>";
                                        $lecture_individual_present_count=count($present_count);

                                        for($l = 0;$l<$lecture_individual_present_count;$l++)
                                        {
                                            $totalpresentcount = $present_count[$l];
                                            echo "presnt".$total_present_count = $total_present_count + $totalpresentcount;
                                        }
                                    }
                                    else
                                    {
                                        echo "student section error";
                                    }
                                }
                            }
                        }
                    }
?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $sem_subject;?></td>
                        <td><?php echo $total_tutorial_count_;?></td>
                        <td><?php echo $total_present_count;?></td>
                        <td>100</td>
                    <tr>
<?php           } ?>

<?php       }
        ?>
    </body>
</html>