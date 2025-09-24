<?php
session_start();
require 'db_connection.php';
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="default2.css">
<title>Suggestion</title>

<style>
    .suggests {
        margin: 20px;
    }

    .suggest {
        display: flex;
        flex-direction: column;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 15px;
        position: relative;
    }

    .user-info {
        display: flex;
        align-items: flex-start;
    }

    .avatar-container {
        margin-right: 10px;
        margin-top: 20px;
    }

    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .suggest-details {
        flex: 1;
    }

    .suggest-content p {
        margin: 5px 0;
    }

    .suggest-img {
        width: 100%;
        height: auto;
        margin-top: 10px;
    }

    .delete-btn-container {
        position: absolute;
        right: 20px;
        top: 60%;
        transform: translateY(-50%);
    }

    .dismiss-btn-container {
        position: absolute;
        right: 20px;
        top: 40%;
        transform: translateY(-50%);
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

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 20px 16px;
        text-decoration: none;
        font-size: 18px;
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
  max-height: 80vh;
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

    .popup {
  position: relative;
  user-select: none;
}

.popup .popuptext {
  visibility: hidden;
  width: flex;
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

.nothing{
        font-size: 30px;
        font-weight: bolder;
        position: absolute;
        top: 50%;
        right: 38%;
    }
</style>

<div id="container">
    <div id="header">
        <h1>TRAVEL PERLIS! GO
            <div class="admin">Admin</div>
        </h1>
    </div>

    <div class="topnav" id="myTopnav">
        <a href="frfr1.php">Home</a>
        <a href="destination.php">Destination</a>
        <a href="review-all.php">Review</a>
        <a href="report.php">Report</a>
        <a href="suggest.php" class="active">Suggestion</a>
        <a href="contact.php" >Contact us</a>
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

    <div>
        <button class="login-btn">
            <a href="logout.php">Logout</a>
        </button>
    </div>
</div>

<?php
$query = "SELECT suggest.no, suggest.user_id, suggest.name_location, suggest.date_time, suggest.name_address, suggest.fee, suggest.info, suggest.i1, suggest.i2, suggest.i3, customer.user_name, customer.avatar 
          FROM suggest
          INNER JOIN customer ON suggest.user_id = customer.CID";

$stmt = $mysqli->prepare($query);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    $suggests = [];

    while ($row = $result->fetch_assoc()) {
        $suggests[] = $row; 
    }

    if (!empty($suggests)) {
        echo "<div class='suggests'>";
        foreach ($suggests as $suggest) {
            echo "<div class='suggest'>";
            
            echo "<div class='user-info'>";
            echo "<div class='avatar-container'>";
            echo "<img src='" . htmlspecialchars($suggest['avatar']) . "' alt='Avatar' class='avatar'>";
            echo "</div>";
            echo "<div class='suggest-details'>";
            echo "<h4>" . htmlspecialchars($suggest['user_name']) . "</h4>";
            echo "<p><strong>Date:</strong> " . htmlspecialchars($suggest['date_time']) . "</p>";
            echo "<p><strong>Location's Name:</strong> " . htmlspecialchars($suggest['name_location']) . "</p>";
            echo "<p><strong>Address:</strong> " . htmlspecialchars($suggest['name_address']) . "</p>";
            echo "<p><strong>Fee:</strong> " . htmlspecialchars($suggest['fee']) . "</p>";
            echo "<p><strong>Further Information: </strong>" . htmlspecialchars($suggest['info']) . "</p>";

            if ($suggest['i1']) echo "<img src='" . htmlspecialchars($suggest['i1']) . "' alt='Suggestion image 1' style='width: 100px; height: 100px; margin-right: 10px;'>";
            if ($suggest['i2']) echo "<img src='" . htmlspecialchars($suggest['i2']) . "' alt='Suggestion image 2' style='width: 100px; height: 100px; margin-right: 10px;'>";
            if ($suggest['i3']) echo "<img src='" . htmlspecialchars($suggest['i3']) . "' alt='Suggestion image 3' style='width: 100px; height: 100px; margin-right: 10px;'>";

            echo "</div>";
            echo "</div>";

            echo "<div class='delete-btn-container'>";          
            echo "<input type='hidden' name='no' value='" . htmlspecialchars($suggest['no']) . "'>";
            echo "<button class='openFormBtn button1'>Add Suggestion</button>";
            echo "</div>";
            
            
            echo "<div class='dismiss-btn-container'>";
            echo "<form method='post' action='dissmiss_suggest.php' onsubmit=\"return confirm('Are you sure you want to dismiss this suggestion?');\">";
            echo "<input type='hidden' name='no' value='" . htmlspecialchars($suggest['no']) . "'>";
            echo "<button type='submit' class='button1'>Dismiss Suggestion</button>";
            echo "</form>";       
            echo "</div>";
            
            
            
            echo "</div>";
            echo "<br>";
            ?>


              <?php
        }
        echo "</div>";
    } else {    echo "<div class='nothing'>";
        echo "<p>No suggestion here.</p>";
        echo "</div>";
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $mysqli->error;
}

$mysqli->close();
?>


<div id="signUpModal" class="modal">
            <div class="modal-content">
              <span class="closeBtn">&times;</span>

                <h2>Add Suggestion</h2>
                <form action="suggestion1.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name-location" id="name-location" value="<?php echo htmlspecialchars($suggest['name_location']); ?>" required>
                <input type="text" name= "name-address" id="name-address" value="<?php echo htmlspecialchars($suggest['name_address']); ?>" required>
                <label for="info">Description:</label>
                    <textarea name="info" rows="3" id="info"><?php echo htmlspecialchars($suggest['info']); ?></textarea>
                <input type="text" name= "fee" id="fee" value="<?php echo htmlspecialchars($suggest['fee']); ?>"  required>
                <input type="text" name= "time" placeholder="Operation hours" required>
                <input type="text" name= "location" placeholder="Google's Map Link" required>
                <br>
                <br>
                <p>Make sure to put comma after each one:</p>
          
                <div class="popup" onclick="myFunction()">
                <input type="text" name= "type" placeholder="Types" required>
                  <span class="popuptext" id="myPopup">A Simple Popup!</span>
                  </div>
          
                <input type="text" name= "tip" placeholder="Tips" required>
                <input type="text" name= "activity" placeholder="Activities" required>
                <input type="text" name= "facility" placeholder="Facilities" required>
                <input type="text" name= "contact" placeholder="Contact Info" required>
                <br>
                <br>
                      <p>Upload images (user's uploaded images is located in /uploads):</p>
                      <input type="file" name="i1" accept="image/*" required>
                      <input type="file" name="i2" accept="image/*" required>
                      <input type="file" name="i3" accept="image/*" required>
                      <br>
                      <br>
                      
            <?php echo "<input type='hidden' name='no' value='" . htmlspecialchars($suggest['no']) . "'>"; ?>
                <button type="submit">Submit</button>
              </form>
            </div>
          </div>


<script>

const modal = document.getElementById("signUpModal");
const openFormBtns = document.querySelectorAll(".openFormBtn"); // Select all buttons
const closeBtn = document.querySelector(".closeBtn");

openFormBtns.forEach((button) => {
  button.onclick = () => {
    modal.style.display = "flex";
  };
});

closeBtn.onclick = () => {
  modal.style.display = "none";
};

window.onclick = (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
};


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
