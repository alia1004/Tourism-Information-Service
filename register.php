
<?php
session_start();
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
            background-color: #6138f5;
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
            background-color: yellow;
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

        .admin-btn {
    position: absolute;
    top: 55px;
    background-color: #ffffd6;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    opacity: 0.9;
  }

  * {
    box-sizing: border-box;
  }
  
  .admin-btn { right: 50px; }
  .admin-btn:hover{
    opacity: 1;
  }
  
  .admin-btn a {
    color: #6138f5;
    text-decoration: none;
  }

    </style>
</head>
<body>

        <div>
        <button class="admin-btn">
          <a href="register-admin.php">For Admin</a>
        </button>
        </div>

    <div id="container">
        <h1>Sign Up</h1>


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

                <div class="form-field">
                    <label for="Uname">User Name:*</label>
                    <input type="text" id="Uname" name="Uname" required>
                </div>

                <div class="form-field">
                    <label for="email">E-mail Address:*</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-field">
                    <label for="password1">Password:*</label>
                    <input type="password" id="password1" name="password1" required>
                </div>

                <div class="form-field">
                    <label for="password2">Verify Password:*</label>
                    <input type="password" id="password2" name="password2" required>
                </div>

                <div class="form-field">
                    <input type="submit" id="submit" name="submit" value="Sign Up">
                </div>
                <a href="frfr1.php">Go back</a>
            </fieldset>
        </form>
    </div>
</body>
</html>
