<?php
session_start();

// Check if the user is logged in and is an admin
if ( $_SESSION['userType'] != 'admins') {
    // Redirect to the home page
    header("Location: homepage.php");
    exit();
  }

// Set the user id and email variables
$login=$_SESSION['loggedIn'];

$userId = $_SESSION['userType'];
$userEmail = $_SESSION['userEmail'];
?>

<html>
<head>
    <title>Add Class</title>
    <link rel="stylesheet" type="text/css" href="addclass.css">
</head>
<body>
    <div class="topnav">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <div class="dropdown">
          <button class="dropbtn" onclick="myFunction()">Experiments
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content" id="mydropdown">
            <a href="#">Frequency Modulation</a>
            <a href="#">Amplitude Modulation</a>
            <a href="#">OFDM</a>
          </div>  
        </div>
        <a href="logout.php" class="logout">Logout</a>
      </div>
    <h1>Add Class</h1>
    <form action="add_class.php" method="post">
        <label for="year_id">Year ID:</label>
        <input type="text" id="year_id" name="year_id"><br><br>
        <label for="class_id">Class ID:</label>
        <input type="text" id="class_id" name="class_id"><br><br>
        <label for="instructor_id">Instructor ID:</label>
        <input type="text" id="instructor_id" name="instructor_id"><br><br>
        <input type="submit" name="add_class" value="Add Class">
    </form>
</body>
</html>
