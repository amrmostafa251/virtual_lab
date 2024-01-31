<?php
session_start();

// Check if the user is logged in and is an admin
if (   ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) {
  // Redirect to the home page
  header("Location: homepage.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="addinstructor.css">

	<title>Add Instructor</title>
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
        <a href="#">FM Modulation</a>
        <a href="#">AM Modulation</a>
        <a href="#">OFDM</a>
      </div>
    </div>
    <a href="logout.php" class="logout">Logout</a>
  </div>
	<h1>Add Instructor</h1>
	<form action="add_instructor.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br><br>
		<label for="instructor_id">Instructor ID:</label>
		<input type="text" name="instructor_id" id="instructor_id" required><br><br>
		<input type="submit" name="submit" value="Add Instructor">
	</form>
</body>
</html>

