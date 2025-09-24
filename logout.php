<?php
session_start(); // Start session
session_destroy(); // Destroy all session data
header("Location: frfr1.php"); // Redirect to home page after logout
exit();
?>
