
<!doctype html>
<html>
<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="register.js"></script>
    <link rel="stylesheet" type="text/css" href="form.css">
    <title>Sign Up</title>
</head>
<body>
<form id="userForm" method="POST" action="SignUp-register.php">
    <div>
        <fieldset>
            <legend>Sign Up</legend>
            <div id="errorDiv">
                <?php
                if (isset($_SESSION['error']) && isset($_SESSION['formAttempt'])) {
                    unset($_SESSION['formAttempt']);
                    echo "Errors encountered<br />\n";
                    foreach ($_SESSION['error'] as $error) {
                        echo $error . "<br />\n";
                    }
                }
                ?>
            </div>
            <label for="uname">User Name:* </label>
            <input type="text" id="fname" name="uname">
            <span class="errorFeedback errorSpan" id="unameError">User Name is required</span>
            <br />
            <label for="email">E-mail Address:* </label>
            <input type="text" id="email" name="email">
            <span class="errorFeedback errorSpan" id="emailError">E-mail is required</span>
            <br />
            <label for="password1">Password:* </label>
            <input type="password" id="password1" name="password1">
            <span class="errorFeedback errorSpan" id="password1Error">Password required</span>
            <br />
            <label for="password2">Verify Password:* </label>
            <input type="password" id="password2" name="password2">
            <span class="errorFeedback errorSpan" id="password2Error">Passwords must match</span>
            <br />
            <input type="submit" id="submit" name="submit">
        </fieldset>
    </div>
</form>
</body>
</html>
