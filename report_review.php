<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rid'])) {
    $RID = intval($_POST['rid']);
    $previous_page = isset($_POST['previous_page']) ? intval($_POST['previous_page']) : 0;

    $reportQuery = "UPDATE review SET report = 'Reported', report_count = report_count + 1 WHERE RID = ?";

    if ($stmt = $mysqli->prepare($reportQuery)) {
        $stmt->bind_param("i", $RID);

        if ($stmt->execute()) {
            echo "<script>alert('Review reported successfully!'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
        } else {
            echo "<script>alert('Error reporting review: " . addslashes($stmt->error) . "'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing report query: " . addslashes($mysqli->error) . "'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='destination1.php?id=" . (isset($_POST['previous_page']) ? intval($_POST['previous_page']) : 0) . "';</script>";
}

$mysqli->close();
?>
