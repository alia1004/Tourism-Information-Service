<?php
// Connect to the database
require 'db_connection.php'; 

// Check if a sort option is selected
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';

$query = "SELECT destination.dest_id, destination.name, destination.image1, AVG(review.rating) as avg_rating 
          FROM destination
          LEFT JOIN review ON destination.dest_id = review.did";

// Adjust query based on the selected sort option
if ($sort == 'popularity') {
    $query .= " GROUP BY destination.dest_id ORDER BY avg_rating DESC";
} else {
    // Default option (ordered by ID)
    $query .= " GROUP BY destination.dest_id ORDER BY destination.dest_id ASC";
}

// Execute the query and check for errors
$result = $mysqli->query($query);

if (!$result) {
    // If the query failed, output the error
    die("Query failed: " . $mysqli->error);
}

// Initialize an array to store the destination data
$destinations = [];

// Fetch and store the results in the array
while ($row = $result->fetch_assoc()) {
    $destinations[] = [
        'id' => $row['dest_id'],  // Corrected from $row['id'] to $row['dest_id']
        'name' => $row['name'],
        'image1' => $row['image1'],
        'avg_rating' => round($row['avg_rating']) // Round rating to the nearest whole number
    ];
}
?>
