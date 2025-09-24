<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
  <link rel="stylesheet" type="text/css" href="home.css">
  <title>Home</title>
  
  <style>

    hr{
      margin: 20px;
      color: #6138f5;
    }

    /* Style the slideshow container */
    .slideshow-container {
      width: 100%;
      position: relative;
      margin: auto;
    }

    .slide img {
      width: 100%;
      height: 400px;
      object-fit: cover;
    }

    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .search-container, .search-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      width: 80%;
      color: white;
      z-index: 10;
    }

    .search-text {
      color:#6138f5;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .txt {
      text-align: center;
      font-size: 24px;
      font-style: italic;
      margin-top: 20px;
      font-weight: bolder;
    }

    .txt a {
      color: yellow;
    }

    .search-container form {
      display: flex;
    }

    .search-container input[type=text] {
      width: 100%;
      padding: 10px;
      font-size: 17px;
      border: none;
      border-radius: 3px 0 0 3px;
    }

    .search-container button {
      padding: 10px;
      font-size: 17px;
      border: none;
      background-color: #ddd;
      cursor: pointer;
      border-radius: 0 3px 3px 0;
    }

    .large-pictures {
      display: flex;
      justify-content: space-between;
      margin-top: 50px;
      margin-bottom: 50px;
    }

    .large-pictures img {
      width: 100%;
      height: 500px;
      object-fit: cover;
    }

      .large-pictures figcaption {
    margin-top: 10px;
    font-size: 16px;
    color: #333;
    font-weight: bold;
    text-align: center;
}
    

    .large {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  text-align: center;
}

.large img {
  width: 80%;
  height: 400px;
  object-fit: cover;
}


.about, .more {
  text-align: center;
  margin: 0 auto;
}


.about {
  text-align: center;
  position: relative;
  font-size: 30px;
  font-weight: bold;
  color: #333;
  text-transform: uppercase;
  font-family: 'Arial', sans-serif; 
  letter-spacing: 1px;
  margin-bottom: 10px;
}

.about::after {
  content: "";
  position: absolute;
  bottom: -5px;
  left: 50%;
  width: 40%;
  height: 4px;
  background-color: yellow;
  transform: translateX(-50%);
  border-radius: 5px;
}

.more {
  font-size: 20px;
  line-height: 1.6;
  color: #666;
  font-family: 'Arial', sans-serif;
  max-width: 600px;
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
<body>

  <div id="container">
    <div id="header">
      <h1>TRAVEL PERLIS! GO<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <div class="admin">Admin</div>
    <?php endif; ?>
    </h1>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="frfr1.php" class="active">Home</a>
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

      
      <div class="search-text">Find Your Perfect Destination Here in Perlis</div>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <div class="slideshow-container">
      <div class="slide fade">
        <img src="first website/top-destinations-you-must-visit-in-perlis-.jpg">
      </div>

      <div class="slide fade">
        <img src="first website/bukit-chabang-mari-perlis-02.jpg">
      </div>

      <div class="slide fade">
        <img src="first website/vocket-perlis-negeri-sifar-premis-judi-bebas-kedai-judi-header.jpg">
      </div>
      
    <div class="search-container">
      <form action="action.php" method="GET">
          <input type="text" placeholder="Try typing calm, free or nature" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <?php if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'): ?>
        <div class="txt">
      <h7>Can't decide where to go? Answer this </h7><a href="travel.php">Travel Matchmaker</a>
      </div>
      <?php endif; ?>
    </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>


    <div class="large-pictures">
  <figure>
    <img src="first website/perlispark.jpg" alt="Picture 1">
    <figcaption>Do not underestimate Perlis, despite its modest size.</figcaption>
  </figure>
  <figure>
    <img src="first website/Tempat-Menarik-di-Perlis-Wang-Kelian-View-Point-1024x615.png" alt="Picture 2">
    <figcaption>Come here and experience the breathtaking natural scenery that Perlis has to offer!</figcaption>
  </figure>
  <figure>
    <img src="first website/2758954.jpeg" alt="Picture 3">
    <figcaption>Perlis offers a diverse array of destinations, perfect for an ideal vacation experience.</figcaption>
  </figure>
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
  </div>
  <hr>

  <h5 class="about">About</h5>

  <br>
<div class="more">
This website is designed for anyone interested in exploring Perlis, whether you're a lifelong local or a visitor from outside the region. Our goal is to showcase Perlis and introduce its charm to a broader audience.
</div>

<br>

<div class="large">
<img src="first website/2020-01-20-09-05-40.jpg" alt="Picture 1">
</div>

<br>
<br>
<br>
<br>

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

    let slideIndex = 0;
    showSlides(slideIndex);

    let autoSlide = setInterval(function() {
      plusSlides(1);
    }, 2000);

    function plusSlides(n) {
      clearInterval(autoSlide);
      showSlides(slideIndex += n);
      autoSlide = setInterval(function() {
        plusSlides(1);
      }, 2000);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("slide");
      if (n >= slides.length) { slideIndex = 0 }
      if (n < 0) { slideIndex = slides.length - 1 }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slides[slideIndex].style.display = "block";  
    }
  </script>
</body>
</html>
