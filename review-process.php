<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = (int)$_POST['rating'];
    $text = trim($_POST['text']);
    $date = date("Y-m-d H:i:s"); // Current date and time

    // Validate input
    if ($rating >= 1 && $rating <= 5 && !empty($text)) {
        // Prepare SQL query to insert review
        $stmt = $conn->prepare("INSERT INTO review (rating, date, text) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $rating, $date, $text);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to review page with success message
            header("Location: review.php?status=success");
        } else {
            header("Location: review.php?status=error");
        }

        $stmt->close();
    } else {
        // Redirect back with an error message if validation fails
        header("Location: review.php?status=error");
    }
}

$conn->close();
?>
