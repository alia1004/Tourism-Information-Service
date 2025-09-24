<?php
session_start();
require 'db_connection.php';
if (!isset($_SESSION['cid'])) {
    echo "Session cid: " . (isset($_SESSION['cid']) ? $_SESSION['cid'] : "not set");
    die("Error: Customer not logged in.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = isset($_GET['did']) ? intval($_GET['did']) : 0;
    $review = isset($_POST['review']) ? trim($_POST['review']) : '';
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;


    $uploaded_images = ['img1' => '', 'img2' => '', 'img3' => ''];


    function upload_image($file_input, $image_key) {
        global $uploaded_images;
        $target_dir = "uploads/";
        $file_name = basename($_FILES[$file_input]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $check = getimagesize($_FILES[$file_input]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES[$file_input]["tmp_name"], $target_file)) {
                $uploaded_images[$image_key] = $target_file;
            } else {
                echo "Error uploading image: " . $file_name;
            }
        } else {
            echo "File is not an image: " . $file_name;
        }
    }


    if (isset($_FILES['img1']) && $_FILES['img1']['error'] === UPLOAD_ERR_OK) {
        upload_image('img1', 'img1');
    }
    if (isset($_FILES['img2']) && $_FILES['img2']['error'] === UPLOAD_ERR_OK) {
        upload_image('img2', 'img2');
    }
    if (isset($_FILES['img3']) && $_FILES['img3']['error'] === UPLOAD_ERR_OK) {
        upload_image('img3', 'img3');
    }


    if ($product_id > 0 && !empty($review) && $rating > 0 && $rating <= 5) {
        $stmt = $conn->prepare("INSERT INTO review (cust_id, did, date, review, rating, img1, img2, img3) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("iisssss", $cust_ID, $product_id, $review, $rating, $uploaded_images['img1'], $uploaded_images['img2'], $uploaded_images['img3']);


        if ($stmt->execute()) {

            header("Location: destination1.php?id=" . $product_id);
            exit();
        } else {

            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {

        echo "Please provide a valid review and rating.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="review.css">
    <title>The Product Review and Rating</title>
</head>

<body>
    <div class="container">
        <h1>Review</h1>
        <div class="rating">
            <span id="rating">0</span>/5
        </div>
        <div class="stars" id="stars">
            <span class="star" data-value="1">★</span>
            <span class="star" data-value="2">★</span>
            <span class="star" data-value="3">★</span>
            <span class="star" data-value="4">★</span>
            <span class="star" data-value="5">★</span>
        </div>
        <p>Share your review:</p>

            <form action="insert.php?did=<?php echo $_GET['did']; ?>" method="post" enctype="multipart/form-data">
            <textarea name="review" placeholder="Write your review here" required></textarea>
            <input type="hidden" name="rating" id="ratingInput" value="0">
            <p>Upload images:</p>
            <input type="file" name="img1" accept="image/*">
            <input type="file" name="img2" accept="image/*">
            <input type="file" name="img3" accept="image/*">
            <p><button type="submit">Submit</button></p>
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

        stars.forEach((s) => s.classList.remove("one", "two", "three", "four", "five"));

        stars.forEach((s, index) => {
            if (index < value) {
                s.classList.add(getStarColorClass(value));
            }
        });

        stars.forEach((s) => s.classList.remove("selected"));
        star.classList.add("selected");
    });
});

submitBtn.addEventListener("click", (event) => {
    event.preventDefault();
    const review = reviewText.value;
    const userRating = parseInt(ratingDisplay.innerText);

    if (!userRating || !review) {
        alert("Please select a rating and provide a review before submitting.");
        return;
    }

    const reviewElement = document.createElement("div");
    reviewElement.classList.add("review");
    reviewElement.innerHTML = `<p><strong>Rating: ${userRating}/5</strong></p><p>${review}</p>`;
    reviewsContainer.appendChild(reviewElement);

    reviewText.value = "";
    ratingDisplay.innerText = "0";
    ratingInput.value = "0";
    stars.forEach((s) => s.classList.remove("one", "two", "three", "four", "five", "selected"));
});

function getStarColorClass(value) {
    switch (value) {
        case 1: return "one";
        case 2: return "two";
        case 3: return "three";
        case 4: return "four";
        case 5: return "five";
        default: return "";
    }
}

    </script>
</body>

</html>
