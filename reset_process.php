<?php
require 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $new_password1 = $_POST['password1'] ?? '';
    $new_password2 = $_POST['password2'] ?? '';

    if ($new_password1 === $new_password2) {
        $hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

        $query_update_password = "UPDATE Customer SET password = ? WHERE email = ?";
        $stmt_update_password = $mysqli->prepare($query_update_password);
        
        if (!$stmt_update_password) {
            $_SESSION['message'] = "Error preparing statement for password update: " . $mysqli->error;
            $_SESSION['email'] = $email; // Store the email for the form
            header("Location: reset.php");
            exit();
        }

        // Bind the parameters
        $stmt_update_password->bind_param("ss", $hashed_password, $email);

        if ($stmt_update_password->execute()) {
            echo "<script>alert('Password is successfully changed.'); window.location.href='login.php';</script>";
        } else {
            $_SESSION['message'] = "Failed to update password: " . $stmt_update_password->error;
            $_SESSION['email'] = $email; // Store the email for the form
            header("Location: reset.php");
            exit();
        }
        
        $stmt_update_password->close();
    } else {
        $_SESSION['message'] = "Passwords do not match.";
        $_SESSION['email'] = $email; // Store the email for the form
        header("Location: reset.php");
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid request method.";
    header("Location: reset.php");
    exit();
}
?>
