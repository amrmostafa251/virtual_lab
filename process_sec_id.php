<?php

// Connect to the database
require_once 'connection.php';

// Check if the sec_id parameter was passed through a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sec_id'])) {

    $sec_id = $_POST['sec_id'];

    // Retrieve the list of students in the selected section
    $stmt = $conn->prepare("SELECT user_id FROM sections_students WHERE sec_id = :sec_id");
    $stmt->bindParam(':sec_id', $sec_id);
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the list of students as a JSON object
    header('Content-Type: application/json');
    echo json_encode($students);
}
