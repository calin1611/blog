<?php
  require_once "db_model.php";

  class LoginModel extends DB {
    public $error = "";

    function __construct() {

      if (isset($_POST["submit"])) {
        if (!empty($_POST["username"]) && (!empty($_POST["password"]))) {
          $username = $_POST["username"];
          $password = $_POST["password"];

          $this->db = new PDO("mysql:host=localhost; dbname=blog", "root", "");

          $statement = $this->executeQuery("SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'");
          $result =  $statement->fetch(PDO::FETCH_ASSOC);

          if (($username == $result["username"]) && ($password == $result["password"])) {
            $_SESSION["logged"] = $result["username"];

            if ($result['class'] == "admin") {
              $_SESSION["admin"] = true;
              header("Location: http://localhost/blog/admin");
            } else {
              header("Location: http://localhost/blog/");
            }
          } else {
            $this->error .= "Wrong username or password.<br>";
          }
        } else {
          $this->error .= "Please fill the login form.<br>";
        }
      }

    }
  }
