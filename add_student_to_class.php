<?php
// Check if the user is logged in and is an admin
session_start();
if (($_SESSION['userType'] != 'admins') && (!isset($_SESSION['email']))) {
    // Redirect to the home page
    header("Location: homepage.php");
    exit();
}

require_once 'connection.php';
try {
   
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the form values
        $sec_id = $_POST['sec_id'];
        $user_id = $_POST['student_id'];

        // Connect to the database
        

        // Prepare and execute the query to insert the values into the sections_students table
        $stmt = $conn->prepare("INSERT INTO sections_students (sec_id, user_id) VALUES (:sec_id, :user_id)");

        $stmt->bindParam(':sec_id', $sec_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->rowCount() > 0) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error inserting values.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>