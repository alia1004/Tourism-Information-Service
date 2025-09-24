<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['psw']);
    $passwordRepeat = $conn->real_escape_string($_POST['psw-repeat']);

    // Check if passwords match
    if ($password !== $passwordRepeat) {
        $_SESSION['signup_error'] = "Passwords do not match!";
        header("Location: index.php"); 
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $_SESSION['signup_error'] = "Email is already registered!";
        header("Location: index.php"); // Redirect back to the main page
        exit();
    }

    // Insert the new user into the database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['signup_success'] = "Sign up successful!";
        header("Location: index.php"); // Redirect back to the main page
        exit();
    } else {
        $_SESSION['signup_error'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: index.php"); // Redirect back to the main page
        exit();
    }
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['uname']);
    $password = $conn->real_escape_string($_POST['psw']);

    // Fetch user from the database
    $result = $conn->query("SELECT * FROM users WHERE email='$username'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            echo "Login successful!";
            // Redirect to a different page or dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid username or password!";
        }
    } else {
        $_SESSION['login_error'] = "Invalid username or password!";
    }
}

$conn->close();
?>
