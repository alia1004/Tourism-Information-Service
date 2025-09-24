<?php
session_start();

if (!isset($_POST['submit'])) {
    die(header("Location: register.php"));
}

$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();

$role = (basename($_SERVER['HTTP_REFERER']) === 'register-admin.php') ? 'admin' : 'user';

$adminKey = "admin_KEY/1004";

$required = array("Uname", "email", "password1", "password2");
if ($role === 'admin') {
    $required[] = "adminKey";}

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

if ($_POST['password1'] != $_POST['password2']) {
    $_SESSION['error'][] = "Passwords don't match.";
}

if ($role === 'admin' && $_POST['adminKey'] !== $adminKey) {
    $_SESSION['error'][] = "Invalid Admin Key.";
}

if (count($_SESSION['error']) > 0) {
    $redirectPage = ($role === 'admin') ? "register-admin.php" : "register.php";
    die(header("Location: $redirectPage"));
} else {
    if (registerUser($_POST, $role)) {
        unset($_SESSION['formAttempt']);
        die(header("Location: success.php"));
    } else {
        error_log("Problem registering user: {$_POST['email']}");
        $_SESSION['error'][] = "Problem registering account.";
        $redirectPage = ($role === 'admin') ? "register-admin.php" : "register.php";
        die(header("Location: $redirectPage"));
    }
}

function registerUser($userData, $role) {
    $mysqli = new mysqli("localhost", "root", "", "tourism");
    
    if ($mysqli->connect_errno) {
        error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
        return false;
    }
    
    $email = $mysqli->real_escape_string($userData['email']);
    $user_name = $mysqli->real_escape_string($userData['Uname']);
    $password = password_hash($userData['password1'], PASSWORD_BCRYPT);
    
    $findBanQuery = "SELECT Ban FROM Customer WHERE email = '{$email}'";
    $findBanResult = $mysqli->query($findBanQuery);
    
    if ($findBanResult) {
        $banRow = $findBanResult->fetch_assoc();
        if (isset($banRow['Ban']) && $banRow['Ban'] === "True") {
            $_SESSION['error'][] = "You are banned from this website.";
            return false;
        }
    } else {
        $_SESSION['error'][] = "Error checking ban status.";
        return false;
    }
    
    $findUserQuery = "SELECT cid FROM Customer WHERE email = '{$email}'";
    $findUserResult = $mysqli->query($findUserQuery);
    
    if ($findUserResult) {
        $userRow = $findUserResult->fetch_assoc();
        if (isset($userRow['cid']) && $userRow['cid'] != "") {
            $_SESSION['error'][] = "A user with that e-mail address already exists.";
            return false;
        }
    } else {
        $_SESSION['error'][] = "Error checking if user exists.";
        return false;
    }
    
 

    $stmt = $mysqli->prepare("INSERT INTO Customer (email, create_date, password, user_name, role) VALUES (?, NOW(), ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $password, $user_name, $role);
    
    if ($stmt->execute()) {
        $id = $stmt->insert_id;
        error_log("Inserted {$email} as ID {$id} with role {$role}");
        $stmt->close();
        return true;
    } else {
        error_log("Problem inserting: {$stmt->error}");
        $stmt->close();
        return false;
    }
}
?>
