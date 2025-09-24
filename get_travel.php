<?php
require 'db_connection.php';

// Collecting form inputs
$q1 = isset($_POST['q1']) ? $_POST['q1'] : 'no';
$q2 = isset($_POST['q2']) ? $_POST['q2'] : 'no';
$q3 = isset($_POST['q3']) ? $_POST['q3'] : 'no';
$q4 = isset($_POST['q4']) ? $_POST['q4'] : 'no';
$q5 = isset($_POST['q5']) ? $_POST['q5'] : 'no';
$q6 = isset($_POST['q6']) ? $_POST['q6'] : 'no';
$q7 = isset($_POST['q7']) ? $_POST['q7'] : 'no';
$q8 = isset($_POST['q8']) ? $_POST['q8'] : 'no';
$q9 = isset($_POST['q9']) ? $_POST['q9'] : 'no';
$q10 = isset($_POST['q10']) ? $_POST['q10'] : 'no';
$q11 = isset($_POST['q11']) ? $_POST['q11'] : 'no';
$q12 = isset($_POST['q12']) ? $_POST['q12'] : 'no';

// Scoring mechanism
$type_scores = [
    'Adventure' => 0,
    'Hiking' => 0,
    'Camping' => 0,
    'Nature' => 0,
    'Scenery' => 0,
    'Geological site' => 0,
    'Cave' => 0,
    'History' => 0,
    'Cultural' => 0,
    'Religious' => 0,
    'Educational' => 0,
    'Wildlife' => 0,
    'Agriculture' => 0,
    'Animal' => 0,
    'Calming' => 0,
    'Garden' => 0,
    'Recreational park' => 0,
    'Photography' => 0,
    'Market' => 0,
    'Street Art' => 0,
    'Family' => 0,
    'Mini zoo' => 0,
    'Water' => 0,
    'Sightseeing' => 0,
];

// Add score logic for each question
if ($q1 === 'yes') {
    $type_scores['Adventure'] += 1;
    $type_scores['Hiking'] += 1;
    $type_scores['Camping'] += 1;
}
if ($q2 === 'yes') {
    $type_scores['Nature'] += 1;
    $type_scores['Scenery'] += 1;
    $type_scores['Geological site'] += 1;
    $type_scores['Cave'] += 1;
}
if ($q3 === 'yes') {
    $type_scores['History'] += 1;
    $type_scores['Cultural'] += 1;
    $type_scores['Religious'] += 1;
}
if ($q4 === 'yes') {
    $type_scores['Educational'] += 1;
    $type_scores['Wildlife'] += 1;
    $type_scores['Agriculture'] += 1;
    $type_scores['Geological site'] += 1;
}
if ($q5 === 'yes') {
    $type_scores['Animal'] += 1;
    $type_scores['Wildlife'] += 1;
    $type_scores['Mini zoo'] += 1;
}
if ($q6 === 'yes') {
    $type_scores['Calming'] += 1;
    $type_scores['Garden'] += 1;
    $type_scores['Recreational park'] += 1;
}
if ($q7 === 'yes') {
    $type_scores['Scenery'] += 1;
    $type_scores['Photography'] += 1;
    $type_scores['Nature'] += 1;
    $type_scores['Sightseeing'] += 1;
}
if ($q8 === 'yes') {
    $type_scores['Market'] += 1;
    $type_scores['Street Art'] += 1;
}
if ($q9 === 'yes') {
    $type_scores['Family'] += 1;
    $type_scores['Recreational park'] += 1;
    $type_scores['Mini zoo'] += 1;
}
if ($q10 === 'yes') {
    $type_scores['Water'] += 1;
    $type_scores['Recreational park'] += 1;
}

// Sort the scores
arsort($type_scores);
$top_types = array_slice(array_keys($type_scores), 0, 3);

// Assign top types
$type1 = $top_types[0];
$type2 = $top_types[1];
$type3 = $top_types[2];

$sql = "SELECT * FROM destination 
        WHERE type1 IN ('$type1', '$type2', '$type3') 
           OR type2 IN ('$type1', '$type2', '$type3') 
           OR type3 IN ('$type1', '$type2', '$type3')
           OR type4 IN ('$type1', '$type2', '$type3') 
           OR type5 IN ('$type1', '$type2', '$type3') 
           OR type6 IN ('$type1', '$type2', '$type3')";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Recommended Destinations:</h2>";
    while ($row = $result->fetch_assoc()) {
        $dest_id = isset($row['dest_id']) ? $row['dest_id'] : 'N/A';
        $name = isset($row['name']) ? $row['name'] : 'Unknown';
        $description = isset($row['description']) ? $row['description'] : 'No description available';
        $fee = isset($row['fee']) ? $row['fee'] : 'N/A';
        $image1 = isset($row['image1']) ? $row['image1'] : 'default.jpg';
    
            echo "<div>";
            echo "<h3>" . (!empty($row['Name']) ? $row['Name'] : 'Unknown') . "</h3>";
            echo "<p>" . (!empty($row['Description']) ? $row['Description'] : 'No description available') . "</p>";
            echo "<strong>Fee:</strong> " . (!empty($row['Fee']) ? $row['Fee'] : 'N/A') . "<br>";
            echo "<img src='" . (!empty($row['Image1']) ? $row['Image1'] : 'no-image.jpg') . "' alt='" . $row['Name'] . "' style='width:200px;'><br>";
            
            echo "</div><hr>";
        
    }
} else {
    echo "No destinations match your preferences.";
}

$conn->close();
?>
