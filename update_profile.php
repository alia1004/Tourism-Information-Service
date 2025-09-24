<?php
require 'db_connection.php';
session_start();

$user_id = $_SESSION['cid'] ?? null;

if (!$user_id) {
    die("User not logged in.");
}

$query_user_info = "SELECT password, avatar FROM customer WHERE cid = ?";
$stmt_user_info = $mysqli->prepare($query_user_info);
if (!$stmt_user_info) {
    die("Error preparing statement for user info: " . $mysqli->error);
}
$stmt_user_info->bind_param("i", $user_id);
$stmt_user_info->execute();
$result_user_info = $stmt_user_info->get_result();

if ($result_user_info->num_rows === 0) {
    die("User not found.");
}

$user_data = $result_user_info->fetch_assoc();
$current_password_hash = $user_data['password'];
$current_avatar = $user_data['avatar'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar_tmp_path = $_FILES['avatar']['tmp_name'];
        $avatar_name = basename($_FILES['avatar']['name']);
        $avatar_dir = 'uploads/';
        $avatar_path = $avatar_dir . $avatar_name;

        if (move_uploaded_file($avatar_tmp_path, $avatar_path)) {
            $query_update_avatar = "UPDATE customer SET avatar = ? WHERE cid = ?";
            $stmt_update_avatar = $mysqli->prepare($query_update_avatar);
            if (!$stmt_update_avatar) {
                die("Error preparing statement for avatar update: " . $mysqli->error);
            }
            $stmt_update_avatar->bind_param("si", $avatar_path, $user_id);
            $stmt_update_avatar->execute();
        } else {
            $_SESSION['message'] = "Failed to upload avatar.";
        }
    }


    $name = $_POST['user_name'];
    $email = $_POST['email'];

    $query_update = "UPDATE customer SET user_name = ?, email = ? WHERE cid = ?";
    $stmt_update = $mysqli->prepare($query_update);
    if (!$stmt_update) {
        die("Error preparing statement for profile update: " . $mysqli->error);
    }
    $stmt_update->bind_param("ssi", $name, $email, $user_id);
    $update_success = $stmt_update->execute();

    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password1'] ?? '';
    $new_password2 = $_POST['new_password2'] ?? '';

    if (!empty($new_password) && !empty($new_password2)) {
        if (password_verify($current_password, $current_password_hash)) {
            if ($new_password === $new_password2) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                $query_update_password = "UPDATE customer SET password = ? WHERE cid = ?";
                $stmt_update_password = $mysqli->prepare($query_update_password);
                if (!$stmt_update_password) {
                    die("Error preparing statement for password update: " . $mysqli->error);
                }
                $stmt_update_password->bind_param("si", $hashed_password, $user_id);
                $password_update_success = $stmt_update_password->execute();
    
                if ($password_update_success) {
                    $_SESSION['message'] = "Profile and password updated successfully.";
                } else {
                    $_SESSION['message'] = "Failed to update password.";
                }
            } else {
                $_SESSION['message'] = "New passwords do not match.";
            }
        } else {
            $_SESSION['message'] = "Current password is incorrect.";
        }
    } elseif ($update_success) {
        $_SESSION['message'] = "Profile updated successfully.";
    } else {
        $_SESSION['message'] = "Failed to update profile.";
    }    

    header("Location: profile.php");
    exit;
}
?>
