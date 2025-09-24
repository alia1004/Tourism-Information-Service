<?php


// Prevent access if they haven’t submitted the form.
if (!isset($_POST['submit'])) {
    die(header("Location: SignUp.php"));
}

$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();
$required = array("uname", "email", "password1", "password2");

// Check required fields
foreach ($required as $requiredField) {
    if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required.";
    }
}

if (!preg_match('/^[\w .]+$/', $_POST['uname'])) {
    $_SESSION['error'][] = "Username must be letters and numbers only.";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid e-mail address";
}

if ($_POST['password1'] != $_POST['password2']) {
    $_SESSION['error'][] = "Passwords don't match";
}

// Final disposition
if (count($_SESSION['error']) > 0) {
    die(header("Location: SignUp.php"));
} else {
    if (registerUser($_POST)) {
        unset($_SESSION['formAttempt']);
        die(header("Location: success.php"));
    } else {
        error_log("Problem registering user: {$_POST['email']}");
        $_SESSION['error'][] = "Problem registering account";
        die(header("Location: SignUp.php"));
    }
}

function registerUser($userData) {
    $mysqli = new mysqli("localhost", "root", "", "tourism");
    if ($mysqli->connect_errno) {
        error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
        return false;
    }
    
    $email = $mysqli->real_escape_string($_POST['email']);
    
    // Check for an existing user
    $findUser = "SELECT id FROM Customer WHERE email = '{$email}'";
    $findResult = $mysqli->query($findUser);
    $findRow = $findResult->fetch_assoc();
    if (isset($findRow['id']) && $findRow['id'] != "") {
        $_SESSION['error'][] = "A user with that e-mail address already exists";
        return false;
    }

    // Using uname instead of first_name
    $uname = $mysqli->real_escape_string($_POST['uname']);
    $cryptedPassword = crypt($_POST['password1']);
    $password = $mysqli->real_escape_string($cryptedPassword);

    $query = "INSERT INTO Customer (email, create_date, password, uname) " .
        "VALUES ('{$email}', NOW(), '{$password}', '{$uname}')";
    
    if ($mysqli->query($query)) {
        $id = $mysqli->insert_id;
        error_log("Inserted {$email} as ID {$id}");
        return true;
    } else {
        error_log("Problem inserting {$query}");
        return false;
    }
} //end function registerUser
?>
