

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
  font-family: arial, sans-serif;
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
    if(isset($_POST['checksemester']))
    {
        $student_semester = htmlspecialchars($_POST['checksemester']);
        //$session_department_admin_department;

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

        <table >
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

<script type="text/javascript">

    function Deletestudent(roll,sem)
    {
        var rollno = roll;
        var semester = sem;
        console.log(rollno);
        console.log(semester);

        $.ajax({
                url : "modifystudentdata.php",
                method : "POST",
                data :  {deleterollno:rollno,postsemester:semester},
                success : function(data)
                {
                    if(data == "no data found")
                    {
                        $(".display").html(data);
                    }
                    else
                    {
                        $(".display").html(data);
                    }
                }
                });
    }

    function Editstudent(roll,sem)
    {
        var rollno = roll;
        var semester = sem;
        console.log(rollno);
        console.log(semester);

        $.ajax({
                url : "modifystudentdata.php",
                method : "POST",
                data :  {editrollno:rollno,postsemester:semester},
                success : function(data)
                {
                    if(data == "no data found")
                    {
                        $(".display").html(data);
                    }
                    else
                    {
                        $(".display").html(data);
                    }
                }
                });
    }

    function Updatestudent(srno1,srno,rollno,name,year,semester,batch)
    {
        console.log("srno is "+srno1);
        console.log("name is "+name);
        console.log("year is "+year);
        console.log("rollno is "+rollno);
        console.log("semester is "+semester);
        console.log("batch is "+batch);

        $.ajax({
                url : "modifystudentdata.php",
                method : "POST",
                data :  {updatesrno:srno1,updaterollno:rollno,updatename:name,updateyear:year,updatesemester:semester,updatebatch:batch},
                success : function(data)
                {
                    if(data == "no data found")
                    {
                        $(".display").html(data);
                    }
                    else
                    {
                        $(".display").html(data);
                    }
                }
                });
    }


</script>