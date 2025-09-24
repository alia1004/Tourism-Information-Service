<?php 
session_start();
require 'db_connection.php';

    $id = intval($_POST['id']);
    $dquery = "DELETE FROM destination WHERE dest_id = ?";
    
    if ($stmt = $mysqli->prepare($dquery)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Review deleted successfully!'); window.location.href='destination.php';</script>";
        } else {
            echo "<script>alert('Error deleting review: " . addslashes($stmt->error) . "'); window.location.href='destination.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing delete query: " . addslashes($mysqli->error) . "'); window.location.href='destination.php?id=';</script>";
    }


$mysqli->close();
?>
