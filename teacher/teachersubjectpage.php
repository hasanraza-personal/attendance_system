<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../jquery/jquery.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Teacherregistration</title>
    </head>

    <body>
        <div class="teacher_reg_box">
        <div class="teacher_reg_form">
        <p>Add Subject</p>

        <form method="post" id="form">
            <label>Semester</label><span class="required">*</span>
            <select name="teachersemester" id="semester" required>
                <option>Select semester</option>
                <option>First semester</option>
                <option>Second semester</option>
                <option>Third semester</option>
                <option>Fourth semester</option>
                <option>Fifth semester</option>
                <option>Sixth semester</option>
                <option>Seventh semester</option>
                <option>Eighth semester</option>
            </select>
            <br><br>
            <label>Subject 1 :</label>
            <br>
            <input type="text" name="subject1" id="subject1">
            <br><br>
            <label>Subject 2 :</label>
            <br>
            <input type="text" name="subject2" id="subject2">
            <br><br>
            <label>Practical 1 :</label>
            <br>
            <input type="text" name="practical1" id="practical1">
            <br><br>
            <label>Practical 2 :</label>
            <br>
            <input type="text" name="practical2" id="practical2">
            <br><br>
            <label>Tutorial :</label>
            <br>
            <input type="text" name="tutorial" id="tutorial">
            <br><br>
            <button type="submit" id="addsubjectbutton" onclick="event.preventDefault(); Checkform();">Add subject</button>
            <br>
            <a href="teacherhomepage.php">Back</a>
            <div class="notify"></div>
        </form>

        <script type="text/javascript">

        function Checkform()
        {
            var sem = document.getElementById("semester").value;
            var sub1 = document.getElementById("subject1").value;
            var sub2 = document.getElementById("subject2").value;
            var prac1 = document.getElementById("practical1").value;
            var prac2 = document.getElementById("practical2").value;
            var tut = document.getElementById("tutorial").value;

            if((sem=="Select semester") || ((sub1=="")&&(prac1=="")&&(tut=="")))
            {
                alert("Please select Semester OR Please fill the first Field of Subject or Practical or Tutorial");
            }
            else
            {
            $.ajax({
                    url : "addteachersubject.php",
                    method : "POST",
                    data :  {teachersemester:sem,subject1:sub1,subject2:sub2,practical1:prac1,practical2:prac2,tutorial:tut},
                    success : function(data)
                    {
                        if(data == "error occured")
                        {
                            $(".notify").html(data);
                        }
                        else
                        {   
        	                document.getElementById("form").reset();
                            $(".notify").html(data);
                        }
                    }
                });
            }
        }

        </script>
    </body>
</html>