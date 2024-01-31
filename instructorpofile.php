<!DOCTYPE html>
<html>
<head>
	<title>Instructor Profile</title>
	<link rel="stylesheet" type="text/css" href="instuctorprofile.css">
</head>
<body>
	<?php
		// Check if the user is logged in and is an instructor
		session_start();
		if (($_SESSION['userType'] != 'instructors') && (!isset($_SESSION['email']))) {
		    // Redirect to the home page
		    header("Location: homepage.php");
		    exit();
		}

		// Connect to the database
		require_once 'connection.php';

		// Get the instructor's name and email from the database
		$email = $_SESSION['email'];
		$stmt = $conn->prepare("SELECT user_name, email FROM instructors WHERE email = :email");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$row = $stmt->fetch();
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
		<p class="email"><?php echo $row['email']; ?></p>
	</div>

	<div class="header">
		<h1>Welcome <?php echo $row['user_name']; ?></h1>
	</div>
	<div class="page-selection">
		<!-- Display links for giving a task, giving a grade, and experiments -->
		<h2>Links:</h2>
		<ul>
			<li><a href="givetask.php">Give a Task</a></li>
			<li><a href="giveagrade .php">Give a Grade</a></li>
			<li><a href="experiments.php">Experiments</a></li>
		</ul>
	</div>
</body>
</html>
