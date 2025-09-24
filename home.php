<?php
session_start(); // Start session to use session variables
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
