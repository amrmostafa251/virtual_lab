<?php
// include the connection file
require_once 'connection.php';

// start the session
session_start();

// check if the user is logged in and has admin privileges
/*if ($_SESSION['user_type'] != 'admin') {
    // if not, redirect to login page
    header('Location: homepage.php');
    exit();
}*/

// check if the form has been submitted
//
 if (isset($_POST['submit'])) {
     //get the form data
    $old_email = $_POST['old_email'];
    $user_type = $_POST['user_type'];
    $new_email = $_POST['new_email'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    // check if the user type is valid
    /*if ($user_type != 'instructor' && $user_type != 'student') {
        // if not, set an error message and redirect to edituser page
        $_SESSION['error_msg'] = 'Invalid user type';
        header('Location: editdata.php');
        exit();
    }*/
    
    try {
        // start a transaction
        $conn->beginTransaction();
        
        // check if the user exists in the selected table
        $stmt = $conn->prepare("SELECT * FROM $user_type.s WHERE email = ?");
        $stmt->execute([$old_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        /*if (!$user) {
            // if the user doesn't exist, set an error message and redirect to edituser page
            $_SESSION['error_msg'] = 'User not found';
            header('Location: editdata.php');
            exit();
        }*/
        
        // update the user information
        $stmt = $conn->prepare("UPDATE table $user_type.s SET email = ?, password = ?, id = ?, name = ? WHERE email = ?");
        $stmt->execute([$new_email, $password, $id, $name, $old_email]);
        
        // commit the transaction
        $conn->commit();
        echo "ok";
        // redirect to admin page
        header('Location: admin.php');
        exit();
    } catch (PDOException $e) {
        echo "ok";
        // rollback the transaction and set an error message
        $conn->rollback();
        $_SESSION['error_msg'] = 'Error updating user: ' . $e->getMessage();
        //header('Location: editdata.php');
        exit();
    }
}/* else {
    // if the form hasn't been submitted, redirect to edituser page
    header('Location: editdata.php');
    exit();
}*/
?>
