<?php
session_start(); // Start session to use session variables
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-image: url("first website/istockphoto-503955688-612x612.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height */
        }

        #container {
            background-color: white;
            padding: 20px;
            width: 400px;
            margin: auto;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        fieldset {
            border: none;
            padding: 0;
        }

        .form-field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #6138f5;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Overlay styles */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            z-index: 1000; /* Ensure it is above other content */
        }

        #overlay a {
            color: #ffcc00; /* Color for the link */
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Sign Up</h1>

        <!-- Error Handling -->
        <div id="errorDiv">
            <?php
            if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
                unset($_SESSION['formAttempt']);
                echo "<strong>Errors encountered:</strong><br />\n";
                foreach ($_SESSION['error'] as $error) {
                    echo "<p class='error'>$error</p>\n";
                }
            }
            ?>
        </div>

        <form id="userForm" method="POST" action="register-process.php">
            <fieldset>
                <!-- User Name -->
                <div class="form-field">
                    <label for="Uname">User Name:*</label>
                    <input type="text" id="Uname" name="Uname" required>
                </div>

                <!-- E-mail -->
                <div class="form-field">
                    <label for="email">E-mail Address:*</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <!-- Password -->
                <div class="form-field">
                    <label for="password1">Password:*</label>
                    <input type="password" id="password1" name="password1" required>
                </div>

                <!-- Verify Password -->
                <div class="form-field">
                    <label for="password2">Verify Password:*</label>
                    <input type="password" id="password2" name="password2" required>
                </div>

                <!-- Submit Button -->
                <div class="form-field">
                    <input type="submit" id="submit" name="submit" value="Register">
                </div>
                <a href="frfr.html">Go back</a>
            </fieldset>
        </form>
    </div>

    <!-- Overlay for registration success -->
    <?php if (isset($_SESSION['registrationSuccess'])): ?>
        <div id="overlay">
            <div>
                <h2>Thank you for registering!</h2>
                <p>Click <a href="Login.php">here</a> to login.</p>
            </div>
        </div>
        <?php unset($_SESSION['registrationSuccess']); // Clear the success message after displaying ?>
    <?php endif; ?>

    <script>
        // Show the overlay if it is present
        const overlay = document.getElementById('overlay');
        if (overlay) {
            overlay.style.display = 'flex'; // Show the overlay
        }
    </script>
</body>
</html>
