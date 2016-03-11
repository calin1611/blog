<?php
// var_dump($_GET["id"]);
require MODELS . "articles_model.php";

  class Admin {

    function index() {

      $pageContent = VIEWS . "admin_view.php";
      $title = "Admin";
      include VIEWS . "layout_view.php";
    }

    function getJson($value='') {
      //nu trebuie sa mai fie alta afisare in afara de cea de JSON. daca este, nu va mai fi returnat JSONul pentru ca $.ajax nu stie sa interpreteze altceva in afara de json
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $articles = $articlesModel->getAll();
      echo json_encode($articles);
    }

    function getArticle() {
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->getArticle($_GET["id"]);
      echo json_encode($article[0]);
    }

    function updateArticle() {
      header('Content-Type: application/json');

      //Recover PUT method values
      parse_str(file_get_contents("php://input"), $PUT);

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->updateArticle($PUT);

      echo json_encode($article);
    }

    function addArticle() {
      header('Content-Type: application/json');

      $articlesModel = new ArticlesModel();
      $article = $articlesModel->insertArticle($_POST);

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
