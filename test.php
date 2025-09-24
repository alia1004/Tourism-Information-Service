<?php
session_start();
require_once 'db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the URL

    // Fetch destination details from the database
    $query = "SELECT * FROM destination WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $desc = $row['description'];
        $type = $row['type'];
        $location = $row['location'];
        // Fetch other fields like rating, activities, tips, facilities
    } else {
        echo "No destination found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
  <title>Destination</title>
</head>

<style>

  /* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.left {
  width: 25%;
}

.right {
  width: 75%;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.justified-grid-gallery {
  --space: 4px;
  --min-height: 190px;
  --last-row-background: rgb(188 234 153);
}
/* Settings end */

.justified-grid-gallery {
  display: flex;
  flex-wrap: wrap;
  grid-gap: var(--space);
  list-style: none;
  margin: 0 !important; /* We use !important to avoid gaps in some environments. */
  padding: 0 !important; /* We use !important to avoid gaps in some environments. */
}

.justified-grid-gallery > * {
  flex-grow: calc(var(--width) * (100000 / var(--height)));
  flex-basis: calc(var(--min-height) * (var(--width) / var(--height)));
  aspect-ratio: var(--width) / var(--height);
  position: relative;
  overflow: hidden;
  margin: 0 !important; /* We use !important to avoid gaps in some environments. */
  padding: 0 !important; /* We use !important to avoid gaps in some environments. */
}

.justified-grid-gallery > * > img {
  position: absolute;
  width: 100%;
  height: 100%;
}

.justified-grid-gallery::after {
  content: " ";
  flex-grow: 1000000000;
  background: var(--last-row-background);
  

.stars {
    font-size: 30px;
    margin: 10px 0;
}

.star {
    cursor: pointer;
    margin: 0 5px;
}

.star.selected {
    color: #FFD700; /* Gold color for selected stars */
}


.topnav input[type=text] {
padding: 9.5px;
margin-top: 9px;
font-size: 17px;
border: none;
}

.topnav .search-container button {
float: right;
padding: 9.5px 12px;
border-radius: 0 3px 3px 0;
margin-top: 9px;
margin-right: 16px;
background: #ddd;
font-size: 17px;
border: none;
cursor: pointer;
}
    
</style>
<body>

  <div id="container">
    <div id="header">
      <h1>TRAVEL PERLIS! GO</h1>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="frfr1.php">Home</a>
      <a href="destination.php" class="active">Destination</a>
      <a href="#about">Survey</a>
      <a href="#contact">Contact</a>
      <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true): ?>
      <a href="profile.php">Profile</a>
      <?php endif; ?>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      <div class="search-container">
        <form action="/action_page.php">
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

      <!-- User is not logged in -->
      <div>
        <button class="signup-btn">
          <a href="register.php">Sign Up</a>
        </button>
        <button class="login-btn">
          <a href="Login.php">Login</a>
        </button>
      </div>
    <?php endif; ?>



    <!-- everything take from one particular id -->

    <h2><?php echo $name; ?></h2>



<!-- Rating (e.g., stars) -->
<?php
// Assuming you already have a connection to the database in $mysqli

// Example destination ID (you can pass it dynamically based on your logic)
$destinationId = $_GET['id']; // For example, passing it through URL

// Fetch the average rating for the destination
$query = "SELECT AVG(rating) as avg_rating FROM review WHERE dest_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $dest_Id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Get the average rating value
$averageRating = round($row['avg_rating']); // Round the rating to nearest whole number

// Display the stars based on the rating
echo '<div class="stars" id="stars">';
for ($i = 1; $i <= 5; $i++) {
    // If $i is less than or equal to $averageRating, mark the star as selected
    $selected = ($i <= $averageRating) ? 'selected' : '';
    echo '<span class="star ' . $selected . '" data-value="' . $i . '">★</span>';
}
echo '</div>';
?>




<!-- Gallery -->
<section class="justified-grid-gallery">
    <!-- Example images, replace with actual images if you store them in the database -->
    <figure style="--width: 640; --height: 520;">
        <img src="https://loremflickr.com/640/520?random=1" alt="destination image">
    </figure>
    <!-- Add more images dynamically if needed -->
</section>

<!-- Description -->
<p><?php echo $desc; ?></p>

<!-- Type -->
<p>Type: <?php echo $type; ?></p>

<!-- Activities -->
<p>What's to do here:</p>
<ul>
    <?php
    $activities = explode(',', $row['activities']); // Assuming activities are stored as comma-separated values
    foreach ($activities as $activity) {
        echo "<li>&#10003; $activity</li>"; // Checkmark icon for each activity
    }
    ?>
</ul>

<!-- Tips -->
<p><u>Tips</u></p>
<ul>
    <?php
    $tips = explode(',', $row['tips']); // Assuming tips are also comma-separated
    foreach ($tips as $tip) {
        echo "<li>&#10003; $tip</li>";
    }
    ?>
</ul>

<!-- Facilities -->
<p><u>What's here</u></p>
<ul>
    <?php
    $facilities = explode(',', $row['facilities']);
    foreach ($facilities as $facility) {
        echo "<li>&#10003; $facility</li>";
    }
    ?>
</ul>

<!-- Location -->
<div class="row">
  <div class="column left" style="background-color:white;">
    <h2><u>Location</u></h2>
    <p><?php echo $location; ?></p>
  </div>
  <div class="column right">
  <iframe src="<?php echo $location; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>

    <!-- Script for responsive menu -->
    <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
    </script>

</body>
</html>

