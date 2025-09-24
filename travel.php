<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
    <title>Find Your Perfect Destination</title>
    <style>

            h1{
                color: #6138f5;
            }

        #header {
            background-color: white;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 40px;
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

            .topnav a.active {
        background-color: #a7a8ff;
        color: yellow;
        text-shadow:1px 1px #6138f5;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #a7a8ff;
        }

        .question {
            margin-bottom: 20px;
        }

.quiz {
    font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 2px solid #ddd;
    border-radius: 10px;
    background-color: white;
}

.quiz h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.quiz .question {
    margin-bottom: 15px;
}


.quiz .question p {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.quiz label {
    display: block;
    margin: 5px 0;
    font-size: 16px;
    color: #555;
    cursor: pointer;
}

.quiz input[type="radio"] {
    margin-right: 10px;
}

.quiz button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px 0;
    background-color: #6138f5;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

.quiz button[type="submit"]:hover {
    background-color: yellow;
}

.quiz .recommendation {
    margin-top: 20px;
    font-weight: bold;
    font-size: 20px;
    color: #333;
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

.admin { 
  font-size: 15px;
  color: black;
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

<script>
        function validateForm(event) {
            const questions = document.querySelectorAll('.question');
            let allAnswered = true;

            questions.forEach((question) => {
                const radios = question.querySelectorAll('input[type="radio"]');
                let answered = false;

                radios.forEach((radio) => {
                    if (radio.checked) {
                        answered = true;
                    }
                });

                if (!answered) {
                    allAnswered = false;
                    question.style.border = "2px solid red";
                } else {
                    question.style.border = "none";  
                }
            });

            if (!allAnswered) {
                alert("Please answer all questions before proceeding.");
                event.preventDefault();
            }
        }

        window.onload = function() {
            const quizForm = document.getElementById('quizForm');
            quizForm.addEventListener('submit', validateForm);
        }
    </script>
<body>

<form id="quizForm" action="result.php" method="POST" class="quiz">
<h1>Find Your Perfect Destination</h1>
    <div class="question">
        <p>Do you enjoy outdoor adventures?</p>
        <label>
            <input type="radio" name="q1" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q1" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Do you prefer being surrounded by nature?</p>
        <label>
            <input type="radio" name="q2" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q2" value="no"> No
        </label>
    </div>

    <div class="question">
        <p>Are you interested in historical or cultural sites?</p>
        <label>
            <input type="radio" name="q3" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q3" value="no"> No
        </label>
    </div>

    <div class="question">
        <p>Would you like to engage in educational activities or visit educational sites?</p>
        <label>
            <input type="radio" name="q4" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q4" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Do you enjoy interacting with animals?</p>
        <label>
            <input type="radio" name="q5" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q5" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Are you looking for a place to relax and unwind?</p>
        <label>
            <input type="radio" name="q6" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q6" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Are you interested in photography or scenic views?</p>
        <label>
            <input type="radio" name="q7" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q7" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Do you enjoy exploring local markets and street art?</p>
        <label>
            <input type="radio" name="q8" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q8" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Do you want a family-friendly destination?</p>
        <label>
            <input type="radio" name="q9" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q9" value="no"> No
        </label>
    </div>
    
    <div class="question">
        <p>Are you drawn to water activities or being near water?</p>
        <label>
            <input type="radio" name="q10" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="q10" value="no"> No
        </label>
    </div>


    <button type="submit">Get Recommendations</button>
</form>


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

</body>
</html>
