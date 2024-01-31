<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (   ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) {
  // Redirect to the home page
  header("Location: homepage.php");
  exit();
}

?>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
   /* Styles for the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .dropdown {
  float: left;
  overflow: hidden;
}

.topnav .dropdown .dropbtn {
  font-size: 17px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.topnav:hover .dropdown .dropbtn {
  background-color: #ddd;
  color: black;
}

.topnav .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  z-index: 1;
}

.topnav .dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav .dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .dropdown:hover .dropdown-content {
  display: block;
}

/* Style for the logout button */
.logout {
  float: right;
}

/* Style for the header */
.header {
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
}

.header h1 {
  margin: 0;
  font-size: 36px;
  color: #333;
}

/* Style for the page selection menu */
.page-selection {
  margin-top: 50px;
  text-align: center;
}

.page-selection h2 {
  font-size: 24px;
  margin-bottom: 30px;
}

.page-selection ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.page-selection ul li {
  margin-bottom: 20px;
}

.page-selection ul li a {
  display: block;
  padding: 10px;
  background-color: #f2f2f2;
  color: #333;
  font-size: 20px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.page-selection ul li a:hover {
  background-color: #ddd;
}

  </style>

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

  <div class="header">
    <h1>System Administrator</h1>
  </div>

  <div class="page-selection">
  <h2>Select a page to go to:</h2>
  <ul>
    <li><a href="addstudent.php">Add Student Information</a></li>
    <li><a href="addinstructor.php">Add Instructor Information</a></li>
    <li><a href="add_class_test.php">Add Class Information</a></li>
    <li><a href="editdata.php">edit user Information</a></li>  
    <li><a href="addstudenttoclass.php">Add student to a section</a></li>
  </ul>
</div>

</body>
</html>