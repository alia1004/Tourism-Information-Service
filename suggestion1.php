<?php
require 'db_connection.php';

session_start(); 
$id = $_SESSION['cid']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted from suggest.php
    if (isset($_POST['no'])) {
        $no = intval($_POST['no']);
        $expected_referer = "http://localhost/suggest.php";

        // Check the referer
        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] === $expected_referer) {
            // Delete the suggestion
            $delete_query = "DELETE FROM suggest WHERE no = ?";
            if ($stmt1 = $mysqli->prepare($delete_query)) {
                $stmt1->bind_param("i", $no);
                $stmt1->execute(); // Execute the delete query
                $stmt1->close(); // Close the statement
            } else {
                echo "<script>alert('Error deleting suggestion.'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
                exit; // Exit if delete fails
            }
        }
    }

    // Continue with the insertion of the destination
    $nameLocation = $_POST['name-location'];
    $nameAddress = $_POST['name-address'];
    $description = $_POST['info'];
    $fee = $_POST['fee'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $tip = $_POST['tip'];
    $activity = $_POST['activity'];
    $facility = $_POST['facility'];
    $contact = $_POST['contact'];

    // Allow empty types
    $types = explode(",", $_POST['type']);
    $type1 = isset($types[0]) ? trim($types[0]) : '';
    $type2 = isset($types[1]) ? trim($types[1]) : '';
    $type3 = isset($types[2]) ? trim($types[2]) : '';
    $type4 = isset($types[3]) ? trim($types[3]) : '';
    $type5 = isset($types[4]) ? trim($types[4]) : '';
    $type6 = isset($types[5]) ? trim($types[5]) : '';

    $uploaded_images = ['i1' => '', 'i2' => '', 'i3' => ''];

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
                echo "Uploaded $file_input as $target_file<br>";
            } else {
                echo "Error moving file for $file_input: " . $_FILES[$file_input]['error'] . "<br>";
            }
        } else {
            echo "File is not an image for $file_input.<br>";
        }
    }

    foreach (['i1', 'i2', 'i3'] as $image) {
        if (isset($_FILES[$image]) && $_FILES[$image]['error'] === UPLOAD_ERR_OK) {
            upload_image($image, $image);
        } else {
            echo "Error uploading $image: " . $_FILES[$image]['error'] . "<br>";
        }
    }

    $stmt = $conn->prepare(
        "INSERT INTO destination 
        (Name, Address, Fee, Type1, Type2, Type3, Type4, Type5, Type6, Tips, Facilities, Activities, Time, Description, Contact, Image1, Image2, Image3, Location) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "sssssssssssssssssss", 
        $nameLocation, $nameAddress, $fee, $type1, $type2, $type3, $type4, $type5, $type6, 
        $tip, $facility, $activity, $time, $description, $contact, 
        $uploaded_images['i1'], $uploaded_images['i2'], $uploaded_images['i3'], $location
    );

    if ($stmt->execute()) {
        echo "<script>alert('Destination inserted successfully!'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('Error: " . addslashes($stmt->error) . "'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}
?>
