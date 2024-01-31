
        

<?php
require_once 'connection.php';

if (isset($_GET['sec_id'])) {
  $sec_id = $_GET['sec_id'];
  
  $stmt = $conn->prepare("SELECT user_id FROM sections_students WHERE sec_id = :sec_id");
  $stmt->bindParam(':sec_id', $sec_id);
  $stmt->execute();
  $students = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $students[] = $row;
  }
  echo  json_encode($students);
}
?>
