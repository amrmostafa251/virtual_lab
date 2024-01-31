<?php
require_once 'connection.php';

if (isset($_GET['student_id'])) {
  $studentId = $_GET['student_id'];
  $stmt = $conn->prepare("SELECT task FROM tasks WHERE student_id = :student_id");
  $stmt->bindParam(':student_id', $studentId);
  $stmt->execute();
  $tasks = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $tasks[] = $row;
  }
  echo json_encode($tasks);
}
?>
