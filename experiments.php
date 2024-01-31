<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="experiments.css">
        <title>Experiments </title>
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
	    <h1>Experiments </h1>
	    <ul>
            <?php
                // Select all records from the "exp" table
                $sql = "SELECT exp FROM exp";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                 // Display each value as a link
                while ($link = $stmt->fetchColumn()) 
                {
                    $linkWithExtension = $link . ".php"; // add .php extension
                    echo "<a href=\"$linkWithExtension\">$link</a><br>";
                }

            ?>

        </ul>
    </body>
</html>
