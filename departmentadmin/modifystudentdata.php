<?php
    include("../connection.php");
    include("departmentadminsession.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table {
  border-collapse: collapse;
  width: 70%;
}

td, th {

  border: 1px solid black;
  text-align: center;
  padding: 10px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

</head>
<body>

</body>
</html>

<?php
    if(isset($_POST['deleterollno']))
    {
        $student_rollno = htmlspecialchars($_POST['deleterollno']);
        $student_semester = htmlspecialchars($_POST['postsemester']);

        $sql = "delete from student where studentrollno=?";
        $query = $conn->prepare($sql);
        $query->bind_param("i",$student_rollno);
        $query->execute();
        $query->close();


        $sql = "select srno,studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch from student where studentdepartment=? And studentsemester=?";
        $query = $conn->prepare($sql);
        $query->bind_param("ss",$session_department_admin_department,$student_semester);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($srno,$name,$rollno,$branch,$year,$semester,$batch);

        if($result>0)
        {
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
                <th>Modify</th>
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
                <td>
                    <button onclick="Editstudent('<?php echo $rollno;?>','<?php echo $semester;?>');">edit</button>
                    <button onclick="Deletestudent('<?php echo $rollno;?>','<?php echo $semester;?>');">delete</button>
                </td>
            </tr>
            <?php $count++; } ?>
        </table>

        <?php

        }
        else
        {
            echo "no data found";
        }
    }



    if(isset($_POST['editrollno']))
    {
        $student_rollno = htmlspecialchars($_POST['editrollno']);
        $student_semester = htmlspecialchars($_POST['postsemester']);

        $sql = "select srno,studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch from student where studentdepartment=? And studentsemester=?";
        $query = $conn->prepare($sql);
        $query->bind_param("ss",$session_department_admin_department,$student_semester);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($srno,$name,$rollno,$branch,$year,$semester,$batch);

        if($result>0)
        {
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
                <th>Modify</th>
            </tr>
            <?php
                while($query->fetch())
                {
            ?>

            <?php
                if($student_rollno==$rollno)
                {
            ?>
                    <tr>
                    <input type="hidden" id="srno1" value="<?php echo $srno;?>">
                        <td><input type="text" id="srno" value="<?php echo $count;?>" readonly></td>
                        <td><input type="text" id="rollno" value="<?php echo $rollno;?>"></td>
                        <td><input type="text" id="name" value="<?php echo $name;?>"></td>
                        <td><input type="text" value="<?php echo $branch;?>" disabled></td>
                        <td><input type="text" id="year" value="<?php echo $year;?>" readonly></td>
                        <td><input type="text" id="semester"value="<?php echo $semester;?>"></td>
                        <td><input type="text" id="batch" value="<?php echo $batch;?>"></td>
                    <td>
                    <button onclick="Update();">update</button>
                </td>
            </tr>
            <script type="text/javascript">

                function Update()
                {   
                    var student_srno1 = document.getElementById("srno1").value;
                    var student_srno = document.getElementById("srno").value;
                    var student_rollno = document.getElementById("rollno").value;
                    var student_name = document.getElementById("name").value;
                    var student_year = document.getElementById("year").value;
                    var student_semester = document.getElementById("semester").value;
                    var student_batch = document.getElementById("batch").value;


                    Updatestudent(student_srno1,student_srno,student_rollno,student_name,student_year,student_semester,student_batch)
                }

            </script>
            <?php
                }
                else
                {
            ?>
            <tr>
                <td><?php echo $srno;?></td>
                <td><?php echo $rollno;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $branch;?></td>
                <td><?php echo $year;?></td>
                <td><?php echo $semester;?></td>
                <td><?php echo $batch;?></td>
                <td>
                    <button onclick="Editstudent('<?php echo $rollno;?>','<?php echo $semester;?>');">edit</button>
                    <button onclick="Deletestudent('<?php echo $rollno;?>','<?php echo $semester;?>');">delete</button>
                </td>
            </tr>
            <?php } $count++; } ?>
        </table>

        <?php

        }
        else
        {
            echo "no data found";
        }
    }



    if(isset($_POST['updaterollno']))
    {
        $student_srno = htmlspecialchars($_POST['updatesrno']);
        echo $student_rollno = htmlspecialchars($_POST['updaterollno']);
        $student_name = htmlspecialchars($_POST['updatename']);
        $student_year = htmlspecialchars($_POST['updateyear']);
        $student_semester = htmlspecialchars($_POST['updatesemester']);
        $student_batch = htmlspecialchars($_POST['updatebatch']);

        $sql = "update student set studentrollno=?,studentname=?,studentyear=?,studentsemester=?,studentbatch=? where srno=?";
        $query = $conn->prepare($sql);
        $query->bind_param("ssssss",$student_rollno,$student_name,$student_year,$student_semester,$student_batch,$student_srno);
        $query->execute();
        $query->close();


        $sql = "select srno,studentname,studentrollno,studentdepartment,studentyear,studentsemester,studentbatch from student where studentdepartment=? And studentsemester=?";
        $query = $conn->prepare($sql);
        $query->bind_param("ss",$session_department_admin_department,$student_semester);
        $query->execute();
        $query->store_result();
        $result = $query->num_rows;
        $query->bind_result($srno,$name,$rollno,$branch,$year,$semester,$batch);

        if($result>0)
        {
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
                <th>Modify</th>
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
                <td>
                    <button onclick="Editstudent('<?php echo $rollno;?>','<?php echo $semester;?>');">edit</button>
                    <button onclick="Deletestudent('<?php echo $rollno;?>','<?php echo $semester;?>');">delete</button>
                </td>
            </tr>
            <?php $count++; } ?>
        </table>

        <?php

        }
        else
        {
            echo "no data found";
        }
    }


?>