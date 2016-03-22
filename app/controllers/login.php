<?php
  require MODELS . "login_model.php";

  class Login {

    public $error;
    function index() {

      if (isset($_POST["login"])) {
        $this->login();
      }

      $pageContent = VIEWS . "login_view.php";
      $title = "Login";
      include VIEWS . "layout_view.php";

    }

    function login(){
      if (isset($_POST["login"])) {
        if (!empty($_POST["username"]) && (!empty($_POST["password"]))) {
          $credentials = array('username' => $_POST["username"], 'password' => $_POST["password"]);

          $loginModel = new LoginModel();
          $result = $loginModel->checkCredentials($credentials);
          if ($result) {
            // echo "MERGE!";
            $_SESSION["logged"] = $_POST["username"];
            $_SESSION["id"] = $result["id"];

            if ($result['class'] == "admin") {
              $_SESSION["admin"] = true;
              header("Location: http://localhost/blog/admin/articles");
            } else {
              header("Location: http://localhost/blog/");
            }
          } else {
            $this->error = "Wrong username or password.<br>";
          }
        } else {
          $this->error = "Please fill the login form.<br>";
        }
      }
    }

    function logout() {
      $_SESSION["logged"] = "";
      session_destroy();

      header("Location: http://localhost/blog/");
    }
  }
