<?php
  require MODELS . "articles_model.php";
  require MODELS . "users_model.php";

  class My_articles {

    function index() {
      if (array_key_exists("logged", $_SESSION)) {
        // build page
        $title = "My Articles";
        $pageContent = VIEWS . "my_articles_view.php";
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
      header('Content-Type: application/json');

      $userId = $_SESSION['id'];

      $articlesModel = new ArticlesModel();
      $articles = $articlesModel->getArticleByUser($userId);
      echo json_encode($articles);
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
      $article = $articlesModel->updateArticlewImage($PUT);

      echo json_encode($article);
    }

    function deleteArticle() {
      header('Content-Type: application/json');
      parse_str(file_get_contents("php://input"), $DELETE);

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->deleteArticle($DELETE);
      echo json_encode($article);
    }

  }
