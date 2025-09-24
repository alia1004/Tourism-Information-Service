<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rid'])) {
    $RID = intval($_POST['rid']);
    $loggedInCustId = $_SESSION['cid'];
    $previous_page = isset($_POST['previous_page']) ? intval($_POST['previous_page']) : 0;

    $query = "SELECT cust_ID FROM review WHERE RID = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $RID);
        $stmt->execute();
        $stmt->bind_result($reviewCustId);
        $stmt->fetch();
        $stmt->close();

        if ((string)$reviewCustId === (string)$loggedInCustId) {
            $deleteQuery = "DELETE FROM review WHERE RID = ?";
            if ($deleteStmt = $mysqli->prepare($deleteQuery)) {
                $deleteStmt->bind_param("i", $RID);

                if ($deleteStmt->execute()) {
                    echo "<script>alert('Review deleted successfully!'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
                } else {
                    echo "<script>alert('Error deleting review: " . addslashes($deleteStmt->error) . "'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
                }
                $deleteStmt->close();
            } else {
                echo "<script>alert('Error preparing delete query: " . addslashes($mysqli->error) . "'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
            }
        } else {
            echo "<script>alert('You are not authorized to delete this review.'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
        }
    } else {
        echo "<script>alert('Error preparing query: " . addslashes($mysqli->error) . "'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='destination1.php?id=" . $previous_page . "';</script>";
}

$mysqli->close();
?>
