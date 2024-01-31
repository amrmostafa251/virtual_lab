<?php
// Include the connection file
require_once 'connection.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the email and password values from the form
  $email = $_POST['email'];
  $password = $_POST['password'];
  echo "ok";
  // Prepare the SQL query using placeholders
  $sql = "SELECT email, password, 'admins' AS user_type FROM admins WHERE email = :email AND password = :password
          UNION ALL
          SELECT email, password, 'students' AS user_type FROM students WHERE email = :email AND password = :password
          UNION ALL
          SELECT email, password, 'instructors' AS user_type FROM instructors WHERE email = :email AND password = :password";

  // Bind the parameters and execute the SQL query
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  // Check if the query returned any results
  if ($stmt->rowCount() > 0) {
    // Get the first row of data from the result set
    $row = $stmt->fetch();

    // Set the session variable to indicate that the user is logged in
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['userType'] = $row['user_type'];
    $_SESSION['email'] = $row['email'];

    // Route to the appropriate profile page based on the user type
    if ($row['user_type'] == 'admins') {
      header('Location: admin.php');
    } elseif ($row['user_type'] == 'students') {
      header('Location: student.php');
    } elseif ($row['user_type'] == 'instructors') {
      header('Location: instructorpofile.php');
    }
  } else {
    // Redirect to an error page if the query did not return any results
    header('Location: homepage.php');
  }
}
?>

