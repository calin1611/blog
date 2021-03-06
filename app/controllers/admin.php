<?php
  require MODELS . "articles_model.php";
  require MODELS . "users_model.php";

  class Admin {

    private function bounce(){
      if (!array_key_exists("admin", $_SESSION)) {
        //restrict access
        $title = "Restricted page";
        $pageContent = VIEWS . "restricted_view.php";
        include VIEWS . "layout_view.php";
        exit;
      }
    }

    function index() {
      if (array_key_exists("admin", $_SESSION)) {

        // build page
        $title = "AdminZone";
        $pageContent = VIEWS . "admin_landingPage_view.php";
        include VIEWS . "layout_view.php";

      } else {
        //restrict access
        $title = "Restricted page";
        $pageContent = VIEWS . "restricted_view.php";
        include VIEWS . "layout_view.php";      }
    }

    function articles() {
      if ($_SESSION["admin"]) {

        // build page
        $title = "Articles - AdminZone";
        $pageContent = VIEWS . "admin_articles_view.php";
        include VIEWS . "layout_view.php";

      } else {
        // restrict access
        $title = "Restricted page";
        $pageContent = VIEWS . "restricted_view.php";
        include VIEWS . "layout_view.php";      }
    }

    function users() {
      if ($_SESSION["admin"]) {

        // build page
        $title = "Users - AdminZone";
        $pageContent = VIEWS . "admin_users_view.php";
        include VIEWS . "layout_view.php";

      } else {
        // restrict access
        $title = "Restricted page";
        $pageContent = VIEWS . "restricted_view.php";
        include VIEWS . "layout_view.php";      }
    }

    function getJson($value='') {
      $this->bounce();
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $articles = $articlesModel->getAll();
      echo json_encode($articles);
    }

    function getUsersJson($value='') {
      $this->bounce();

      header('Content-Type: application/json');

      $usersModel = new UsersModel();
      $users = $usersModel->getAll();
      echo json_encode($users);
    }

    function getArticle() {
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->getArticle($_GET["id"]);

      echo json_encode($article);
    }

    function updateArticle() {
      header('Content-Type: application/json');

      //Recover PUT method values
      parse_str(file_get_contents("php://input"), $PUT);

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->updateArticle($PUT);

      echo json_encode($article);
    }

    function approveArticle() {
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->approveArticle($_GET);
      echo json_encode($article);
    }

    function unApproveArticle() {
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->unApproveArticle($_GET);
      echo json_encode($article);
    }


    function deleteArticle() {
      header('Content-Type: application/json');
      parse_str(file_get_contents("php://input"), $DELETE);

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->deleteArticle($DELETE);
      echo json_encode($article);
    }


    function mkAdmin() {
      header('Content-Type: application/json');

      $usersModel = new UsersModel();
      $user = $usersModel->mkAdmin($_GET);
      echo json_encode($user);
    }

    function mkUser() {
      header('Content-Type: application/json');

      $usersModel = new UsersModel();
      $user = $usersModel->mkUser($_GET);
      echo json_encode($user);
    }

    function deleteUser() {
      header('Content-Type: application/json');
      parse_str(file_get_contents("php://input"), $DELETE);

      $usersModel = new UsersModel();
      $user = $usersModel->deleteUser($DELETE);
      echo json_encode($user);
    }
  }
