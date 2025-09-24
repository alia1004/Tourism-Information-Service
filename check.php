<?php
session_start();

$required = ['Uname', 'email'];
$redirectPage = 'forgor.php'; 

if (!isset($_POST['submit'])) {
    die(header("Location: $redirectPage")); 
}

$_SESSION['formAttempt'] = true;

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();

foreach ($required as $requiredField) {
    if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required.";
    }
}

if (!preg_match('/^[\w .]+$/', $_POST['Uname'])) {
    $_SESSION['error'][] = "UserName must contain only letters, numbers, and spaces.";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid e-mail address.";
}

if (count($_SESSION['error']) > 0) {
    die(header("Location: $redirectPage"));
} else {
    if (checkUserMatch($_POST['Uname'], $_POST['email'])) {
        unset($_SESSION['formAttempt']);
        // Redirect to reset.php with email as a query parameter
        header("Location: reset.php?email=" . urlencode($_POST['email']));
        exit(); // Make sure to exit after header redirection
    } else {
        $_SESSION['error'][] = "User Name doesn't match.";
        die(header("Location: $redirectPage"));
    }
}

function checkUserMatch($username, $email) {
    $mysqli = new mysqli("localhost", "root", "", "tourism");
    
    if ($mysqli->connect_errno) {
        error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
        return false;
    }

    $email = $mysqli->real_escape_string($email);
    $user_name = $mysqli->real_escape_string($username);

    $findUser = "SELECT user_name FROM Customer WHERE email = '{$email}'";
    $findResult = $mysqli->query($findUser);
    $findRow = $findResult->fetch_assoc();
    
    if (isset($findRow['user_name']) && $findRow['user_name'] === $user_name) {
        return true; 
    }
    return false;
}
?>
