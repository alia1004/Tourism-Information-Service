<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BID'])) {
    $BID = intval($_POST['BID']);

    $query = "DELETE FROM bookmark WHERE BID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $BID);
   
    if ($stmt->execute()) {
        header("Location: bookmark.php"); // Redirect back to the bookmarks page after deletion
    } else {
        echo "Error deleting bookmark: " . $stmt->error;
    }
}
?>