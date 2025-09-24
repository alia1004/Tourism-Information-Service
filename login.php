<?php
session_start();
?>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">

  <style>

.topnav input[type=text] {
        padding: 8px;
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

    #loginForm {
        background-color: white;
        padding: 20px;
        width: 300px;
        border-radius: 10px;
        margin: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    fieldset {
        border: none;
    }

    legend {
        font-size: 24px;
        margin-bottom: 10px;
        text-align: center;
    }


    label {
        display: block;
        margin-bottom: 5px;
    }


    .login input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .errorFeedback {
        color: red;
        display: none;
    }

    .login input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #6138f5;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #ccc;
    }

    .error {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .center-link {
      color: #6138f5;
        text-align: center;
        margin: 20px 0;
    }
  </style>

</head>
<title>Home</title>
<body>

  <div id="container">
    <div id="header">
      <h1>TRAVEL PERLIS! GO</h1>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="frfr1.php">Home</a>
      <a href="destination.php">Destination</a>
      <a href="travel.php">Travel Matchmaker</a>
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

    <br>
    <br>
    <br>

    <div class="login">
      <form id="loginForm" method="POST" action="login-process.php">
          <fieldset>
              <legend>Login</legend>

              <div id="errorDiv">
                  <?php
                  if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
                      unset($_SESSION['formAttempt']);
                      echo "<strong>Errors encountered:</strong><br />\n";
                      foreach ($_SESSION['error'] as $error) {
                          echo "<p class='error'>$error</p>\n";
                      }
                  }
                  ?>
              </div>

              <label for="Email">E-mail Address:* </label>
              <input type="text" id="Email" name="Email">
              <span class="errorFeedback errorSpan" id="emailError">E-mail is required</span>

              <label for="Password">Password:* </label>
              <input type="password" id="Password" name="Password">
              <span class="errorFeedback errorSpan" id="passwordError">Password required</span>

              <br>
              <br>

              <input type="submit" id="submit" name="submit" value="Login">
              <div class="center-link">
    <a href="forgor.php" style="margin-right: 10px;">Forgot Password?</a>
</div>
          </fieldset>
      </form>
    </div>

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
