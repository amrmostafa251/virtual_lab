<?php
require_once 'connection.php';
// Check if the user is logged in and is an admin
session_start();
if ( ($_SESSION['userType'] != 'admins')&&(!isset($_SESSION['email']))) {
    // Redirect to the home page
    header("Location: homepage.php");
    exit();
  }
if (isset($_POST['submit'])) 
{
    //get the form data
   $old_email = $_POST['old_email'];
   $user_type = $_POST['user_type'];
   $new_email = $_POST['new_email'];
   $password = $_POST['password'];
   $id = $_POST['id'];
   $name = $_POST['name'];
   // check if the user type is valid
   if ($user_type != 'instructors' && $user_type != 'students') 
    {
        // if not, set an error message and redirect to edituser page
        $_SESSION['error_msg'] = 'Invalid user type';
        header('Location: editdata.php');
        exit();
    }
    try 
    {
        // start a transaction
        $conn->beginTransaction();
        $stmt = $conn->prepare("SELECT * FROM $user_type WHERE email = ?");
        $stmt->execute([$old_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) 
        {
            // if the user doesn't exist, set an error message and redirect to edituser page
            
            echo "file does not eixst ";
            exit();
        }
        $stmt = $conn->prepare("UPDATE  $user_type SET email = ?, password = ?, students_id = ?, user_name = ? WHERE email = ?");
        $stmt->execute([$new_email, $password, $id, $name, $old_email]);
        // commit the transaction
        $conn->commit();            
        // redirect to admin page
         header('Location: admin.php');
         exit();
    }
    catch (PDOException $e) 
    {
        echo "$e";
        // rollback the transaction and set an error message
        $conn->rollback();
        $_SESSION['error_msg'] = 'Error updating user: ' . $e->getMessage();
        //header('Location: editdata.php');
        exit();
    }
}

?>