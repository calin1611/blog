<?php
  require MODELS . "login_model.php";

  class Login {

    public $message;

    function index() {

      // if already logged, redirect
      if (array_key_exists("logged", $_SESSION)) {
        header("Location: http://localhost/blog/");
      }

      // if the login form is submitted, access the "login" method
      if (array_key_exists("login", $_POST)) {
        $this->login();
      }

      // build page
      $title = "Login";
      $pageContent = VIEWS . "login_view.php";
      include VIEWS . "layout_view.php";
    }

    function login(){
      if (array_key_exists("login", $_POST)) {
        if (!empty($_POST["username"]) && (!empty($_POST["password"]))) {
          $credentials = array('username' => $_POST["username"], 'password' => $_POST["password"]);

          $loginModel = new LoginModel();

          //check if the provided username and password match
          $credentialsCheckResult = $loginModel->checkCredentials($credentials);
          if ($credentialsCheckResult != false) {
            if (password_verify($credentials["password"], $result['password'])) {
              // var_dump($credentialsCheckResult);
              // die;
              // echo "vf";
              // die;
            }
            $status = 'ok';

          } else {
            // check if the username exists
            $userExists = $loginModel->checkIfUserExists($credentials['username']);
            if ($userExists != false) {
              $status = 'wrong password';
            } else {
              $status ='user nonexistent';
            }
          }

          if ($status == 'ok') {

            //the password is correct => login user
              $_SESSION["logged"] = $_POST["username"];
              $_SESSION['id'] = $credentialsCheckResult['id'];

              if ($credentialsCheckResult['class'] == "admin") {
                $_SESSION["admin"] = true;
                header("Location: http://localhost/blog/admin/articles");
              } else {
                header("Location: http://localhost/blog/");
              }

          } elseif ($status == 'wrong password') {
            $this->message = "danger'>Wrong username or password.<br>";
            //no results
            //the user does not exist; ask to signup
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
