<?php
session_start();

if (isset($_SESSION['cid']) && isset($_GET['id'])) {
    $cust_ID = $_SESSION['cid'];
    $dest_id = intval($_GET['id']);

    if ($dest_id > 0) {

        $conn = new mysqli("localhost", "root", "", "tourism");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO bookmark (customer_id, destination) VALUES (?, ?)");
        
        $stmt->bind_param("ii", $cust_ID, $dest_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Destination bookmarked successfully!'); window.location.href='destination1.php?id=" . $dest_id . "';</script>";
        } else {
            echo "<script>alert('Failed to bookmark the destination.'); window.location.href='destination1.php?id=" . $dest_id . "';</script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<script>alert('Invalid destination.'); window.location.href='destination1.php';</script>";
    }
} else {
    echo "<script>alert('Please log in to bookmark the destination.'); window.location.href='login.php';</script>";
}
?>
