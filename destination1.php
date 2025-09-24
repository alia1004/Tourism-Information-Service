<?php
session_start();
require 'db_connection.php';
include 'fetch_data1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" type="image/x-icon" href="first website/pngwing.com (1)-modified.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="default2.css">
  <link rel="stylesheet" type="text/css" href="destination1.css"> 
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

.description{ 
  font-size: 20px;
  font-style: italic;  
}

    .highlight-background {
        color: white;
        background-color: #6138f5;
        padding: 15px;
        border-radius: 8px;
    }

    .highlight-background1 {
        padding: 15px;
        background-color: #a7a8ff;
        border-radius: 8px;
    }

    .highlight-background2 {
        background-color: white;
        border-radius: 8px;
    }

    h6 {
      font-size: 30px;
      font-weight: bold;
    }

    .search-result a {
      font-size: 20px;
    padding: 8px 12px;
    background-color: #6138f5;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    }

    .admin { 
  font-size: 15px;
  color: white;
}

.review-item {
    position: relative;
    cursor: pointer;
}

.popup-menu {
    position: absolute;
    top: 0%;
    left: 100%;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 1000; }

.popup-menu form {
    margin: 0;
}

.popup-menu button {
    background-color: #6138f5; 
    color: white; 
    border: none;
    border-radius: 5px;
    padding: 8px 12px;
    cursor: pointer;
    margin-top: 5px;
    width: 100%; }

.popup-menu button:hover {
    background-color: yellow; 
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
      <h1>TRAVEL PERLIS! GO<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <div class="admin">Admin</div>
    <?php endif; ?>
    </h1>
    </div>

    <div class="topnav" id="myTopnav">
      <a href="frfr1.php">Home</a>
      <a href="destination.php" class="active">Destination</a>
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

    <?php
    




          if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            echo "<a onclick='return alert(\"Please log in as a user first, admin!.\")' class='bookmark-icon'><img src='first website/pngegg.png' alt='Bookmark'></a>";
          } else {
            if (isset($_SESSION['cid'])) {
              $dest_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
              echo "<a href='insert_bookmark.php?id=" . $dest_id . "' class='bookmark-icon'><img src='first website/pngegg.png' alt='Bookmark'></a>";
          } else {
              echo "<a onclick='return alert(\"Please log in to bookmark this destination.\")' class='bookmark-icon'><img src='first website/pngegg.png' alt='Bookmark'></a>";
          }
              } 


        if (!empty($destinations)) {
            $destination = $destinations[0];

            $name = $destination['name'] ?? 'Unknown Destination';
            $image1 = $destination['image1'] ?? 'default.jpg';
            $image2 = $destination['image2'] ?? 'default.jpg';
            $image3 = $destination['image3'] ?? 'default.jpg';
            $averageRating = $destination['avg_rating'] ?? 0;
            $description = $destination['description'] ?? 'No description available.';
            $fee = $destination['fee'] ?? 'N/A';
            $time = $destination['time'] ?? 'N/A';
            $location = $destination['location'] ?? 'Location not specified.';
            $address = $destination['address'] ?? 'Unknown';
            $activities = !empty($destination['activities']) ? explode(',', $destination['activities']) : [];
            $tips = !empty($destination['tips']) ? explode(',', $destination['tips']) : [];
            $facilities = !empty($destination['facilities']) ? explode(',', $destination['facilities']) : [];
            $contact = !empty($destination['contact']) ? explode(',', $destination['contact']) : [];

            echo "<div class='destination'>"; 
            echo "<div class='stars-container'>"; 
            echo "<h2 class='destination-name' style='color:#6138f5'>$name</h2>";

            echo "<div class='stars'>";
            for ($i = 1; $i <= 5; $i++) {
                $selected = ($i <= $averageRating) ? 'selected' : '';
                echo "<span class='star $selected'>★</span>";
            }
            echo "</div>";
            
            echo "</div>";

            echo "<p></p>";
            echo "<p></p>";

            echo "<div class='image-grid'>";
            
            echo "<div class='column column-1'>";
                echo "<img src='$image2' alt='$name' />";
                echo "<img src='$image3' alt='$name' />";
            echo "</div>";
            
            echo "<div class='column column-2'>";
                echo "<img src='$image1' alt='$name' />";
            echo "</div>";
            
            echo "</div>";
            echo "<br>";


            
            echo "<div class='text'>";
            echo "<div class='description'>";           
            echo "<p>$description</p>";
            echo "<p>Fee: " . $fee . "</p>";
            echo "<p><mark>Time: " . $time . "</mark></p>";
            echo "</div>";
            
            echo "<br>";

             echo "<div class='highlight-background'>";
            echo "<p><mark>What's to do here:</p></mark><ul>";
            foreach ($activities as $activity) {
                echo "<li>$activity</li>";
            }
            echo "</ul>";
            echo "</div>";

            echo "<br>";
            echo "<br>";
            echo "<div class='highlight-background1'>";
            echo "<p><mark>Tips:</p></mark><ul>";
            foreach ($tips as $tip) {
                echo "<li>$tip</li>";
            }
            echo "</ul>";
            echo "</div>";

            echo "<br>";
            echo "<br>";

            echo "<div class='highlight-background'>";

            echo "<div class='one'>"; 
            echo "<p><mark>What's here:</p></mark><ul>";
            foreach ($facilities as $facility) {
                echo "<li>$facility</li>"; 
            }
            echo "</ul>";
            echo "</div>";
            echo "</div>";

            echo "<br>";
            echo "<br>";

            echo "<div class='highlight-background1'>";

            echo "<div class='normal1'>"; 
            echo "<div class='super first-column'>"; 
            echo "<h3><u><mark>Location</u></mark></h3>";
            echo "<p>$address</p>";
            echo "</div>";
            

            echo "<br>";
            echo "<br>";

            echo "<div class='super second-column'>"; 
              echo $location;

            } else {
              echo "Invalid location URL";
            }

            echo "</div>";
            echo "<br>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
            echo "<br>";

            echo "<hr>";

            echo "<br>";
            echo "<br>";

        echo "<div class='normal'>"; 
        echo "<div class='super first-column'>"; 
        echo "<div class='first-column-content'>";
        echo "<h3><u><mark>Review</u></mark></h3>";
        echo "<p>" . (isset($destinations[0]['avg_rating']) ? $destinations[0]['avg_rating'] . "/5" : "No rating available") . "</p>"; // Show average rating
        
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
          echo "<div class='search-result'>";
          echo "<a onclick='return alert(\"Please log in as a user, admin!\")'>Submit Review</a>";
          echo "</div>"; 
        } else {
          if (isset($_SESSION['cid'])) {
              $dest_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
              echo "<div class='search-result'>";
              echo "<a href='review.php?did=" . $dest_id . "'>Submit Review</a>";
              echo "</div>";
          } else {
                  echo "<div class='search-result'>";
                  echo "<a onclick='return alert(\"Please log in first, user!\")'>Submit Review</a>";
                  echo "</div>";
              }
            }   


      echo "</div>";
        echo "</div>";
        
        echo "<div class='super second-column'>";

        if (!empty($destinations[0]['reviews'])) {
            echo "<div class='review'>";
            echo "<div class='review-header'>";
            echo "<h2>User Reviews</h2>";
            echo "</div>";
        
            foreach ($destinations[0]['reviews'] as $review) {
                echo "<div class='review-item' onclick='openPopup(this)'>";
        
                echo "<div class='review-details'>";
        
                echo "<img src='" . htmlspecialchars($review['avatar']) . "' alt='" . htmlspecialchars($review['user_name']) . "' style='width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;'>";
                echo "<span class='review-user'>" . htmlspecialchars($review['user_name']) . "</span><br>";

              echo "<div class='review-rating'>";
              echo "<div class='small'>";
              echo "<div class='stars'>";
              for ($i = 1; $i <= 5; $i++) {
                  $selected = ($i <= $review['rating']) ? 'selected' :'';
                  echo "<span class='star $selected'>★</span>";
              }

              echo "</div>";
              echo "</div>";
              
              echo "<span class='review-date'>Date: " . htmlspecialchars($review['date']) . "</span>";
              
              
              echo "<br>";
              echo "<br>";
              echo "<p class='review-text'>" . htmlspecialchars($review['review']) . "</p>";

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
  
          
          if (isset($_SESSION['cid'])) {
            
              $previous_page = isset($_GET['id']) ? intval($_GET['id']) : 0;
              echo "<div class='popup-menu' id='popupMenu' style='display: none'>";
              
          
              echo "<form method='post' action='edit_review.php'>";
              echo "<input type='hidden' name='rid' value='" . htmlspecialchars($review['rid']) . "'>";
              echo "<input type='hidden' name='previous_page' value='" . htmlspecialchars($previous_page) . "'>";
              echo "<button type='submit'>Edit Review</button>";
              echo "</form>";
          
              echo "<form method='post' action='delete_review1.php' onsubmit=\"return confirm('Are you sure you want to delete this review?');\">";
              echo "<input type='hidden' name='rid' value='" . htmlspecialchars($review['rid']) . "'>";
              echo "<input type='hidden' name='previous_page' value='" . htmlspecialchars($previous_page) . "'>";
              echo "<button type='submit'>Delete Review</button>";
              echo "</form>";
          
              echo "<form method='post' action='report_review.php'>";
              echo "<input type='hidden' name='rid' value='" . htmlspecialchars($review['rid']) . "'>";
              echo "<input type='hidden' name='previous_page' value='" . htmlspecialchars($previous_page) . "'>";
              echo "<button type='submit'>Report Review</button>";
              echo "</form>";
              echo "</div>";
              
          } else {
            
            $previous_page = isset($_GET['id']) ? intval($_GET['id']) : 0;
            echo "<div class='popup-menu' id='popupMenu' style='display: none'>";
                echo "<form method='post' action='report_review.php'>";
                echo "<input type='hidden' name='rid' value='" . htmlspecialchars($review['rid']) . "'>";
                echo "<input type='hidden' name='previous_page' value='" . htmlspecialchars($previous_page) . "'>";
                echo "<button type='submit'>Report Review</button>";
                echo "</form>";
                echo "</div>";
            }
            

            
            echo "</div>";
          

              echo "</div>";
              echo "</div>";

          }
                    echo "</div>";
          echo "</div>";
      } else {
          echo "<p>No reviews yet. Be the first to review!</p>";
      }
      
        
        echo "</div>";
        echo "<br>";

        echo "</div>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<hr>";
        echo "<br>";
        echo "<br>";

        echo "<div class='highlight-background2'>";
        echo "<h6>Contact Information: <ul>";
        foreach ($contact as $contact) {
          echo "<li>$contact</li>";
      }
      echo "</ul>";
        echo "</h6>";
        echo "</div>";
        
            echo "</div>"
        ?>
    </div>
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

</body>

<script>

      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }

      function openPopup(reviewItem) {
          document.querySelectorAll('.popup-menu').forEach(menu => {
              menu.style.display = 'none';
          });
          const popupMenu = reviewItem.querySelector('.popup-menu');
          popupMenu.style.display = 'block';
          document.addEventListener('click', function closeMenu(event) {
              if (!reviewItem.contains(event.target)) {
                  popupMenu.style.display = 'none';
                  document.removeEventListener('click', closeMenu);
              }
          });
      }

</script>

</html>


