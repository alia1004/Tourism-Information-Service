<?php
session_start();
require 'db_connection.php';

$customer_id = $_SESSION['cid'];

$query = "SELECT bookmark.BID, destination.dest_id, destination.name, destination.image1, destination.fee, bookmark.note
          FROM bookmark
          JOIN destination ON bookmark.destination = destination.dest_id
          WHERE bookmark.customer_id = ?";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$bookmarks = [];
while ($row = $result->fetch_assoc()) {
    $bookmarks[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="default2.css">
    <title>User Profile</title>
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
            background-color: white;
            color: #6138f5;
            text-shadow:1px 1px white;
        }  

        .one {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-color: white;
            font-family: Arial, sans-serif;
        }

        .bookmarks {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .bookmark-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #fff;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .bookmark-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .bookmark-image img {
            width: 150px;
            height: 100px;
            object-fit: cover;
        }

        .bookmark-details {
            flex-grow: 1;
            margin-left: 20px;
        }

        .bookmark-note {
            margin-top: 15px;
        }

        textarea {
            width: 98%;
            padding: 10px;
            margin-top: 10px;
        }



  .nothing{
        font-size: 30px;
        font-weight: bolder;
        position: absolute;
        top: 50%;
        right: 35%;
    }

    .btn-container {
            border: none;
            background-color: #6138f5;
            color: white;
            border-radius: 5px;
            cursor: pointer;
    }

    .button1 {
        padding: 10px 15px;
        border: none;
        background-color: #6138f5;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        max-width: fit-content;
    }

    
    </style>
</head>
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
      <a href="profile.php">Profile</a>
      <a href="bookmark.php" class="active">Bookmark</a>
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


<br>
<br>

<div class="one">
    <div class="bookmarks">
    <?php if (!empty($bookmarks)) { ?>
        <?php foreach ($bookmarks as $bookmark): ?>
            <div class="bookmark-box">
                <div class="bookmark-header">
                    <div class="bookmark-image">
                        <img src="<?php echo htmlspecialchars($bookmark['image1']); ?>" alt="Destination Image">
                    </div>
                    <div class="bookmark-details">
                        <h3>
                            <a href="destination1.php?id=<?php echo $bookmark['dest_id']; ?>" style="text-decoration:none; color:inherit;">
                                <?php echo htmlspecialchars($bookmark['name']); ?>
                            </a>
                        </h3>
                        <p>Fee: <?php echo htmlspecialchars($bookmark['fee']); ?></p>
                    </div>
                    <div class ="btn-container">
                        <button class="note-btn button1" data-id="<?php echo $bookmark['BID']; ?>">
                        <?php echo $bookmark['note'] ? 'Edit Note' : 'Add Note'; ?>
                    </button>

                        <form method="post" action="delete_bookmark.php" onsubmit="return confirm('Are you sure you want to delete this bookmark?');">
                            <input type="hidden" name="BID" value="<?php echo $bookmark['BID']; ?>">
                            <div class ="btn-container">
                        <button type="submit" class="button1">Delete Bookmark</button>
                        </div>
                        
                        </form>
                    </div>
                </div>
               
                <div class="bookmark-note">
                    <p><strong>Note:</strong> <?php echo $bookmark['note'] ? htmlspecialchars($bookmark['note']) : 'No note added.'; ?></p>
                </div>

                <div class="bookmark-note-edit" id="note-<?php echo $bookmark['BID']; ?>" style="display: none;">
                    <form method="post" action="save_note.php">
                        <textarea name="note" rows="4" style="margin=0;"><?php echo htmlspecialchars($bookmark['note']); ?></textarea>
                        <input type="hidden" name="BID" value="<?php echo $bookmark['BID']; ?>">

                        <div class ="btn-container">
                        <button type="submit" class="button1">Save Note</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <div class="nothing">
            <p>No bookmark here.</p>
        </div>
    <?php } ?>
    </div>
</div>


    </div>
    </div>
    <br>
    <br>

    <script>
        document.querySelectorAll('.note-btn').forEach(button => {
            button.addEventListener('click', function() {
                const noteBox = document.getElementById('note-' + this.dataset.id);
                noteBox.style.display = noteBox.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>