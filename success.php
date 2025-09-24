<?php
session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <title>Sign Up Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="default2.css">
    <style>
        /* Centering and styling the message box */
        #message {
            display: flex;
            justify-content: center; /* Horizontal centering */
            align-items: center; /* Vertical centering */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 0 auto; /* Center on the page */
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            margin: 0 0 10px 0;
        }

        a {
            font-size: 20px;
            color:#ccc;
            text-decoration: underline;
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
    </div>
<br>
<br>
    <br>
<br>
    <!-- Thank You Message -->
    <div id="message">
        <div>
            <h2>Thank you for signing up!</h2>
            <p><a href="login.php">Click here to login</a></p>
        </div>
    </div>

    <!-- Script for responsive menu -->
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
