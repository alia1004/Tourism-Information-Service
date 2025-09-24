<?php
require 'db_connection.php'; 


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id > 0) {
    $query = "SELECT destination.dest_id, destination.name, destination.fee, destination.image1, destination.image2, destination.image3, 
                 destination.description, destination.location, destination.activities, destination.tips, destination.time,
                 destination.facilities, destination.address, destination.contact, AVG(review.rating) as avg_rating, 
                 GROUP_CONCAT(review.rid SEPARATOR '||') as reviews_id, 
                 GROUP_CONCAT(review.review SEPARATOR '||') as reviews_text, 
                 GROUP_CONCAT(review.rating SEPARATOR ',') as reviews_ratings,
                 GROUP_CONCAT(review.date SEPARATOR ',') as reviews_dates,
                 GROUP_CONCAT(customer.user_name SEPARATOR '||') as review_users,
                 GROUP_CONCAT(customer.avatar SEPARATOR '||') as review_avatars,
                 GROUP_CONCAT(review.img1 SEPARATOR '||') as review_img1s,
                 GROUP_CONCAT(review.img2 SEPARATOR '||') as review_img2s,
                 GROUP_CONCAT(review.img3 SEPARATOR '||') as review_img3s
          FROM destination
          LEFT JOIN review ON destination.dest_id = review.did
          LEFT JOIN customer ON review.cust_id = customer.cid
          WHERE destination.dest_id = ?
          GROUP BY destination.dest_id";

    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        die("Error preparing statement: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if (!$result) {
        die("Query failed: " . $mysqli->error);
    }

    $destination = $result->fetch_assoc();

    if ($destination) {
        $reviews = [];
        if (!empty($destination['reviews_text'])) {
            $reviews_id = explode('||', $destination['reviews_id']);
            $reviews_text = explode('||', $destination['reviews_text']);
            $reviews_ratings = explode(',', $destination['reviews_ratings']);
            $reviews_dates = explode(',', $destination['reviews_dates']);
            $review_users = explode('||', $destination['review_users']);
            $review_avatars = explode('||', $destination['review_avatars']);
            $review_img1s = explode('||', $destination['review_img1s']);
            $review_img2s = explode('||', $destination['review_img2s']);
            $review_img3s = explode('||', $destination['review_img3s']);
        
            for ($i = 0; $i < count($reviews_text); $i++) {
                $reviews[] = [
                    'rid' => $reviews_id[$i],
                    'review' => $reviews_text[$i],
                    'rating' => $reviews_ratings[$i],
                    'date' => $reviews_dates[$i],
                    'user_name' => $review_users[$i],
                    'avatar' => $review_avatars[$i],
                    'img1' => $review_img1s[$i],
                    'img2' => $review_img2s[$i],
                    'img3' => $review_img3s[$i]
                ];
            }
        }

        $destinations[] = [
            'dest_id' => $destination['dest_id'],
            'name' => $destination['name'],
            'fee' => $destination['fee'],
            'time' => $destination['time'],
            'image1' => $destination['image1'],
            'image2' => $destination['image2'],
            'image3' => $destination['image3'],
            'description' => $destination['description'],
            'location' => $destination['location'],
            'activities' => $destination['activities'],
            'tips' => $destination['tips'],
            'address' => $destination['address'],
            'contact' => $destination['contact'],
            'facilities' => $destination['facilities'],
            'avg_rating' => round($destination['avg_rating']),
            'reviews' => $reviews
        ];
    } else {
        echo "No destination found for the provided ID.";
    }
} else {
    echo "Invalid destination ID.";
}
?>
