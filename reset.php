<?php
session_start();
$email = $_SESSION['email'] ?? ($_GET['email'] ?? '');
$email = htmlspecialchars($email, ENT_QUOTES);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>

    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #d8ceff;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            background-color: #ffff57;
            color: #6138f5;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
        background-color: rgb(255, 255, 150);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

    <div id="container">
        <h1>Reset Password</h1>
        <p>User Name matches, now you can put your new password.</p>

            <?php

            if (isset($_SESSION['message'])) {
                
                echo "<strong>Errors encountered:</strong><br />\n";
                echo "<p style='color: red;'>" . htmlspecialchars($_SESSION['message']) . "</p>";
                unset($_SESSION['message']);
            }
            ?>
        

        <form id="userForm" method="POST" action="reset_process.php">
    <fieldset>
        <input type='hidden' name='email' value='<?php echo $email; ?>'> 

        <div class="form-field">
            <label for="password1">New Password:*</label>
            <input type="password" id="password1" name="password1" required>
        </div>

        <div class="form-field">
            <label for="password2">Verify Password:*</label>
            <input type="password" id="password2" name="password2" required>
        </div>

        <div class="form-field">
            <input type="submit" id="submit" name="submit" value="Reset Password">
        </div>
    </fieldset>
</form>

<?php
unset($_SESSION['email']);
?>

    </div>
</body>
</html>
