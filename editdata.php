<?php
session_start();
if ( ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) {
    // Redirect to the home page
    header("Location: homepage.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="edituser.css">
	<title>Edit User Information</title>
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
	<h1>new User Information</h1>
	<form action="edit_data.php" method="POST">
        <label for="old email">old Email:</label>
		<input type="email" name="old_email" id="email"required ><br><br>
		<label for="email">new Email:</label>
		<input type="email" name="new_email" id="new_email" ><br><br>
		<label for="id">ID:</label>
		<input type="text" name="id" id="id" ><br><br>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" ><br><br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" ><br><br>
		<label for="user_type">User Type:</label>
		<select name="user_type" id="user_type" required>
			<option value="">--Select--</option>
			<option value="students">Students</option>
			<option value="instructors">Instructors</option>
		</select><br><br>
		<input type="submit" name="submit" value="Save Changes">
	</form>
</body>
</html>
