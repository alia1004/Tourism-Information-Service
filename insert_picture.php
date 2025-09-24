<?php
if (isset($_SESSION['cid'])) {
    $cust_ID = $_SESSION['cid'];
    $dest_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($dest_id > 0) {
        $conn = new mysqli("localhost", "root", "", "tourism");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO bookmark (customer_id, destination) VALUES (?, ?)");
        
        $stmt->bind_param("ii", $cust_ID, $dest_id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Destination bookmarked successfully!');</script>";
        } else {
            echo "<script>alert('Failed to bookmark the destination.');</script>";
        }


        $stmt->close();
        $conn->close();
    } else {
        echo "<script>alert('Invalid destination.');</script>";
    }
?>