<?php
  require MODELS . "login_model.php";

  class Signup {

    public $message;

    function index() {
      if (array_key_exists("logged", $_SESSION)) {
        header("Location: http://localhost/blog/");
      }

      if (array_key_exists("signup", $_POST)) {
        $this->signup();
      }

      $pageContent = VIEWS . "signup_view.php";
      $title = "Signup";
      include VIEWS . "layout_view.php";
    }

    function signup(){
      if (array_key_exists("signup", $_POST)) {
        if (!empty($_POST["username"]) && (!empty($_POST["password"])) && (!empty($_POST["password2"]))) {
          if ($_POST["password"] == $_POST["password2"]) {
            $credentials = array('username' => $_POST["username"], 'password' => $_POST["password"]);

            $loginModel = new LoginModel();
            $result = $loginModel->checkCredentials($credentials);

            if ($result["status"] == 'user nonexistent') {
              $id = $loginModel->createUser($credentials);

              $_SESSION["logged"] = $credentials["username"];
              $_SESSION['id'] = $id['id'];
              //header("Location: http://localhost/blog");
            } elseif ($result["status"] == 'ok') {
              $this->message = "warning'>The username already exists. Choose another one or <a href='http://localhost/blog/login'><b>log in</b></a><br>";
            }

          } else {
            $this->message = "danger'>The passwords don't match.<br>";
          }

        } else {
          $this->message = "danger'>Please fill the login form.<br>";
        }
      }
    }

  }
