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
        <form action="give_grade.php" method="post">
            <label for="student_id">Select a student:</label>
            <select id="student_id" name="student_id">
                <option value="" selected disabled>Select a student</option>
                <?php
                    // Retrieve the list of unique student IDs from the tasks table
                    $stmt = $conn->prepare("SELECT DISTINCT student_id FROM tasks");
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                    {
                        echo "<option value=\"{$row['student_id']}\">{$row['student_id']}</option>";
                    }
                ?>
            </select>
            <label for="task">Select a task:</label>
            <select id="task" name="task" disabled>
                <option value="" selected disabled>Select a task</option>
            </select>
            <label for="grade">Enter a grade:</label>
            <input type="number" id="grad" name="grade" min="0" max="10" required>
            <button type="submit">Submit</button>
        </form>

        <script>
            // Dynamically populate the second dropdown list based on the selected value in the first dropdown list
            document.getElementById("student_id").addEventListener("change", function() 
            {
                var studentId = this.value;
                var taskSelect = document.getElementById("task");
                taskSelect.disabled = true;
                taskSelect.innerHTML = "<option value='' selected disabled>Select a task</option>";
                if (studentId) 
                {
                    // Retrieve the list of tasks for the selected student ID from the tasks table
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() 
                    {
                        if (this.readyState === 4 && this.status === 200) 
                        {
                            var tasks = JSON.parse(this.responseText);
                            for (var i = 0; i < tasks.length; i++) 
                            {
                                taskSelect.innerHTML += "<option value=\"" + tasks[i].task + "\">" + tasks[i].task + "</option>";
                            }
                            taskSelect.disabled = false;
                       }
                    };
                    xhr.open("GET", "get_tasks.php?student_id=" + studentId, true);
                    xhr.send();
                    
                }
            });
        </script>

        <script>
            function populateTaskSelect(tasks) 
            {
                
                var taskSelect = document.getElementById("task");
                taskSelect.disabled = true;
                taskSelect.innerHTML = "<option value='' selected disabled>Select a task</option>";
                for (var i = 0; i < tasks.length; i++) 
                {
                    taskSelect.innerHTML += "<option value=\"" + tasks[i].task + "\">" + tasks[i].task + "</option>";
                }
                taskSelect.disabled = false;
                
            }
        </script>
    </body>
    
</html>
