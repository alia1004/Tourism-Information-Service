<?php
$mysqli = new mysqli('localhost', 'root', '', 'tourism');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$conn = new mysqli('localhost', 'root', '', 'tourism');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

