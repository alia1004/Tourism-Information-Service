<?php
// Prevent access if the form hasn't been submitted
if (!isset($_POST['submit'])) {
    die(header("Location: form.php"));
}

session_start();
$_SESSION['formAttempt'] = true;
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
$_SESSION['error'] = array();

$required = array("name", "email", "password1", "password2");

// Check required fields
foreach ($required as $requiredField) {
    if (!isset($_POST[$requiredField]) || $_POST[$requiredField] == "") {
        $_SESSION['error'][] = $requiredField . " is required.";
    }
}

// Validate name (letters, numbers, and spaces)
if (!preg_match('/^[\w .]+$/', $_POST['name'])) {
    $_SESSION['error'][] = "Name must contain only letters, numbers, spaces, or underscores.";
}

// Validate state
$validStates = array("Alabama", "California", "Colorado", "Florida", "Illinois", "New Jersey", "New York", "Wisconsin");
if (isset($_POST['state']) && $_POST['state'] != "") {
    if (!in_array($_POST['state'], $validStates)) {
        $_SESSION['error'][] = "Please choose a valid state.";
    }
}

// Validate ZIP code (between 5 and 9 digits)
if (isset($_POST['zip']) && $_POST['zip'] != "") {
    if (!preg_match('/^[\d]+$/', $_POST['zip'])) {
        $_SESSION['error'][] = "ZIP should be digits only.";
    } elseif (strlen($_POST['zip']) < 5 || strlen($_POST['zip']) > 9) {
        $_SESSION['error'][] = "ZIP should be between 5 and 9 digits.";
    }
}

// Validate phone number (at least 10 digits)
if (isset($_POST['phone']) && $_POST['phone'] != "") {
    if (!preg_match('/^[\d]+$/', $_POST['phone'])) {
        $_SESSION['error'][] = "Phone number should be digits only.";
    } elseif (strlen($_POST['phone']) < 10) {
        $_SESSION['error'][] = "Phone number must be at least 10 digits.";
    }

    // Validate phone type
    if (!isset($_POST['phonetype']) || $_POST['phonetype'] == "") {
        $_SESSION['error'][] = "Please choose a phone number type.";
    } else {
        $validPhoneTypes = array("work", "home");
        if (!in_array($_POST['phonetype'], $validPhoneTypes)) {
            $_SESSION['error'][] = "Please choose a valid phone number type.";
        }
    }
}

// Validate email
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Invalid e-mail address.";
}

// Check if passwords match
if ($_POST['password1'] != $_POST['password2']) {
    $_SESSION['error'][] = "Passwords don't match.";
}

// Final disposition
if (count($_SESSION['error']) > 0) {
    die(header("Location: form.php"));
} else {
    unset($_SESSION['formAttempt']);
    die(header("Location: success.php"));
}
?>
