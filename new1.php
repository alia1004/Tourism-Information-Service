<?php
require 'db_connection.php';
include 'fetch_data.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Perlis! Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style>


body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}



/* Section styling */
.destinations {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h3 {
    margin-bottom: 20px;
    text-align: center;
    color: #0066cc;
}

/* Form styling */
form {
    margin-bottom: 20px;
}

form label {
    font-size: 1.2rem;
    margin-right: 10px;
    color: #333;
}

form select {
    padding: 5px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Destination container */
.all-destinations {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Space between boxes */
    justify-content: space-evenly; /* Distribute space evenly */
}

.destination {
    width: 200px; /* Fixed width */
    height: 300px; /* Fixed height */
    border: 1px solid #ccc; /* Example border for visual separation */
    padding: 15px; /* Padding inside each box */
    border-radius: 5px; /* Rounded corners */
    transition: transform 0.2s; /* Animation on hover */
    overflow: hidden; /* Hide overflow to maintain box size */
    display: flex;
    flex-direction: column; /* Stack contents vertically */
    justify-content: space-between; /* Distribute space between elements */
    text-align: center; /* Center text */
}

.destination img {
    max-width: 100%; /* Make image responsive */
    height: auto; /* Maintain aspect ratio */
    flex: 1; /* Allow image to take up space */
}

.stars {
    margin-top: 10px; /* Space above stars */
}

.destination:hover {
    transform: scale(1.05); /* Slightly enlarge on hover */
    box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Add shadow on hover */
}


/* Responsive Design */
@media screen and (max-width: 768px) {
    .destination {
        width: calc(50% - 20px); /* For smaller screens, make the cards half-width */
    }
}

@media screen and (max-width: 480px) {
    .destination {
        width: 100%; /* For very small screens, cards will take the full width */
    }
}


</style>

<body>

    <main>
        <section class="destinations">
            <div class="destination-list">

            <form method="GET">
                <label for="sort">Sort by:</label>
                <select name="sort" id="sort" onchange="this.form.submit()">
                    <option value="default" <?= isset($_GET['sort']) && $_GET['sort'] == 'default' ? 'selected' : ''; ?>>Default</option>
                    <option value="popularity" <?= isset($_GET['sort']) && $_GET['sort'] == 'popularity' ? 'selected' : ''; ?>>Popularity</option>
                </select>
            </form>

            <div class="all-destinations">
            <?php
            // Loop through each destination fetched from fetch_data.php
            foreach ($destinations as $destination) {
                $id = $destination['id'];
                $name = $destination['name'];
                $image = $destination['image1'];
                $averageRating = $destination['avg_rating']; // Already fetched in fetch_data.php

                // Create a link for each destination
                echo "<a href='destination.php?id=$id' class='destination-link'>";
                echo "<div class='destination'>"; // Destination box
                echo "<img src='$image' alt='$name' />"; // Image of the destination
                echo "<h3>$name</h3>"; // Name of the destination
                echo "<div class='stars'>"; // Star rating display
                for ($i = 1; $i <= 5; $i++) {
                    $selected = ($i <= $averageRating) ? 'selected' : '';
                    echo "<span class='star $selected'>★</span>"; // Display stars
                }
                echo "</div>"; // Close stars div
                echo "</div>"; // Close destination box
                echo "</a>"; // Close link
            }
            ?>

            </div>
        </section>
    </main>
</body>
</html>
