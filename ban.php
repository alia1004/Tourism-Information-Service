<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cust_ID']) && isset($_POST['RID'])) {
    $cust_ID = intval($_POST['cust_ID']);
    $RID = intval($_POST['RID']);

    $banQuery = "UPDATE customer SET Ban = 'True' WHERE cid = ?";
    if ($banStmt = $mysqli->prepare($banQuery)) {
        $banStmt->bind_param("i", $cust_ID);

        if ($banStmt->execute()) {
            $dismissQuery = "DELETE FROM review WHERE cust_ID = ?";
            if ($dismissStmt = $mysqli->prepare($dismissQuery)) {
                $dismissStmt->bind_param("i", $cust_ID);

                if ($dismissStmt->execute()) {
                    echo "<script>alert('User banned and review dismissed successfully!'); window.location.href='report.php';</script>";
                } else {
                    echo "<script>alert('Error dismissing review: " . addslashes($dismissStmt->error) . "'); window.location.href='report.php';</script>";
                }
                $dismissStmt->close();
            } else {
                echo "<script>alert('Error preparing review dismissal query: " . addslashes($mysqli->error) . "'); window.location.href='report.php';</script>";
            }
        } else {
            echo "<script>alert('Error banning user: " . addslashes($banStmt->error) . "'); window.location.href='report.php';</script>";
        }
        $banStmt->close();
    } else {
        echo "<script>alert('Error preparing ban query: " . addslashes($mysqli->error) . "'); window.location.href='report.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='report.php';</script>";
}

$mysqli->close();
?>
