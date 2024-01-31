<?php
// Check if the add_class button was clicked
if (isset($_POST['add_class'])) {
    // Include the database connection file
    require_once 'connection.php';

    // Check if the user is logged in as an admin
    session_start();
    if ($_SESSION['userType'] != 'admins') 
    {
        echo "You are not authorized to add data to the database";
        exit;
    }
    // Retrieve data from the form
    $year_id = $_POST['year_id'];
    $class_id = $_POST['class_id'];
    $instructor_id = $_POST['instructor_id'];

    // Create the SQL INSERT statement
    $sql = "INSERT INTO classes (year_id, class_id, instructor_id)
            VALUES ('$year_id', '$class_id', '$instructor_id')";

    // Execute the SQL INSERT statement
    if ($conn->query($sql) === TRUE) {
        // Redirect the user to admin.php
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;

    }

}
?>