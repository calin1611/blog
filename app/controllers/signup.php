<?php
  require MODELS . "login_model.php";

  class Signup {

    public $message;

    function index() {

      // if already logged, redirect
      if (array_key_exists("logged", $_SESSION)) {
        header("Location: http://localhost/blog/");
      }

      // if the signup form is submitted, access the "signup" method
      if (array_key_exists("signup", $_POST)) {
        $this->signup();
      }

      // build page
      $title = "Signup";
      $pageContent = VIEWS . "signup_view.php";
      include VIEWS . "layout_view.php";
    }

    function signup(){

      if (array_key_exists("signup", $_POST)) { // delete?

        // check if the form is completed correctly
        if (!empty($_POST["username"]) && (!empty($_POST["password"])) && (!empty($_POST["password2"]))) {
          if ($_POST["password"] == $_POST["password2"]) {

            $credentials = array('username' => $_POST["username"], 'password' => $_POST["password"]);

            $loginModel = new LoginModel();
            $credentialsCheckResult = $loginModel->checkCredentials($credentials);

//

            if ($credentialsCheckResult != false) {
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


            // if the username doesn't exist, create it and login
            if ($status == 'user nonexistent') {
              $id = $loginModel->createUser($credentials);

              $_SESSION["logged"] = $credentials["username"];
              $_SESSION['id'] = $id['id'];

            } elseif ($status == 'ok') {
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
