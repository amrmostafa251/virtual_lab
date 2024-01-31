<?php
//$bott= $_POST['submit'];
//$check=isset($bott);
session_start();

// Check if the user is logged in and is an admin
if (   ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) {
  // Redirect to the home page
  header("Location: homepage.php");
  exit();
}

if (isset($_POST['submit'])){
   include 'connection.php';
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $students_id = filter_var($_POST['student_id'], FILTER_SANITIZE_NUMBER_INT);
    $password=password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO students (email, user_name, password, students_id) VALUES ('$email', '$name', '$password', '$students_id')";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     header("Location: admin.php"); // add this line to redirect to the homepage
    exit; // make sure to exit to prevent further execution
}
    

?>