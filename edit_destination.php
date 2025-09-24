<?php
session_start();
$id = intval($_POST['id']);
require 'db_connection.php';
include 'fetch_destination.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destination</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #a7a8ff;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 10px;
    }

    .container {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 750px;
    }

    .container:hover {
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    h1 {
        color: #5a67d8;
        font-size: 30px;
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin-top: 15px;
        display: block;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 98%;
        padding: 10px;
        margin-top: 5px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #5a67d8;
        outline: none;
    }

    .image-container {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin: 20px 0;
    }

    .image-container img {
        width: 100px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    button {
        background-color: #6138f5;
        color: white;
        padding: 12px 30px;
        font-size: 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #ccc;
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
  bottom: 70%;
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
</head>
<body>
<div class="container">
    <h1>Edit Destination</h1>
    <form action="update_destination.php" method="POST" enctype="multipart/form-data" >

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">


        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($dest['Name']); ?>" required>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($dest['Address']); ?>" required>

        <label for="fee">Fee:</label>
        <input type="text" name="fee" id="fee" value="<?php echo htmlspecialchars($dest['Fee']); ?>" required>

        <label for="time">Time:</label>
        <input type="text" name="time" id="time" value="<?php echo htmlspecialchars($dest['Time']); ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="5" id="description" required><?php echo htmlspecialchars($dest['Description']); ?></textarea>

        <br><br>
        <p><u>Don't forget to a comma after each one!</u></p>

        <div class="popup" onclick="myFunction()">
        <label for="type1">Types:</label>
        <input type="text" name="type1" id="type1" value="<?php echo $typeString; ?>" required>
        <span class="popuptext" id="myPopup">Adventure, Hiking, Scenery, Market, Cultural, Calming, Family, Camping, Wildlife, Educational, Street Art, Photography, Agriculture, Garden, Recreational park, Water, Park, Religious, Animal, Mini zoo, Geological site, Sightseeing, Nature, History, Cave, Art, Forest, Pond</span>
        </div>

        <label for="tips">Tips:</label>
        <input type="text" name="tips" id="tips" value="<?php echo htmlspecialchars($dest['Tips']); ?>" required>

        <label for="activities">Activities:</label>
        <input type="text" name="activities" id="activities" value="<?php echo htmlspecialchars($dest['Activities']); ?>" required>

        <label for="facilities">Facilities:</label>
        <input type="text" name="facilities" id="facilities" value="<?php echo htmlspecialchars($dest['Facilities']); ?>" required>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" id="contact" value="<?php echo htmlspecialchars($dest['Contact']); ?>">

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($dest['Location']); ?>" required>

        <p>Current Images:</p>
        <div class="image-container">
            <?php foreach (['Image1', 'Image2', 'Image3'] as $img_key): ?>
                <?php if (!empty($dest[$img_key])): ?>
                    <img src="<?php echo htmlspecialchars($dest[$img_key]); ?>" alt="Destination Image">
                <?php else: ?>
                    <div style="width: 100px; height: 100px; background-color: #e2e8f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">No image</div>
                <?php endif; ?>
            <?php endforeach; ?>
                </div>
                
                
        <input type="hidden" name="I1" id="I1" value="<?php echo htmlspecialchars($dest['Image1']); ?>">
        <input type="hidden" name="I2" id="I2" value="<?php echo htmlspecialchars($dest['Image2']); ?>">
        <input type="hidden" name="I3" id="I3" value="<?php echo htmlspecialchars($dest['Image3']); ?>">


        <label for="image1">Image 1:</label>
        <input type="file" name="image1" id="image1" accept="image/*">

        <label for="image2">Image 2:</label>
        <input type="file" name="image2" id="image2" accept="image/*">

        <label for="image3">Image 3:</label>
        <input type="file" name="image3" id="image3" accept="image/*">

        <div class="button-container">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
</body>
<script>
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
