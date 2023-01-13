<?php
    include("../connection.php");
    include("departmentadminsession.php");

    if(isset($_POST['submitattendance1']))
    {
        $attendance_date = htmlspecialchars($_POST['attendancedate']);
        echo $subject_type = htmlspecialchars($_POST['subjecttype']);
       echo $teacher_name_count = htmlspecialchars($_POST['teachercount']);
       echo $subject_name_count = htmlspecialchars($_POST['subjectcount']);
       echo $student_year = htmlspecialchars($_POST['studentyear']);
       echo $student_semester = htmlspecialchars($_POST['studentsemester']);

        $table_name = $session_department_admin_department . ' ' . $student_semester;
        
        $table_name = strtolower($table_name);

        echo $table_name = str_replace(' ', '_', $table_name);
        
        if($subject_type == "lecture")
        {
            $sql = "select lecturecount from teacher_count where teachername='$teacher_name_count' AND lecturename='$subject_name_count' AND studentsemester='$student_semester' AND teacherdepartment='$session_department_admin_department'";
            $result = $conn->query($sql);
            $count = $result->num_rows;

            if($count>0)
            {
                $sql3 = "select lecturecount,teachername,lecturename from teacher_count where teachername!='$teacher_name_count' AND lecturename='$subject_name_count' AND studentsemester='$student_semester' AND teacherdepartment='$session_department_admin_department'";
                $result1 = $conn->query($sql3);
                $count1 = $result1->num_rows;
                
                //echo $another_value;
                $row = $result->fetch_array();

                $lecture_count = $row['lecturecount'];  
                
                $total_lecture_count = $lecture_count + 1;

                $sql1 = "insert into teacher_count(teachername,teacherdepartment,studentyear,studentsemester,workingdate,lecturename) values('$teacher_name_count','$session_department_admin_department','$student_year','$student_semester','$attendance_date','$subject_name_count')"; 
                $conn->query($sql1);

                $sql2 = "update teacher_count set lecturecount='$total_lecture_count' where (teachername='$teacher_name_count' AND lecturename='$subject_name_count' AND studentsemester='$student_semester')";
                $conn->query($sql2);
                echo "lecture already entered";
            }
            else
            {
                $count = 1;
                $total_lecture_count="";

                $sql1 = "insert into teacher_count(teachername,teacherdepartment,studentyear,studentsemester,workingdate,lecturename,lecturecount) values('$teacher_name_count','$session_department_admin_department','$student_year','$student_semester','$attendance_date','$subject_name_count','$count')"; 
                $conn->query($sql1);
                echo "entered first time lecture";
            }
        }
        else if($subject_type == "practical")
        {
            $sql = "select practicalcount from teacher_count where teachername='$teacher_name_count' AND tutorialname='$subject_name_count' AND studentsemester='$student_semester' AND teacherdepartment='$session_department_admin_department'";
            $result = $conn->query($sql);
            $count = $result->num_rows;

            if($count>0)
            {
                $row = $result->fetch_array();

                $practical_count = $row['practicalcount'];

                $total_practical_count = $practical_count + 1;

                $sql1 = "insert into teacher_count(teachername,teacherdepartment,studentyear,studentsemester,workingdate,practicalname) values('$teacher_name_count','$session_department_admin_department','$student_year','$student_semester','$attendance_date','$subject_name_count')"; 
                $conn->query($sql1);

                $sql2 = "update teacher_count set practicalcount='$total_practical_count' where (teachername='$teacher_name_count' AND practicalname='$subject_name_count' AND studentsemester='$student_semester')";
                $conn->query($sql2);
                echo "practical already entered";
            }
            else
            {
                $count = 1;
                $total_practical_count="";

                $sql1 = "insert into teacher_count(teachername,teacherdepartment,studentyear,studentsemester,workingdate,practicalname,practicalcount) values('$teacher_name_count','$session_department_admin_department','$student_year','$student_semester','$attendance_date','$subject_name_count','$count')"; 
                $conn->query($sql1);
                echo "entered first time practical";
            }

        }
        else if($subject_type == "tutorial")
        {
            $sql = "select tutorialcount from teacher_count where teachername='$teacher_name_count' AND lecturename='$subject_name_count' AND studentsemester='$student_semester' AND teacherdepartment='$session_department_admin_department'";
            $result = $conn->query($sql);
            $count = $result->num_rows;

            if($count>0)
            {
                $row = $result->fetch_array();

                $tutorial_count = $row['tutorialcount'];

                $total_tutorial_count = $tutorial_count + 1;

                $sql1 = "insert into teacher_count(teachername,teacherdepartment,studentyear,studentsemester,workingdate,tutorialname) values('$teacher_name_count','$session_department_admin_department','$student_year','$student_semester','$attendance_date','$subject_name_count')"; 
                $conn->query($sql1);

                $sql2 = "update teacher_count set tutorialcount='$total_tutorial_count' where (teachername='$teacher_name_count' AND tutorialname='$subject_name_count' AND studentsemester='$student_semester')";
                $conn->query($sql2);
                echo "tutorial already entered";
            }
            else
            {
                $count = 1;
                $total_tutorial_count="";
                
                $sql1 = "insert into teacher_count(teachername,teacherdepartment,studentyear,studentsemester,workingdate,tutorialname,tutorialcount) values('$teacher_name_count','$session_department_admin_department','$student_year','$student_semester','$attendance_date','$subject_name_count','$count')"; 
                $conn->query($sql1);
                echo "entered first time tutorial";
            }
        }

        

        echo "<br><a href='takeattendancepage.php'>Back</a>";

        for($i=0;$i<count($_POST["rollno"]);$i++)  
        {  
            $rollno = $_POST["rollno"][$i];     
            $student_name = $_POST["name"][$i];     
            $student_branch = $_POST["branch"][$i];
            $student_year = $_POST["year"][$i];     
            $student_semester = $_POST["semester"][$i];
            $student_batch = $_POST["batch"][$i];     
            $teacher_name = $_POST["teacher"][$i]; //teacher name
            $subject_name = $_POST["subject"][$i]; //teacher subject
            $student_attendance = $_POST["attendance"][$i]; 

            
            if($student_attendance == 1)
            {
                $present = 1;
                $absent = 0;
            }
            else
            {
                $present = 0;
                $absent = 1;
            }
            if($subject_type == "lecture")
            {
                if($total_lecture_count=="")
                {
                    $total_lecture_count=1;
                }

                $sql = "select * from `".$table_name."` where (teachername='$teacher_name' AND lecturename='$subject_name' AND semester='$student_semester' AND rollno='$rollno')";
                $result = $conn->query($sql);
                $count = $result->num_rows;
            
                if($count>0)
                {
                    while($row = $result->fetch_array())
                    {
                        $total_present_count = $row['totalpresent'];
                        $total_absent_count = $row['totalabsent'];
                        //$present_count = $row['studentpresent'];
                        //$absent_count = $row['studentabsent'];
                    }

                    if($present == 1)
                    {
                        $total_present = 1 + $total_present_count;
                        $total_absent = $total_absent_count + 0;
                    }
                    else
                    {
                        $total_present = $total_present_count + 0;
                        $total_absent = 1 + $total_absent_count + 0;
                    }

                    $sql = "insert into `".$table_name."`(rollno,name,department,year,semester,batch,workingdate,teachername,lecturename,totallecture,studentpresent,studentabsent,totalpresent,totalabsent) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conn->prepare($sql);
                    $query->bind_param("issssssssiiiii",$rollno,$student_name,$student_branch,$student_year,$student_semester,$student_batch,$attendance_date,$teacher_name,$subject_name,$total_lecture_count,$present,$absent,$total_present,$total_absent);
                    $query->execute();
                    $query->close();

                    $sql3 = "update `".$table_name."` set totallecture='$total_lecture_count' where (teachername='$teacher_name' AND lecturename='$subject_name' AND semester='$student_semester')";
                    $conn->query($sql3);

                    $sql4 = "update `".$table_name."` set totalpresent='$total_present',totalabsent='$total_absent' where (teachername='$teacher_name' AND lecturename='$subject_name' AND semester='$student_semester' AND rollno='$rollno')";
                    $conn->query($sql4);
                }
                else
                {
                    if($present == 1)
                    {
                        $total_present = 1;
                        $total_absent = 0;
                    }
                    else
                    {
                        $total_absent = 1;
                        $total_present = 0;
                    }
                
                    $sql = "insert into `".$table_name."`(rollno,name,department,year,semester,batch,workingdate,teachername,lecturename,totallecture,studentpresent,studentabsent,totalpresent,totalabsent) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conn->prepare($sql);
                    $query->bind_param("issssssssiiiii",$rollno,$student_name,$student_branch,$student_year,$student_semester,$student_batch,$attendance_date,$teacher_name,$subject_name,$total_lecture_count,$present,$absent,$total_present,$total_absent);
                    $query->execute();
                    $query->close();
                }
            }     //for practical
            else if($subject_type == "practical")
            {
                if($total_practical_count=="")
                {
                    $total_practical_count=1;
                }

                $sql = "select * from `".$table_name."` where (teachername='$teacher_name' AND practicalname='$subject_name' AND semester='$student_semester' AND rollno='$rollno')";
                $result = $conn->query($sql);
                $count = $result->num_rows;
            
                if($count>0)
                {
                    while($row = $result->fetch_array())
                    {
                        $total_present_count = $row['totalpresent'];
                        $total_absent_count = $row['totalabsent'];
                        //$present_count = $row['studentpresent'];
                        //$absent_count = $row['studentabsent'];
                    }

                    if($present == 1)
                    {
                        $total_present = 1 + $total_present_count;
                        $total_absent = $total_absent_count + 0;
                    }
                    else
                    {
                        $total_present = $total_present_count + 0;
                        $total_absent = 1 + $total_absent_count + 0;
                    }

                    $sql = "insert into `".$table_name."`(rollno,name,department,year,semester,batch,workingdate,teachername,practicalname,totalpractical,studentpresent,studentabsent,totalpresent,totalabsent) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conn->prepare($sql);
                    $query->bind_param("issssssssiiiii",$rollno,$student_name,$student_branch,$student_year,$student_semester,$student_batch,$attendance_date,$teacher_name,$subject_name,$total_lecture_count,$present,$absent,$total_present,$total_absent);
                    $query->execute();
                    $query->close();

                    $sql3 = "update `".$table_name."` set totalpractical='$total_practical_count' where (teachername='$teacher_name' AND practicalname='$subject_name' AND semester='$student_semester')";
                    $conn->query($sql3);

                    $sql4 = "update `".$table_name."` set totalpresent='$total_present',totalabsent='$total_absent' where (teachername='$teacher_name' AND practicalname='$subject_name' AND semester='$student_semester' AND rollno='$rollno')";
                    $conn->query($sql4);
                }
                else
                {
                    if($present == 1)
                    {
                        $total_present = 1;
                        $total_absent = 0;
                    }
                    else
                    {
                        $total_absent = 1;
                        $total_present = 0;
                    }
                
                    $sql = "insert into `".$table_name."`(rollno,name,department,year,semester,batch,workingdate,teachername,practicalname,totalpractical,studentpresent,studentabsent,totalpresent,totalabsent) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conn->prepare($sql);
                    $query->bind_param("issssssssiiiii",$rollno,$student_name,$student_branch,$student_year,$student_semester,$student_batch,$attendance_date,$teacher_name,$subject_name,$total_practical_count,$present,$absent,$total_present,$total_absent);
                    $query->execute();
                    $query->close();
                }
  
            }
            else if($subject_type == "tutorial")
            {
                if($total_tutorial_count=="")
                {
                    $total_tutorial_count=1;
                }

                $sql = "select * from `".$table_name."` where (teachername='$teacher_name' AND tutorialname='$subject_name' AND semester='$student_semester' AND rollno='$rollno')";
                $result = $conn->query($sql);
                $count = $result->num_rows;
            
                if($count>0)
                {
                    while($row = $result->fetch_array())
                    {
                        $total_present_count = $row['totalpresent'];
                        $total_absent_count = $row['totalabsent'];
                        //$present_count = $row['studentpresent'];
                        //$absent_count = $row['studentabsent'];
                    }

                    if($present == 1)
                    {
                        $total_present = 1 + $total_present_count;
                        $total_absent = $total_absent_count + 0;
                    }
                    else
                    {
                        $total_present = $total_present_count + 0;
                        $total_absent = 1 + $total_absent_count + 0;
                    }

                    $sql = "insert into `".$table_name."`(rollno,name,department,year,semester,batch,workingdate,teachername,tutorialname,totaltutorial,studentpresent,studentabsent,totalpresent,totalabsent) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conn->prepare($sql);
                    $query->bind_param("issssssssiiiii",$rollno,$student_name,$student_branch,$student_year,$student_semester,$student_batch,$attendance_date,$teacher_name,$subject_name,$total_tutorial_count,$present,$absent,$total_present,$total_absent);
                    $query->execute();
                    $query->close();

                    $sql3 = "update `".$table_name."` set totalpractical='$total_tutorial_count' where (teachername='$teacher_name' AND tutorialname='$subject_name' AND semester='$student_semester')";
                    $conn->query($sql3);

                    $sql4 = "update `".$table_name."` set totalpresent='$total_present',totalabsent='$total_absent' where (teachername='$teacher_name' AND tutorialname='$subject_name' AND semester='$student_semester' AND rollno='$rollno')";
                    $conn->query($sql4);
                }
                else
                {
                    if($present == 1)
                    {
                        $total_present = 1;
                        $total_absent = 0;
                    }
                    else
                    {
                        $total_absent = 1;
                        $total_present = 0;
                    }
                
                    $sql = "insert into `".$table_name."`(rollno,name,department,year,semester,batch,workingdate,teachername,tutorialname,totaltutorial,studentpresent,studentabsent,totalpresent,totalabsent) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conn->prepare($sql);
                    $query->bind_param("issssssssiiiii",$rollno,$student_name,$student_branch,$student_year,$student_semester,$student_batch,$attendance_date,$teacher_name,$subject_name,$total_tutorial_count,$present,$absent,$total_present,$total_absent);
                    $query->execute();
                    $query->close();
                }
  
            }
        }  
    }
    else
    {
        echo "error";
        echo "<br><a href='takeattendancepage.php'>Back</a>";
    }
?>