<?php
session_start();

// Check if the user is logged in and is an admin
if (   ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) 
{
    // Redirect to the home page
    header("Location: homepage.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>add student to section </title>
    <link rel="stylesheet" type="text/css" href="addstudenttoclass.css">
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
	<h1>Example Form</h1>
	<form method="POST" action="add_student_to_class.php">
		<label for="sec_id">Class ID:</label>
		<select id="sec_id" name="sec_id">
			<?php
			// Include the connection file
			require_once 'connection.php';

			// Prepare and execute the query to fetch class IDs
			$stmt = $conn->prepare("SELECT class_id FROM classes");
			$stmt->execute();

			// Loop through the results and display each class ID as an option in the select element
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo "<option value=\"{$row['class_id']}\">{$row['class_id']}</option>";
			}
			?>
		</select><br><br>
		<label for="student_id">Student ID:</label>
		<select id="student_id" name="student_id">
			<?php
			// Prepare and execute the query to fetch student IDs
			$stmt = $conn->prepare("SELECT students_id FROM students");
			$stmt->execute();

			// Loop through the results and display each student ID as an option in the select element
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo "<option value=\"{$row['students_id']}\">{$row['students_id']}</option>";
			}
			?>
		</select><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
