<?php
  require MODELS . "login_model.php";

  class Login {

    public $message;

    function index() {
      if (array_key_exists("logged", $_SESSION)) {
        header("Location: http://localhost/blog/");
      }

      if (array_key_exists("login", $_POST)) {
        $this->login();
      }

      $pageContent = VIEWS . "login_view.php";
      $title = "Login";
      include VIEWS . "layout_view.php";
    }

    function login(){
      if (array_key_exists("login", $_POST)) {
        if (!empty($_POST["username"]) && (!empty($_POST["password"]))) {
          $credentials = array('username' => $_POST["username"], 'password' => $_POST["password"]);

          $loginModel = new LoginModel();
          $result = $loginModel->checkCredentials($credentials);

          if ($result["status"] == 'ok') {

            //Parola corecta => logare user
              $_SESSION["logged"] = $_POST["username"];
              $_SESSION['id'] = $result['id'];

              if ($result['class'] == "admin") {
                $_SESSION["admin"] = true;
                header("Location: http://localhost/blog/admin/articles");
              } else {
                header("Location: http://localhost/blog/");
              }

          } elseif ($result["status"] == 'wrong password') {
            $this->message = "danger'>Wrong username or password.<br>";
            //nici un rezultat
            //nu exista userul, propunere de inregistrare.
          } else {
            $this->message = "info'>This user does not exist. Would you like to <a href='http://localhost/blog/signup'><b>sign up</b></a>?<br>";
          }

        } else {
          $this->message = "danger'>Please fill the login form.<br>";
        }
      }
    }

    function logout() {
      $_SESSION["logged"] = "";
      session_destroy();

      header("Location: http://localhost/blog/");
    }
  }
