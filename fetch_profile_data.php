<?php
require 'db_connection.php';


$user_id = $_SESSION['cid'] ?? null;

if (!$user_id) {
    die("User not logged in.");
}

$query_user = "SELECT user_name, email, avatar, password FROM customer WHERE cid = ?";
$stmt_user = $mysqli->prepare($query_user);

if (!$stmt_user) {
    die("Error preparing statement for user info: " . $mysqli->error);
}

$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows === 0) {
    die("User not found.");
}

$user_info = $result_user->fetch_assoc();

$query_reviews = "SELECT review.rid, review.did, review.review, review.img1, review.img2, review.img3, review.rating, destination.name as destination_name 
                  FROM review
                  JOIN destination ON review.did = destination.dest_id
                  WHERE review.cust_id = ?";
$stmt_reviews = $mysqli->prepare($query_reviews);

if (!$stmt_reviews) {
    die("Error preparing statement for user reviews: " . $mysqli->error);
}

$stmt_reviews->bind_param("i", $user_id);
$stmt_reviews->execute();
$result_reviews = $stmt_reviews->get_result();

$reviews = [];
while ($row = $result_reviews->fetch_assoc()) {
    $reviews[] = $row;
}


$user_data = [
    'user_info' => $user_info,
    'reviews' => $reviews
];

?>
