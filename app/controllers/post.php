<?php
require MODELS . "articles_model.php";

class Post {

  function index() {

    $pageContent = VIEWS . "post_article_view.php";
    $title = "Post Article";
    include VIEWS . "layout_view.php";

  }

  function postArticle(){
    $articlesModel = new ArticlesModel();
    if ((isset($_POST['title']) && !empty($_POST['title'])) && (isset($_POST['body']) && !empty($_POST['body']))) {
      $article["title"] = $_POST['title'];
      $article["body"] = $_POST['body'];
      $article["user_id"] = $_SESSION['id'];

      $articlesModel->insertArticle($article);

      header("Location: http://localhost/blog/post?success=true");
    } else {
      header("Location: http://localhost/blog/post?success=false");

    }
  }

}
