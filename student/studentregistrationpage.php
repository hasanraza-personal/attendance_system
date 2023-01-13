<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Studentregistration</title>
    </head>

    <body>

    <div class="student_reg_box">
        <div class="student_reg_form">
        <p>Student Registration </p>
        <form method="post" action="addstudent.php" id="studentregistrationform">
            <label>Name</label>
            <input type="text" name="studentname" id="studentname" required>
            <br><br>
            <label>Roll no</label>
            <input type="number" name="studentrollno" id="rollno" required onfocusout="Searchrollno();">
            <br><br>
            <div class="rollnoerror"></div>
            <label>Department</label>
            <select name="studentdepartment" id="department" required>
                <option>Select department</option>
                <option>IT</option>
                <option>COMPUTER</option>
                <option>MECHANICAL</option>
                <option>CIVIL</option>
                <option>AUTOMOBILE</option>
            </select>
            <br><br>
            <label>Year</label>
            <select name="studentyear" id="year" onchange="random();" required>
                <option>Select year</option>
                <option>First year</option>
                <option>Second year</option>
                <option>Third year</option>
                <option>Fourth year</option>
            </select>
            <br><br>
            <label>Semester:</label>

            <div id="sem_output">
                <select id="semester">
                    <option>Select semester</option>
                </select>
            </div>
            <br>
            <label>Batch</a>
            <select name="studentbatch" id="batch" required>
                <option>Select batch</option>
                <option>A batch</option>
                <option>B batch</option>
                <option>C batch</option>
            </select>
            <br><br>
            <button type="submit" id="registerbutton" name="registerstudent" onclick="event.preventDefault(); Checkfield();">Register</button>
            <div class="submiterror"></div>
            <br>
            <a href="studentloginpage.php">Back</a>
</div>
</div>
        </form>
    </body>

<script type="text/javascript">

    function random()
    {
        var year = document.getElementById("year").value;
        //console.log(year);
        if(year == "First year")
        {
            var sem=["First semester","Second semester"];
        }
        else if(year == "Second year")
        {
            var sem=["Third semester","Fourth semester"];
        }
        else if(year == "Third year")
        {
            var sem=["Fifth semester","Sixth semester"];
        }
        else if(year == "Fourth year")
        {
            var sem=["Seventh semester","Eighth semester"];
        }
        else if(year=="Select year")
        {
            var sem=["Select year"];
        }

        var string="";
        for(i=0;i<sem.length;i++)
        {
            string=string+"<option>"+sem[i]+"</option>";
        }
        //console.log(string);
        string="<select name='studentsemester' id='semester'>"+string+"<select>";
        document.getElementById("sem_output").innerHTML=string;
    }

    function Checkfield()
    {
        var name = document.getElementById("studentname").value;
        var rollno = document.getElementById("rollno").value;
        var dept =  document.getElementById("department").value;
        var year = document.getElementById("year").value;
        var sem = document.getElementById("semester").value;
        var batch = document.getElementById("batch").value;

        if((dept=="Select department")||(year=="Select year")||(sem=="Select semester")||(batch=="Select batch")||(name=="")||(rollno==""))
        {
            alert("please fill all details");
        }
        else
        {
            $.ajax({
            url : "addstudent.php",
            method : "POST",
            data :  {checkrollno:rollno},
            success : function(data)
            {
                if(data=="Rollno already registered")
                {
                    $(".submiterror").html(data)
                }
                else
                {
                    document.getElementById("registerbutton").onclick=null;
        	        document.getElementById("studentregistrationform").submit();
        	        document.getElementById("studentregistrationform").reset();
                }

            }
        });
        }
    }

    function Searchrollno()
    {
        var rollno = document.getElementById("rollno").value;
        console.log(rollno);

        $.ajax({
            url : "addstudent.php",
            method : "POST",
            data :  {checkrollno:rollno},
            success : function(data)
            {
                $(".rollnoerror").html(data);
            }
        });
    }
</script>
</html>