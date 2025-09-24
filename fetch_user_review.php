<?php
require 'db_connection.php';
session_start();

$user_id = $_SESSION['cid'] ?? null;

if (!$user_id) {
    die("User not logged in.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rid'])) {
    $RID = intval($_POST['rid']);
    $previous_page = isset($_POST['previous_page']) ? intval($_POST['previous_page']) : 0;

    $query = "SELECT rid, cust_id, did, review, rating, img1, img2, img3 FROM review WHERE RID = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $RID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Review not found.");
    }

    $review_data = $result->fetch_assoc();
    
    if ((string)$review_data['cust_id'] !== (string)$user_id){
        die("Unauthorized access.");
    }

    $stmt->close();
    
}
?>
