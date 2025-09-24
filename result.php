<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
<style>
.center {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.destination-card {
    display: flex;
    flex-direction: column;
    border: 2px solid #ddd;
    padding: 20px;
    margin: 20px 0;
    background-color: #f9f9f9;
    border-radius: 10px;
    max-width: 800px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    cursor: pointer;
}

.destination-card:hover {
    background-color: #f1f1f1;
    transform: scale(1.02);
}

.destination-card h3 {
    margin-top: 0;
    color: #333;
    font-size: 24px;
}

.destination-card p {
    color: #666;
    font-size: 16px;
    line-height: 1.5;
}

.destination-card strong {
    font-weight: bold;
    color: #000;
}

.destination-card img {
    margin-top: 10px;
    border-radius: 5px;
    max-width: 100%;
    height: auto;
}

.footer {
    background-color: #6138f5;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    position: relative;
    bottom: 0;
    width: 100%;
  }
  
  
  .footer-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  
  .footer-contact h5 {
    font-size: 20px;
    margin-bottom: 10px;
    color: yellow;
  }
  
  .footer-contact p {
    margin: 5px 0;
    font-size: 16px;
  }
  
  .footer-contact i {
    margin-right: 10px;
  }
  
  .footer-contact p a {
    color: #ff5733;
    text-decoration: none;
  }
  
  .footer-contact p a:hover {
    text-decoration: underline;
  }


</style>
</head>
<div id="container">
    <div id="header">
      <h1>TRAVEL PERLIS! GO<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <div class="admin">Admin</div>
    <?php endif; ?>
    </h1>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="frfr1.php">Home</a>
      <a href="destination.php">Destination</a>
      <a href="travel.php" class="active">Travel Matchmaker</a>

      <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true): ?>
      <a href="profile.php">Profile</a>
      <a href="bookmark.php">Bookmark</a>
      <?php endif; ?>

      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <a href="add.php">Add Destination</a>
    <a href="review-all.php">Review</a>
    <a href="Report.php">Report</a>
    <?php endif; ?>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      <div class="search-container">
        <form action="action.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>

    <!-- Check if the user is logged in -->
    <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true): ?>

      <!-- User is logged in -->
      <div>
        <button class="login-btn">
          <a href="logout.php">Logout</a>
        </button>
      </div>
    <?php else: ?>

      <div>
        <button class="signup-btn">
          <a href="register.php">Sign Up</a>
        </button>
        <button class="login-btn">
          <a href="Login.php">Login</a>
        </button>
      </div>
    <?php endif; ?>
</html>

<?php
require 'db_connection.php';

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


arsort($type_scores);
$top_types = array_slice(array_keys($type_scores), 0, 2);

$type1 = $top_types[0];
$type2 = $top_types[1];


$sql = "SELECT * FROM destination 
        WHERE type1 IN ('$type1', '$type2') 
           OR type2 IN ('$type1', '$type2') 
           OR type3 IN ('$type1', '$type2')
           OR type4 IN ('$type1', '$type2') 
           OR type5 IN ('$type1', '$type2') 
           OR type6 IN ('$type1', '$type2')";


$result = $conn->query($sql);



        echo "<br>";
        echo "<br>";

            echo "<div class='center'>";
            if ($result->num_rows > 0) {
                echo "<h2>This place seems to suit you!</h2>";
                while ($row = $result->fetch_assoc()) {
                    $dest_id = isset($row['Dest_ID']) ? $row['Dest_ID'] : 'N/A';
                    $name = isset($row['Name']) ? $row['Name'] : 'Unknown';
                    $description = isset($row['Description']) ? $row['Description'] : 'No description available';
                    $fee = isset($row['Fee']) ? $row['Fee'] : 'N/A';
                    $image1 = isset($row['Image1']) ? $row['Image1'] : 'default.jpg';
                    
                    echo "<div class='destination-card' onclick=\"window.location.href='destination1.php?id=" . $dest_id . "'\">"; 
                    echo "<h3>" . htmlspecialchars($name) . "</h3>";
                    echo "<p>" . htmlspecialchars($description) . "</p>";
                    echo "<strong>Fee:</strong> " . htmlspecialchars($fee) . "<br>";
                    echo "<img src='" . htmlspecialchars($image1) . "' alt='" . htmlspecialchars($name) . "' style='width:200px;'><br>"; // Make the image and alt text safe for display
                    echo "</div>";
                }
            } else {
                echo "No destinations match your preferences.";
            }
            echo "</div>";

$conn->close();

?>

<html>
<footer class="footer">
      <div class="footer-container">
        <div class="footer-contact">
          <h5>Contact Us</h5>
          <p><i class="fa fa-envelope"></i> Email: contact@travelperlis.com</p>
          <p><i class="fa fa-phone"></i> Phone: +60 123 4567</p>
          <p><i class="fa fa-map-marker"></i> Email Address: s232020651@unimap.edu.my</p>
        </div>
      </div>
    </footer>
</html>
