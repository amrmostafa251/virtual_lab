<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="givegrade.css">
        <title>assign Task for Student</title>
    </head>
    <body>
        <?php
        // Check if the user is logged in and is an instructor
        session_start();
        if (($_SESSION['userType'] != 'instructors') && (!isset($_SESSION['email']))) 
        {
            // Redirect to the home page
            header("Location: homepage.php");
            exit();
        }    
        try 
        {
            // Connect to the database
            require_once 'connection.php';  
            // Get the instructor's name and email from the database
            $email = $_SESSION['email'];
            $stmt = $conn->prepare("SELECT user_name, email FROM instructors WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $row = $stmt->fetch();
        }
        catch (PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>

        <div class="topnav">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">Experiments
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="mydropdown">
                    <a href="#">FM Modulation</a>
                    <a href="#">AM Modulation</a>
                    <a href="#">OFDM</a>
                </div>
            </div>
            <a href="logout.php" class="logout">Logout</a>
            <p class="email"><?php echo $email; ?></p>
        </div>
        <form action="give_task.php" method="post">
            <label for="sec_id">Select a section :</label>
            <select id="sec_id" name="sec_id">
                <option value="" selected disabled>Select a section</option>
                <?php
                    // Retrieve the list of unique student IDs from the tasks table
                    $stmt = $conn->prepare("SELECT DISTINCT sec_id FROM sections_students");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                    {
                        echo "<option value=\"{$row['sec_id']}\">{$row['sec_id']}</option>";
                    }
                ?>
            </select>
            <label for="student_id">Select a student:</label>
            <select id="student_id" name="student_id" type="number" disabled>
                <option value="" selected disabled>Select a student</option>
            </select>
            <label for="exp">select an experment :</label>
            <select id="exp" name="exp">
                <option value="" selected disabled>Select an experiment</option>
                <?php
                    // Retrieve the list of unique student IDs from the tasks table
                    $stmt = $conn->prepare("SELECT  exp FROM exp");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                    {
                        echo "<option value=\"{$row['exp']}\">{$row['exp']}</option>";
                    }
                ?>
            </select>
            
            <button type="submit", name ="submit">Submit</button>
        </form>

        <script>
            // Dynamically populate the second dropdown list based on the selected value in the first dropdown list
            document.getElementById("sec_id").addEventListener("change", function() 
            {
                var secId = this.value;
                
                var studentSelect = document.getElementById("student_id");
                studentSelect.disabled = true;
                studentSelect.innerHTML = "<option value='' selected disabled>Select a student</option>";
                if (secId) 
            {
                // Retrieve the list of students for the selected sec ID from the sections_students table
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() 
                {
                    if (this.readyState === 4 && this.status === 200) 
                    {
                        var students = JSON.parse(this.responseText);
                        for (var i = 0; i < students.length; i++) 
                        {
                            studentSelect.innerHTML += "<option value=\"" + students[i].student + "\">" + students[i].student + "</option>";
                        }
                        studentSelect.disabled = false;
                    }
                };
                xhr.open("GET", "get_students.php?sec_id=" + secId, true);
                xhr.send();
            }
        });
      
        function populatestudentSelect(students) {
            console.log(students);
  var studentSelect = document.getElementById("student_id");
  studentSelect.disabled = true;
  studentSelect.innerHTML = "<option value='' selected disabled>Select a student</option>";
  for (var i = 0; i < students.length; i++) {
    studentSelect.innerHTML += "<option value=\"" + students[i].user_id + "\">" + students[i].user_id + "</option>";
  }
  
  studentSelect.disabled = false;
}

        
    </script>

    </body>
    
</html>