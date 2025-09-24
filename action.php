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

        h2{margin: 15px 15px;}

        body{ background-color: #6138f5;}

        .search-result {
    border: 1px solid #ddd;
    padding: 15px;
    margin: 15px 15px;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.search-result img {
    display: block;
    margin-bottom: 10px;
}

.search-result h3 {
    font-size: 20px;
    margin-right: 15px;
    margin-bottom: 10px;
    color: #6138f5;
}

.search-result p {
    font-size: 16px;
    color: #555;
}

.search-result a {
    display: inline-block;
    position: relative;
    top: 90%;
    left: 90%;
    padding: 8px 12px;
    background-color: #6138f5;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}


.search-result a:hover {
    background-color: #4b2fd4;
}

.normal {
    justify-content: center;
    display: flex;
    gap: 0px;
}

.super .normal {
    flex: 1;
    padding: 20px;
}

.first-column {
    flex-basis: 25%;
}

.second-column {
    flex-basis: 75%;
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
      <?php if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'): ?>
    <a href="travel.php">Travel Matchmaker</a>
      <?php endif; ?>

      <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] === true): ?>
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="review-all.php">Review</a>
        <a href="Report.php">Report</a>
        <a href="suggest.php">Suggestion</a>
       <?php elseif ($_SESSION['role'] === 'user'): ?>
        <a href="profile.php">Profile</a>
        <a href="bookmark.php">Bookmark</a>
      <?php endif; ?>
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

    <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true): ?>

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

if (isset($_GET['search'])) {
    $searchTerm = trim($_GET['search']);

    if (!empty($searchTerm)) {
        $searchTerm = $mysqli->real_escape_string($searchTerm);

        $query = "SELECT dest_id, name, description, fee, image1
                  FROM destination 
                  WHERE name LIKE '%$searchTerm%' 
                  OR description LIKE '%$searchTerm%' 
                  OR fee LIKE '%$searchTerm%' 
                  OR type1 LIKE '%$searchTerm%'
                  OR type2 LIKE '%$searchTerm%'
                  OR type3 LIKE '%$searchTerm%'
                  OR type4 LIKE '%$searchTerm%'
                  OR type5 LIKE '%$searchTerm%'
                  OR type6 LIKE '%$searchTerm%'
                  OR tips LIKE '%$searchTerm%'
                  OR facilities LIKE '%$searchTerm%'
                  OR activities LIKE '%$searchTerm%'
                  OR location LIKE '%$searchTerm%'
                  OR time LIKE '%$searchTerm%'";

        $result = $mysqli->query($query);
        echo "<br>";
        echo "<br>";
        if ($result && $result->num_rows > 0) {
            echo "<h2>Search Results for '$searchTerm':</h2>";

            while ($row = $result->fetch_assoc()) {
                echo "<div class='search-result'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<div class='normal'>"; 
                echo "<div class='super first-column'>"; 

                echo "<img src='" . htmlspecialchars($row['image1']) . "' alt='Image' style='width:250px;height:150px;'>";
                echo "</div>";

                echo "<div class='super second-column'>"; 
                echo "<p><mark>Description:</mark> " . htmlspecialchars($row['description']) . "</p>";
                echo "<p><mark>Fee:</mark> " . htmlspecialchars($row['fee']) . "</p>";

                echo "</div>";
                echo "</div>";

                echo "<a href='destination1.php?id=" . $row['dest_id'] . "'>View Destination</a>";
                echo "</div>";
            }
        } else {
            echo "<h2>No results found for '$searchTerm'.</h2>";
        }
    } else {
        echo "<h2>Please enter a search term.</h2>";
    }
} else {
    echo "<h2>No search term provided.</h2>";
}
?>

<html>
  <style>
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
