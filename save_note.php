<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BID'], $_POST['note'])) {
    $BID = intval($_POST['BID']);
    $note = $_POST['note'];

    $query = "UPDATE bookmark SET note = ? WHERE BID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("si", $note, $BID);
   
    if ($stmt->execute()) {
        header("Location: bookmark.php");
    } else {
        echo "Error updating note: " . $stmt->error;
    }
}
?>