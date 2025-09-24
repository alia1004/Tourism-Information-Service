<?php
require 'db_connection.php';
session_start();
if (!isset($_SESSION['cid'])) {
    echo "Session cid: " . (isset($_SESSION['cid']) ? $_SESSION['cid'] : "not set");
    die("Error: Customer not logged in.");
}


$cust_ID = $_SESSION['cid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = isset($_GET['did']) ? intval($_GET['did']) : 0;
    $review = isset($_POST['review']) ? trim($_POST['review']) : '';
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;

    $uploaded_images = ['img1' => '', 'img2' => '', 'img3' => ''];

    function upload_image($file_input, $image_key) {
        global $uploaded_images; // Access the $uploaded_images array globally
        $target_dir = "uploads/"; // Directory where images will be saved
        $file_name = basename($_FILES[$file_input]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $file_name; // Add a unique identifier to the file name
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is a valid image
        $check = getimagesize($_FILES[$file_input]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES[$file_input]["tmp_name"], $target_file)) {
                $uploaded_images[$image_key] = $target_file; // Save the path of the uploaded file
            } else {
                echo "Error uploading image: " . $file_name; // Handle upload error
            }
        } else {
            echo "File is not an image: " . $file_name; // Handle invalid file type
        }
    }

    // Handle image uploads (up to 3)
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
        // Prepare SQL statement to insert the review, including cust_ID
        $stmt = $conn->prepare("INSERT INTO review (cust_id, did, date, review, rating, img1, img2, img3) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error); // Added error handling
        }

        $stmt->bind_param("iisssss", $cust_ID, $product_id, $review, $rating, $uploaded_images['img1'], $uploaded_images['img2'], $uploaded_images['img3']);

        // Execute the statement
        if ($stmt->execute()) {
            // Success, redirect to destination1.php with product ID
            header("Location: destination1.php?id=" . $product_id);
            exit(); // Make sure to exit after redirection
        } else {
            // Error inserting the review
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Validation failed
        echo "Please provide a valid review and rating.";
    }
}

$conn->close(); // Close the database connection
?>
