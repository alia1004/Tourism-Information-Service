<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['no'])) {
    $no = intval($_POST['no']);

    $Query = "DELETE FROM suggest WHERE no = ?";
    if ($stmt = $mysqli->prepare($Query)) {
        $stmt->bind_param("i", $no);

        if ($stmt->execute()) {
            header("Location: suggest.php");
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