<?php
class User {
    public $id;
    public $email;
    public $userName;
    public $role;
    public $isLoggedIn = false;

    function __construct() {
        if (session_id() == "") {
            session_start();
        }
        if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
            $this->_initUser();
        }
    }

    public function authenticate($user, $pass) {
        $mysqli = new mysqli("localhost", "root", "", "tourism");

        if ($mysqli->connect_errno) {
            error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
            return false;
        }

        $safeUser = $mysqli->real_escape_string($user);
        $query = "SELECT * FROM Customer WHERE email = '{$safeUser}'";

        if (!$result = $mysqli->query($query)) {
            error_log("Cannot retrieve account for {$user}");
            return false;
        }

        $row = $result->fetch_assoc();

        if (!$row) {
            error_log("No user found with email {$user}");
            return false;
        }

        $Ban = $row['Ban'];

        if (isset($Ban) && $Ban === "True") {
            $_SESSION['error'][] = "You are banned from this website.";
            return false;
        }

        $dbPassword = $row['password'];

        if (!password_verify($pass, $dbPassword)) {
            error_log("Passwords for {$user} don't match");
            return false;
        }


        $this->id = $row['cid'];
        $this->email = $row['email'];
        $this->userName = $row['user_name'];
        $this->role = $row['role']; 
        $this->isLoggedIn = true;

        $this->_setSession();
        $_SESSION['isLoggedIn'] = true;

        session_regenerate_id(true);

        return true;
    }

    private function _setSession() {
        $_SESSION['cid'] = $this->id;
        $_SESSION['email'] = $this->email;
        $_SESSION['userName'] = $this->userName;
        $_SESSION['role'] = $this->role;
        $_SESSION['isLoggedIn'] = $this->isLoggedIn;
    }

    private function _initUser() {
        $this->id = $_SESSION['cid'];
        $this->email = $_SESSION['email'];
        $this->userName = $_SESSION['userName'];
        $this->role = $_SESSION['role'];
        $this->isLoggedIn = $_SESSION['isLoggedIn'];
    }
}
?>
