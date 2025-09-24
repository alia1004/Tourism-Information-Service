<?php
session_start();
require 'db_connection.php';
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="default2.css">
<title>Report</title>

<style>
    .reviews {
        display: flex;
        gap: 15px;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }

    .review {
        position: relative;
        width: 550px;
        height: 400px;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 5px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
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

    .review-details {
        flex: 1;
    }

    .review-content p {
        margin: 5px 0;
    }

    .review-img {
        width: 100%;
        height: auto;
        margin-top: 10px;
    }

    .button-container {
        position: absolute;
        top: 88%;
        left: 15px;
        display: flex;
        gap: 5px;
    }

    .button1 {
        padding: 8px 12px;
        border: none;
        background-color: #6138f5;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .button1:hover {
        background-color: #ccc;
    }

    .report-count {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
    }

    .nothing{
        font-size: 30px;
        font-weight: bolder;
        position: absolute;
        top: 50%;
        right: 35%;
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
        <a href="report.php" class="active">Report</a>
        <a href="suggest.php">Suggestion</a>
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
<br>
<br>
<br>

<?php
$query = "SELECT review.cust_ID, review.RID, review.DID, review.Date, review.Rating, review.review, review.Img1, review.Img2, review.Img3, review.report_count, customer.user_name, customer.avatar 
          FROM review 
          INNER JOIN customer ON review.cust_ID = customer.cid WHERE review.report = 'reported'";

$stmt = $mysqli->prepare($query);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    $reviews = [];

    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row; 
    }

    if (!empty($reviews)) {
      echo "<div class='reviews'>";
      foreach ($reviews as $review) {
          echo "<div class='review'>";
          
          echo "<div class='report-count'>" . htmlspecialchars($review['report_count']) . "</div>";
          
          echo "<div class='button-container'>";
          echo "<form method='post' action='delete.php' onsubmit=\"return confirm('Are you sure you want to delete this review?');\">";
          echo "<input type='hidden' name='RID' value='" . htmlspecialchars($review['RID']) . "'>";
          echo "<button type='submit' class='button1'>Delete</button>";
          echo "</form>";       

          echo "<form method='post' action='dismiss_review.php' onsubmit=\"return confirm('Are you sure you want to dismiss this review?');\">";
          echo "<input type='hidden' name='RID' value='" . htmlspecialchars($review['RID']) . "'>";
          echo "<button type='submit' class='button1'>Dismiss</button>";
          echo "</form>";  

          echo "<form method='post' action='ban.php' onsubmit=\"return confirm('Are you sure you want to ban this user?');\">";
          echo "<input type='hidden' name='RID' value='" . htmlspecialchars($review['RID']) . "'>";
          echo "<input type='hidden' name='cust_ID' value='" . htmlspecialchars($review['cust_ID']) . "'>";
          echo "<button type='submit' class='button1'>Ban User</button>";
          echo "</form>";       
          echo "</div>";
  
          echo "<div class='user-info'>";
          echo "<div class='avatar-container'>";
          echo "<img src='" . htmlspecialchars($review['avatar']) . "' alt='Avatar' class='avatar'>";
          echo "</div>";
          echo "<div class='review-details'>";
          echo "<h4>" . htmlspecialchars($review['user_name']) . "</h4>";
          echo "<p><strong>Date:</strong> " . htmlspecialchars($review['Date']) . "</p>";
          echo "<p><strong>Rating:</strong> " . htmlspecialchars($review['Rating']) . "</p>";
          echo "<p>" . htmlspecialchars($review['review']) . "</p>";
          
          if ($review['Img1']) echo "<img src='" . htmlspecialchars($review['Img1']) . "' alt='Review image 1' class='review-img' style='width: 100px; height: 100px; margin-right: 10px;'>";
          if ($review['Img2']) echo "<img src='" . htmlspecialchars($review['Img2']) . "' alt='Review image 2' class='review-img' style='width: 100px; height: 100px; margin-right: 10px;'>";
          if ($review['Img3']) echo "<img src='" . htmlspecialchars($review['Img3']) . "' alt='Review image 3' class='review-img' style='width: 100px; height: 100px; margin-right: 10px;'>";
  
          echo "</div>";
          echo "</div>"; 
          
  
          echo "</div>";
          
      }
      echo "</div>";
  } else {
    echo "<div class='nothing'>";
      echo "<p>No reported review here.</p>";
      echo "</div>";
  
    $stmt->close();}
   } else {
    echo "Error preparing statement: " . $mysqli->error;
}

$mysqli->close();
?>
<br>
<br>
<br>

</html>
