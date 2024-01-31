<?php
session_start();

// Check if the user is logged in and is an instructor
if (($_SESSION['userType'] != 'instructors') && (!isset($_SESSION['email']))) 
{
    // Redirect to the home page
    header("Location: homepage.php");
    exit();
}  

// Get the student ID, task, and grade from the form data
$studentId = $_POST['student_id'];
$task = $_POST['task'];
$grade = $_POST['grade'];

// Connect to the database
try 
{
    require_once 'connection.php';
    
    // Insert the grade into the "tasks" table for the selected student ID and task
    $stmt = $conn->prepare("UPDATE tasks SET grade = :grade WHERE student_id = :student_id AND task = :task");
    $stmt->bindParam(':grade', $grade);
    $stmt->bindParam(':student_id', $studentId);
    $stmt->bindParam(':task', $task);
    $stmt->execute();
   
    // Redirect to the previous page with a success message
    header("Location: ".$_SERVER['HTTP_REFERER']."?success=1");
    exit();
}
catch (PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}
?>
