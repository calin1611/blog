<?php
  require MODELS . "login_model.php";

  class Login {

    function index() {
      $loginModel = new LoginModel();

      $pageContent = VIEWS . "login_view.php";
      $title = "Login";
      include VIEWS . "layout_view.php";
    }

    function logout() {
      $_SESSION["logged"] = "";
      session_destroy();

      header("Location: http://localhost/blog/");
    }
  }
