<?php
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Invalid ID provided.");
}

$id = intval($_POST['id']);

// Prepare the SQL query
$query = "SELECT * FROM destination WHERE dest_id = ?";
$stmt = $mysqli->prepare($query);

if (!$stmt) {
    die("Error preparing statement for destination info: " . $mysqli->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$dest = $result->fetch_assoc();

if (!$dest) {
    die("No destination found with the provided ID.");
}

$stmt->close();
$mysqli->close();

$types = [];
for ($i = 1; $i <= 6; $i++) {
    $typeKey = "Type$i";
    if (!empty($dest[$typeKey])) {
        $types[] = htmlspecialchars($dest[$typeKey]);
    }
}
$typeString = implode(", ", $types);
?>