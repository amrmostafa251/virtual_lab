<?php
session_start();

// Check if the user is logged in and is an admin
if (   ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) {
  // Redirect to the home page
  header("Location: homepage.php");
  exit();
}
$v = isset($_POST['submit']);
if ($v) {
    include 'connection.php';
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $id_of_instructor = filter_var($_POST['instructor_id'], FILTER_SANITIZE_NUMBER_INT);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO instructors (email, user_name, password, id_of_instructor) VALUES ('$email', '$name', '$password', '$id_of_instructor')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: admin.php"); // add this line to redirect to the homepage
    exit; // make sure to exit to prevent further execution
}
?>

