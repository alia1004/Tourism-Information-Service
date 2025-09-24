<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Website</title>
</head>
<body>
    <h1>Leave a Review</h1>
    
    <form action="review-process.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
        
        <label for="comment">Your Review:</label><br>
        <textarea id="comment" name="comment" rows="5" cols="50" required></textarea><br><br>
        
        <button type="submit">Submit Review</button>
    </form>

    <h2>Recent Reviews</h2>
    <ul>
        <?php
        // Include reviews file (assuming reviews are stored in a JSON file for simplicity)
        if (file_exists('reviews.json')) {
            $reviews = json_decode(file_get_contents('reviews.json'), true);
            foreach ($reviews as $review) {
                echo '<li><strong>' . htmlspecialchars($review['name']) . ' (' . $review['rating'] . '/5):</strong> ' . htmlspecialchars($review['comment']) . '</li>';
            }
        } else {
            echo '<li>No reviews yet!</li>';
        }
        ?>
    </ul>
</body>
</html>
