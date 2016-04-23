<?php
require MODELS . "articles_model.php";
require MODELS . "comments_model.php";
require_once MODELS . "users_model.php";

class Article {

  function index() {
    $articleId = $_GET['id'];
    $articlesModel = new ArticlesModel();
    $usersModel = new UsersModel();

    $article = $articlesModel->getArticle($articleId);

    $articleTitle = $article['title'];
    $articleBody = $article['body'];
    $articleCreationDate = $article['creation_date'];
    $articleImageName = $article['image'];

    $user = $usersModel->getUserById($article['user_id']);
    $articleAuthor = $user['username'];

    $commentsModel = new CommentsModel();
    $comments = $commentsModel->getComments($articleId);

    $pageContent = VIEWS . "article_view.php";
    $title = $article['title'] . " - Article";
    include VIEWS . "layout_view.php";

  }

  function postComment(){
    $articleId = $_GET['id'];
    
    $commentsModel = new CommentsModel();
    $comment["article_id"] = $articleId;
    $comment["user"] = $_POST['name'];
    $comment["title"] = $_POST['title'];
    $comment["body"] = $_POST['body'];

    $commentsModel->addComment($comment);

    header("Location: http://localhost/blog/article?id=" . $articleId);
  }

}
