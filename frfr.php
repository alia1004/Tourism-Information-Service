<?php
session_start(); // Start session to use session variables
?>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
  

</head>
<title>Home</title>
<body>

  <div id="container">
    <div id="header">
      <h1>TRAVEL PERLIS! GO</h1>
      <div class = "small"><p>Admin</p></div>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="#home" class="active">Home</a>
      <a href="destination.php">Destination</a>
      <a href="#about">Survey</a>
      <a href="#contact">Contact</a>
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

    <!-- Login and Signup buttons -->
    <button class="signup-btn">
      <a href="register.php">Sign Up</a>
    </button>
    <button class="login-btn">
      <a href="Login.php">Login</a>
    </button>

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
