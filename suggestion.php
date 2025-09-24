<?php
require 'db_connection.php';

session_start(); 
$id = $_SESSION['cid']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameLocation = $_POST['name-location'];
    $nameAddress = $_POST['name-address'];
    $description = $_POST['info'];
    $fee = $_POST['fee'];
    
    // Initialize uploaded images array
    $uploaded_images = ['i1' => '', 'i2' => '', 'i3' => ''];

    // Function to handle image upload
    function upload_image($file_input, $image_key) {
        global $uploaded_images;
        $target_dir = "uploads/";
        $file_name = basename($_FILES[$file_input]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
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

    // Process each image field by its specific name (image1, image2, image3)
    if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
        upload_image('image1', 'i1');
    }
    if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
        upload_image('image2', 'i2');
    }
    if (isset($_FILES['image3']) && $_FILES['image3']['error'] === UPLOAD_ERR_OK) {
        upload_image('image3', 'i3');
    }



    $stmt = $conn->prepare("INSERT INTO suggest (user_id, date_time, name_location, name_address, fee, info, i1, i2, i3) VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("isssssss", $id, $nameLocation, $nameAddress, $fee, $description, $uploaded_images['i1'], $uploaded_images['i2'], $uploaded_images['i3']);

    if ($stmt->execute()) {
        echo "<script>alert('Suggestion submitted successfully!'); window.location.href='destination.php';</script>";
    } else {
        echo "<script>alert('Error: " . addslashes($stmt->error) . "'); window.location.href='destination.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='destination.php';</script>";
}
?>
