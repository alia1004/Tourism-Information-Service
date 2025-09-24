<?php
session_start();
require 'db_connection.php';
include 'fetch_data.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="default2.css">
    <link rel="stylesheet" type="text/css" href="styles1.css">
    <title>Travel Perlis! Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>

.star {
    cursor: pointer;
    text-align: center;
}



.star.selected {
    color: #FFD700;
}

mark{
        color: #6138f5;
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

.destination1 {
    width: 240px; 
    height: 400px;
    padding: 15px ;
    border-radius: 5px;
    transition: transform 0.2s;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
}

.destination1 h4 {
    text-align: center;
    text-decoration: none;
    margin:0;
}

.admin-destination .form h4 {
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: white;
}

.user-destination .form h4 {
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: white;
}

.guest-destination .form h4 {
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #6138f5;
}


    #openFormBtn {
      font-size: 16px;
      cursor: pointer;
      background-color: #6138f5;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
  background-color: white;
  padding: 20px;
  border-radius: 5px;
  width: 600px;
  max-height: 85vh;
  overflow-y: auto; 
}


    .closeBtn {
      color: #aaa;
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }

    .modal-content input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .modal-content button {
      width: 100%;
      padding: 10px;
      background-color: #6138f5;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .modal-content textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .destination2 {
    width: 250px; 
    height: 400px;
    border: 1px solid #6138f5;
    padding: 15px ;
    border-radius: 5px;
    transition: transform 0.2s;
    overflow: hidden;
    display: flex;
    justify-content: space-between;
}

.button-group {
  display: flex;
  gap: 2px;
  justify-content: center;
  align-items: center;
}

.button1 {
    padding: 10px 15px;
    border: none;
    background-color: #6138f5;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.button1:hover {
    background-color: #ccc;
}

.popup {
  position: relative;
  user-select: none;
}

.popup .popuptext {
  visibility: hidden;
  width: flex;
  max-width: 80%;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -80px;
}

.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}



</style>

