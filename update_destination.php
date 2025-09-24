<?php
session_start();
$id = intval($_POST['id']);
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameLocation = $_POST['name'];
    $nameAddress = $_POST['address'];
    $fee = $_POST['fee'];
    $description = $_POST['description'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $tips = $_POST['tips'];
    $activities = $_POST['activities'];
    $facilities = $_POST['facilities'];
    $contact = $_POST['contact'];

    $types = explode(",", $_POST['type1']);
    $type1 = $types[0] ?? null;
    $type2 = $types[1] ?? null;
    $type3 = $types[2] ?? null;
    $type4 = $types[3] ?? null;
    $type5 = $types[4] ?? null;
    $type6 = $types[5] ?? null;

    $uploaded_images = [
        'image1' => !empty($_FILES['image1']['name']) ? '' : $_POST['I1'],
        'image2' => !empty($_FILES['image2']['name']) ? '' : $_POST['I2'],
        'image3' => !empty($_FILES['image3']['name']) ? '' : $_POST['I3']
    ];

    function upload_image($file_input, $image_key) {
        global $uploaded_images;
        if ($_FILES[$file_input]['error'] === UPLOAD_ERR_NO_FILE) {
            return false; 
        }

        $target_dir = "uploads/";
        $file_name = basename($_FILES[$file_input]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES[$file_input]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES[$file_input]["tmp_name"], $target_file)) {
                $uploaded_images[$image_key] = $target_file;
                return true;
            }
        }
        return false;
    }

    // Upload images if provided
    upload_image('image1', 'image1');
    upload_image('image2', 'image2');
    upload_image('image3', 'image3');

    // Prepare SQL with current or updated image paths
    $stmt = $conn->prepare(
        "UPDATE destination SET 
            Name = ?, Address = ?, Fee = ?, Type1 = ?, Type2 = ?, Type3 = ?, Type4 = ?, Type5 = ?, Type6 = ?, 
            Tips = ?, Facilities = ?, Activities = ?, Time = ?, Description = ?, Contact = ?, 
            Image1 = ?, Image2 = ?, Image3 = ?, Location = ? 
        WHERE dest_id = ?"
    );

    $stmt->bind_param(
        "sssssssssssssssssssi", 
        $nameLocation, $nameAddress, $fee, $type1, $type2, $type3, $type4, $type5, $type6, 
        $tips, $facilities, $activities, $time, $description, $contact, 
        $uploaded_images['image1'], $uploaded_images['image2'], $uploaded_images['image3'], $location, $id
    );

    if ($stmt->execute()) {
        echo "<script>alert('Destination edited successfully!'); window.location.href='destination.php';</script>";
    } else {
        echo "<script>alert('Error: " . addslashes($stmt->error) . "'); window.location.href='destination.php';</script>";
    }

    $stmt->close();
} else {
   echo "<script>alert('Invalid request method.'); window.location.href='destination.php';</script>";
}
?>
