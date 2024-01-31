<?php
    // Check if the user is logged in and is an instructor
    session_start();
    if (($_SESSION['userType'] != 'instructors') && (!isset($_SESSION['email']))) 
    {
        // Redirect to the home page
        header("Location: homepage.php");
        exit();
    } 
    
    if (isset($_POST['submit']))
    {
        echo"ok.<br>";
        $student_id  =$_POST['student_id'];
        $task = $_POST['exp'];
        try 
        {
            // Connect to the database
            require_once 'connection.php';
            // Insert the values into the tasks table
            $stmt = $conn->prepare("INSERT INTO tasks (task, student_id) VALUES (:task, :student_id)");
            $stmt->bindParam(':task', $task);
            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();
            // Redirect to givetask.php if the insertion was successful
            header("Location: givetask.php");
            exit;
        } 
        catch (PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>