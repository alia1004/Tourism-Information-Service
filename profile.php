<?php
session_start();
require 'db_connection.php';
include 'fetch_profile_data.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>User Profile</title>
</head>

<style>

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

.topnav a.active {
    background-color: #ffffd6;
    color: #6138f5;
    text-shadow:1px 1px white;
  }  

.green{
  color:green;
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

<body>


<div id="container">
    <div id="header">
      <h1>TRAVEL PERLIS! GO</h1>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="frfr1.php">Home</a>
      <a href="destination.php">Destination</a>
      <a href="travel.php">Travel Matchmaker</a>

      <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] == true): ?>
      <a href="profile.php" class="active">Profile</a>
      <a href="bookmark.php">Bookmark</a>
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

<div class="container">
<div class="user-info">

<div class="green">
      <?php
      if (isset($_SESSION['message'])) {
          echo "<p>" . $_SESSION['message'] . "</p>";
          unset($_SESSION['message']);
      }
      ?>
      </div>

    <div class="avatar-section">
        <h3>Avatar</h3>
        <img src="<?php echo htmlspecialchars($user_info['avatar']); ?>" alt="<?php echo htmlspecialchars($user_info['user_name']); ?>" style="width: 100px; height: 100px; border-radius: 50%;">
        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="avatar" accept="image/*">
            <input type="hidden" name="user_name" value="<?php echo htmlspecialchars($user_info['user_name']); ?>">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($user_info['email']); ?>">
            <input type="submit" value="Change Avatar">
        </form>
    </div>
    <br>

    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
    <label for="user_name">Name:</label>
<input type="text" name="user_name" id="user_name" value="<?php echo htmlspecialchars($user_info['user_name']); ?>" required>

        <label for="email"><p>Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user_info['email']); ?>" required>
        </p>
        <br>

        <p>Change Password</p>
        <label for="current_password"><p>Current Password:</label>
        <input type="password" name="current_password" id="current_password"></p>

        <div class="pads">
        <label for="new_password1"><p> New Password:    </label>
        <input type="password" name="new_password1" id="new_password1"></p>
        </div>

        <label for="new_password2"><p>Confirm Password:</label>
        <input type="password" name="new_password2" id="new_password2">
        
        <input type="submit" value="Update Profile"></p>
    </form>

</div>

<div class="user-reviews">

<div class="user-reviews">
    <h2>Previous Reviews</h2>
    <?php if (!empty($reviews)) { ?>
        <ul>
        <?php foreach ($reviews as $review) { ?>
            <li>
                <h3>Review for <?php echo htmlspecialchars($review['destination_name']); ?>:</h3>
                <p>Rating: <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                <p><?php echo htmlspecialchars($review['review']); ?></p>
                <?php
                if (!empty($review['img1']) || !empty($review['img2']) || !empty($review['img3'])) {
                echo "<div class='review-images'>";
                
                if (!empty($review['img1'])) {
                    echo "<img src='" . htmlspecialchars($review['img1']) . "' alt='Review image 1' style='width: 100px; height: 100px; margin-right: 10px;'>";
                }
                if (!empty($review['img2'])) {
                    echo "<img src='" . htmlspecialchars($review['img2']) . "' alt='Review image 2' style='width: 100px; height: 100px; margin-right: 10px;'>";
                }
                if (!empty($review['img3'])) {
                    echo "<img src='" . htmlspecialchars($review['img3']) . "' alt='Review image 3' style='width: 100px; height: 100px;'>";
                }
            
                echo "</div>";
            }
            ?>
            </li>
        <?php } ?>
        </ul>
    <?php } else { ?>
        <p>No reviews yet.</p>
    <?php } ?>
</div>
</div>
</div>
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
