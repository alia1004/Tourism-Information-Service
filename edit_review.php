<?php
    $previous_page = isset($_POST['previous_page']) ? intval($_POST['previous_page']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="review.css">
    <title>Edit Review</title>
    <style>
        .star {
            cursor: pointer;
            font-size: 2em;
            color: gray;
        }
        .star.selected {
            color: gold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Your Review</h1>
        <?php include 'fetch_user_review.php'; ?>
        

        <div class="rating">
            <span id="rating"><?php echo htmlspecialchars($review_data['rating']); ?></span>/5
        </div>
        
        <form action="update_review.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="previous_page" value="<?php echo $previous_page; ?>">
    <input type="hidden" name="rid" value="<?php echo $_POST['rid'] ?>">

    <div class="stars" id="stars">
            <input type="hidden" name="rating" id="ratingInput" value="<?php echo htmlspecialchars($review_data['rating']); ?>">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <span class="star <?php echo $i <= $review_data['rating'] ? 'selected' : ''; ?>" data-value="<?php echo $i; ?>">★</span>
            <?php endfor; ?>
        </div>
    
    <textarea name="review" placeholder="Write your review here" required><?php echo htmlspecialchars($review_data['review']); ?></textarea>

    <p>Current Images:</p>
    <?php foreach (['img1', 'img2', 'img3'] as $img_key): ?>
        <?php if ($review_data[$img_key]): ?>
            <img src="<?php echo htmlspecialchars($review_data[$img_key]); ?>" alt="Review Image" style="width: 100px;">
        <?php else: ?>
            <p>No file chosen</p>
        <?php endif; ?>
    <?php endforeach; ?>

    <p>Upload images:</p>
    <input type="file" name="img1" accept="image/*">
    <input type="file" name="img2" accept="image/*">
    <input type="file" name="img3" accept="image/*">

    <p><button type="submit">Update Review</button></p>
</form>



    </div>

    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('ratingInput');
        const ratingDisplay = document.getElementById('rating');

        stars.forEach((star) => {
            star.addEventListener("click", () => {
                const value = parseInt(star.getAttribute("data-value"));
                ratingDisplay.innerText = value;
                ratingInput.value = value;

                stars.forEach((s) => s.classList.remove("selected"));
                stars.forEach((s, index) => {
                    if (index < value) {
                        s.classList.add("selected");
                    }
                });
            });
        });
    </script>
</body>
</html>
