<?php
require MODELS . "articles_model.php";
require MODELS . "comments_model.php";

class Article {

  function index() {
    // $articleId = $_GET["article"];
    $articlesModel = new ArticlesModel();
    // $article = $articlesModel->getArticle(23);
    $article = $articlesModel->getArticle($_GET['id']);

    $articleTitle = $article['title'];
    $articleBody = $article['body'];
    $articleCreationDate = $article['creation_date'];

    $commentsModel = new CommentsModel();
    $comments = $commentsModel->getComments($_GET['id']);

    $pageContent = VIEWS . "article_view.php";
    $title = $article['title'] . " - Article";
    include VIEWS . "layout_view.php";

  }

  function postComment(){
    $commentsModel = new CommentsModel();
    $comment["article_id"] = $_GET['id'];
    $comment["user"] = $_POST['name'];
    $comment["title"] = $_POST['title'];
    $comment["body"] = $_POST['body'];

    $commentsModel->addComment($comment);

    header("Location: http://localhost/blog/article?id=" . $_GET['id']);
  }

}
