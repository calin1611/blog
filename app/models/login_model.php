<?php
    class LoginModel {
        public $error = "";
        protected $loginCredentials = array("username" => "admin", "password" => "123");

        function __construct() {

            if (isset($_POST["submit"])) {
                if (!empty($_POST["username"]) && (!empty($_POST["password"]))) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    if (($username == $this->loginCredentials["username"]) && ($password == $this->loginCredentials["password"])) {
                        $_SESSION["logged"] = "admin";
                    } else {
                        $this->error .= "Wrong username or password.<br>";
                    }
                } else {
                    $this->error .= "Please fill the login form.<br>";
                }
            }
//pot fi sterse
            echo "<br>user: " . $username;
            echo "<br>pass: " . $password;
            echo "<br>";
            var_dump($_SESSION);
        }
    }