<body>

    <main>

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

        <section class="destinations">
            <div class="destination-list">

            <br>
            <br>

            <div class= "space">
            <form method="GET">
                <label for="sort">SORT BY:</label>
                <select name="sort"  id="sort" onchange="this.form.submit()">
                    <option value="default" <?= isset($_GET['sort']) && $_GET['sort'] == 'default' ? 'selected' : ''; ?>>Default</option>
                    <option value="popularity" <?= isset($_GET['sort']) && $_GET['sort'] == 'popularity' ? 'selected' : ''; ?>>Popularity</option>
                </select>
            </form>
            </div>

            <br>

            <div class="all-destinations">
            <?php
              if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                echo "<button id='openFormBtn' class='destination-link' style = 'none'>";
                echo "<div class='destination1 admin-destination'>";
                echo "<div class='form'>";
                echo "<h4>Click here to add a new destination!</h4>";
                echo "</div>";
                echo "</div>";
                echo "</button>";
              }
         else {
            if (isset($_SESSION['cid'])) {
              echo "<button id='openFormBtn' class='destination-link' style = 'none'>";
                echo "<div class='destination1 user-destination'>";
                echo "<div class='form'>";
                echo "<h4>Found a new place in Perlis that you want other people to explore too? Submit here!</h4>";
                echo "</div>";
                echo "</div>";
                echo "</button>";
            } else {
                echo "<a href='#' onclick='alert(\"Please log in to submit suggestion.\"); return false;' class='destination-link'>";
                echo "<div class='destination2 guest-destination'>";
                echo "<div class='form'>";
                echo "<h4>Found a new place in Perlis that you want other people to explore too? Submit here!</h4>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
            }
        }

            foreach ($destinations as $destination) {
                $id  = $destination['id'];
                $name = $destination['name'];
                $image = $destination['image1'];
                $averageRating = $destination['avg_rating'];


                echo "<a href='destination1.php?id=$id' class='destination-link'>";
                echo "<div class='destination'>";
                echo "<img src='$image' alt='$name' />";
                echo "<hr class='separator'>";
                echo "<h3><mark>$name</mark></h3>";
                echo "<div class='star'>";
                for ($i = 1; $i <= 5; $i++) {
                    $selected = ($i <= $averageRating) ? 'selected' : '';
                    echo "<span class='star $selected'>★</span>";
                }
                echo "</div>";
                

              if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'){
                echo "<br>";
                echo "<div class='button-group'>";
                echo "<form method='post' action='delete_destination.php' onsubmit=\"return confirm('Are you sure you want to delete this review?');\">";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<button type='submit' class='button1'>Delete</button>";
                echo "</form>";
                

                echo "<form method='post' action='edit_destination.php'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<button type='submit' class='button1'>Edit</button>";
                echo "</form>";
                echo "</div>";
                }

                echo "</div>";
                echo "</a>";
            }
            ?>

            </div>
            <br>
            <br>
        </section>


        <div id="signUpModal" class="modal">
  <div class="modal-content">
    <span class="closeBtn">&times;</span>

    <?php if (isset($_SESSION['IsLoggedIn']) && $_SESSION['IsLoggedIn'] === true): ?>
    <?php if ($_SESSION['role'] === 'admin'): ?>
      <h2>Add a Place</h2>
      <form action="suggestion1.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="name-location" placeholder="Name" required>
      <input type="text" name= "name-address" placeholder="Location's Address" required>
      <textarea rows="3" name="info" placeholder="Description" required></textarea>
      <input type="text" name= "fee" placeholder="Cost" required>
      <input type="text" name= "time" placeholder="Operation hours" required>
      <input type="text" name= "location" placeholder="Google's Map Link" required>
      <br>
      <br>
      <p>Make sure to put comma after each one:</p>

      <div class="popup" onclick="myFunction()">
      <input type="text" name= "type" placeholder="Types" required>
        <span class="popuptext" id="myPopup">Adventure, Hiking, Scenery, Market, Cultural, Calming, Family, Camping, Wildlife, Educational, Street Art, Photography, Agriculture, Garden, Recreational park, Water, Park, Religious, Animal, Mini zoo, Geological site, Sightseeing, Nature, History, Cave, Art, Forest, Pond</span>
        </div>

      <input type="text" name= "tip" placeholder="Tips" required>
      <input type="text" name= "activity" placeholder="Activities" required>
      <input type="text" name= "facility" placeholder="Facilities" required>
      <input type="text" name= "contact" placeholder="Contact Info" required>
      <br>
      <br>
            <p>Upload images:</p>
            <input type="file" name="i1" accept="image/*" required>
            <input type="file" name="i2" accept="image/*" required>
            <input type="file" name="i3" accept="image/*" required>
            <br>
            <br>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

    <?php elseif ($_SESSION['role'] === 'user'): ?>
      <h2>Suggest a Place</h2>
      <form action="suggestion.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name-location" placeholder="Name" required>
    <input type="text" name="name-address" placeholder="Location's Address" required>
    <textarea rows="3" name="info" placeholder="Description" required></textarea>
    <input type="text" name="fee" placeholder="Cost" required>
    <br><br>
    <p>Upload images (at least one is required):</p>
    <input type="file" name="image1" accept="image/*" required>
    <input type="file" name="image2" accept="image/*">
    <input type="file" name="image3" accept="image/*">
    <br><br>
    <button type="submit">Submit</button>
</form>

  </div>
</div>
    <?php endif; ?>
<?php endif; ?>



<script>
  const modal = document.getElementById("signUpModal");
  const openFormBtn = document.getElementById("openFormBtn");
  const closeBtn = document.querySelector(".closeBtn");

  openFormBtn.onclick = () => {
    modal.style.display = "flex";
  };

  closeBtn.onclick = () => {
    modal.style.display = "none";
  };

  window.onclick = (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
</script>
        
    </main>

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

      function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
  
  document.addEventListener("click", function(event) {
    if (!event.target.closest(".popup") && popup.classList.contains("show")) {
      popup.classList.remove("show");
    }
  });
}
</script>

</html>
