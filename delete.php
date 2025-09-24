<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['RID'])) {
    $RID = intval($_POST['RID']);

    $query = "DELETE FROM review WHERE RID = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $RID);

        if ($stmt->execute()) {
            header("Location: report.php");
            exit;
        } else {
            echo "Error deleting review: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing query: " . $mysqli->error;
    }
} else {
    echo "Invalid request.";
}
?>
