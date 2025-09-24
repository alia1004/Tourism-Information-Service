<?php

require_once('ClassUser.php');
require 'db_connection.php';

session_start();

if (!isset($_POST['submit'])) {
    header("Location: login.php");
    exit;
}

$email = $_POST['Email'];
$password = $_POST['Password'];

$_SESSION['formAttempt'] = true;

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

$_SESSION['error'] = array();
$required = array("Email", "Password");


foreach ($required as $requiredField) {
    if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required.";
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid e-mail address.";
}

if (count($_SESSION['error']) > 0) {
    header("Location: login.php");
    exit;
} else {
    $user = new User();

    if ($user->authenticate($email, $password)) {
        unset($_SESSION['formAttempt']);
        
        $userId = $user->id;
        $role = $user->role; 
        $_SESSION['cid'] = $userId;
        $_SESSION['role'] = $role;
        $_SESSION['IsLoggedIn'] = true;
        
        header("Location: frfr1.php"); 
        exit; 
    } else {
        // Check if there's already an error in the session
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            // Redirect immediately if there's already an error
            header("Location: login.php");
            exit;
        } else {
            // Otherwise, add a new error message and redirect
            $_SESSION['error'][] = "There was a problem with your username or password.";
            header("Location: login.php");
            exit;
        }
    }
}    
?>
