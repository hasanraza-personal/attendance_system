<?php
    include("../connection.php");
    include("departmentadminsession.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Document</title>
    <style>
        table 
        {
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
</head>

<?php
    //$session_department_admin_department
    //Sending subject of particulat sem to takeattendancepage.php
    if(isset($_POST['checksemester']))
    {
        $semester = htmlspecialchars($_POST['checksemester']);
        echo $subject_type = htmlspecialchars($_POST['postsubjecttype']);

        if($subject_type == "lecture")
        {
            echo "lecture";
            $sql = "select subject1,subject2 from teacher where teacherdepartment='$session_department_admin_department' AND teachersemester='$semester'";
            $result = $conn->query($sql);
            $count=$result->num_rows;
        }
        else if($subject_type == "practical")
        {
            echo "practical";
            $sql = "select practical1,practical2 from teacher where teacherdepartment='$session_department_admin_department' AND teachersemester='$semester'";
            $result = $conn->query($sql);
            $count=$result->num_rows;
        }
        else if($subject_type == "tutorial")
        {
            echo "tutorial";
            $sql = "select tutorial from teacher where teacherdepartment='$session_department_admin_department' AND teachersemester='$semester'";
            $result = $conn->query($sql);
            echo $count=$result->num_rows;
        }

        if($count>0)
        {
            if($subject_type == "tutorial")
            {
                $subject_3 = array();
            }
            else
            {
                $subject_0 = array();
                $subject_0 = array();
            }
?>
            <div class="teacher_subject">
        <?php
            while($row=$result->fetch_array())
            {
                if($subject_type == "lecture")
                {
                    $subject_1[]=$row['subject1'];
                    $subject_2[]=$row['subject2'];
                }
                else if($subject_type == "practical")
                {
                    $subject_1[]=$row['practical1'];
                    $subject_2[]=$row['practical2'];
                }
                else if($subject_type == "tutorial")
                {
                    $subject_3[]=$row['tutorial'];
                }
            }
                if($subject_type!="tutorial")
                {
                    $subject_0 = (array_merge($subject_1,$subject_2));
                    $subject_0 = array_filter($subject_0);//remove empty value from array
                    $subject_0 = array_unique($subject_0);
                
                    $subject_0=(array_values($subject_0));//reset aaray index values
                
                    $main_count=count($subject_0);
                }
                if($subject_type == "tutorial")
                {
                    $subject_0 = array_filter($subject_3);

                    $subject_0=(array_values($subject_0));//reset aaray index values
                    print_r($subject_0);
                    $main_count=count($subject_0);
                    
                }
                for($i=0;$i<$main_count;$i++)
	            {
                    $subject = $subject_0[$i];
                
        ?>
                <button id="changesubjectcolor" class="subjectcolor" onclick="Checksubject1('<?php echo $subject;?>'); Changesubjectcolor(this);"><?php echo $subject;?></button>

                <script type="text/javascript">
                    function Checksubject1(subject1)
                    {
                        var subject = subject1;
                        //console.log(subject);
                        
                        Checksubject(subject1);
                    }
                    function Changesubjectcolor(subjectbtn)
                    {   
                        var s_color = document.getElementsByClassName("subjectcolor");

                        for (var i=0; i<s_color.length; i++) 
                        {
                            s_color[i].style.backgroundColor = "#5cb85c";
                        }

                        subjectbtn.style.backgroundColor = "yellow";
                    }
                </script>
        <?php  
                }
        ?>
            </div>
<?php
        }
        else
        {
            echo "no data found";
        }
    }



    if(isset($_POST['checksubject']))
    {
        $subject = htmlspecialchars($_POST['checksubject']);
        echo $subject_type = htmlspecialchars($_POST['postsubjecttype']);

        if($subject_type == "lecture")
        {
            $sql = "select teachername,teachersemester from teacher where teacherdepartment=? AND subject1=? OR subject2=?";
            $query = $conn->prepare($sql);
            $query->bind_param("sss",$session_department_admin_department,$subject,$subject);
            $query->execute();
            $query->store_result();
            $result = $query->num_rows;
            $query->bind_result($teacher,$semester);
        }
        else if($subject_type == "practical")
        {
            $sql = "select teachername,teachersemester from teacher where teacherdepartment=? AND practical1=? OR practical2=?";
            $query = $conn->prepare($sql);
            $query->bind_param("sss",$session_department_admin_department,$subject,$subject);
            $query->execute();
            $query->store_result();
            $result = $query->num_rows;
            $query->bind_result($teacher,$semester);
        }
        else if($subject_type == "tutorial")
        {
            $sql = "select teachername,teachersemester from teacher where teacherdepartment=? AND tutorial=?";
            $query = $conn->prepare($sql);
            $query->bind_param("ss",$session_department_admin_department,$subject);
            $query->execute();
            $query->store_result();
            $result = $query->num_rows;
            $query->bind_result($teacher,$semester);
        }

        if($result>0)
        {
?>
            <div class="teacher_subject">
        <?php
            while($query->fetch())
            {
        ?>
                <button class="teachercolor" id= "changeteachetcolor" onclick="Checkteachersemester('<?php echo $semester;?>','<?php echo $teacher;?>','<?php echo $subject;?>'); Changeteachercolor(this);"><?php echo $teacher;?></button>
                

                <script type="text/javascript">
                    function Checkteachersemester(semester,teacher,subject)
                    {
                        //console.log(semester);
                        //console.log(teacher);
                        Checkteachersemester1(semester,teacher,subject);
                    }
                    function Changeteachercolor(teacherbtn)
                    {
                        var t_color = document.getElementsByClassName("teachercolor");
                        for(var i=0;i<t_color.length;i++)
                        {
                            t_color[i].style.backgroundColor = "#5cb85c";
                        }
                        teacherbtn.style.backgroundColor = "yellow";
                    }
                </script>
        <?php  
            }
        ?>
            </div>
<?php
        }
        else
        {
            echo "no data found";
        }
    }
?>


<?php

if(isset($_POST['teachersemester']))
{
    echo $subject_type = htmlspecialchars($_POST['postsubject_type']);
    $student_semester = htmlspecialchars($_POST['teachersemester']);
    $teacher = htmlspecialchars($_POST['postteacher']);
    $subject = htmlspecialchars($_POST['postsubject']);

    $sql = "select srno,studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch from student where studentdepartment=? And studentsemester=?";
    $query = $conn->prepare($sql);
    $query->bind_param("ss",$session_department_admin_department,$student_semester);
    $query->execute();
    $query->store_result();
    $result = $query->num_rows;
    $query->bind_result($srno,$name,$rollno,$branch,$year,$semester,$batch);

    if($result>0)
    {
?>  
    <form method="post" action="submitattendance.php">
        <br><br>
        <label>Attendance Date</label>
        <input type="date" id="attendancedate" name="attendancedate" required>
        <input type="hidden" id="subjecttype" name="subjecttype" value="<?php echo $subject_type;?>">
        <br><br>
    <?php
        $count = 1;
    ?>
    <table>
        <tr>
            <th>srno</th>
            <th>Rollno</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Batch</th>
            <th>Teacher</th>
            <th>Subject</th>
            <th>Present/Absent</th>
        </tr>
        <?php
            while($query->fetch())
            {
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $rollno;?></td>
            <td><?php echo $name;?></td>
            <td><?php echo $branch;?></td>
            <td><?php echo $year;?></td>
            <td><?php echo $semester;?></td>
            <td><?php echo $batch;?></td>
            <td><?php echo $teacher;?></td>
            <td><?php echo $subject;?></td>
            <td>
                <input type="hidden" id="rollno" name="rollno[]" value="<?php echo $rollno;?>">
                <input type="hidden" id="name" name="name[]" value="<?php echo $name;?>">
                <input type="hidden" id="branch" name="branch[]" value="<?php echo $branch;?>">
                <input type="hidden" id="year" name="year[]" value="<?php echo $year;?>">
                <input type="hidden" id="semester" name="semester[]" value="<?php echo $semester;?>">
                <input type="hidden" id="batch"  name="batch[]" value="<?php echo $batch;?>">
                <input type="hidden" id="teacher" name="teacher[]" value="<?php echo $teacher;?>">
                <input type="hidden" id="subject" name="subject[]" value="<?php echo $subject;?>">


                <input type="hidden" id="studentyear" name="studentyear" value="<?php echo $year;?>">
                <input type="hidden" id="studentsemester" name="studentsemester" value="<?php echo $semester;?>">
                <input type="hidden" id="teachercount" name="teachercount" value="<?php echo $teacher;?>">
                <input type="hidden" id="subjectcount" name="subjectcount" value="<?php echo $subject;?>">

                <input type="radio" name="attendance[].<?php echo $count;?>" value="1" checked>
                <label>Present<label>
                <input type="radio" name="attendance[].<?php echo $count;?>" value="0">
                <label>Absent<label>
                
            </td>
        </tr>
        <?php $count++; } ?>
    </table>
                    <button type="submit" name="submitattendance1">Submit Attendance</button>
                </form>

    <?php

    }
    else
    {
        echo "no data found";
    }
}


?>