<?php
require MODELS . "articles_model.php";

class Article {

  function index() {
    // $articleId = $_GET["article"];
    $articlesModel = new ArticlesModel();
    // $article = $articlesModel->getArticle(23);
    $article = $articlesModel->getArticle($_GET['id']);   //Asa va trebui sa arate

    var_dump($article);
    var_dump($_GET);

    $articleTitle = $article['title'];
    $articleBody = $article['body'];
    $articleCreationDate = $article['creation_date'];

    // require MODELS . "comments_model.php";
    // $commentsModel = new CommentsModel();
    // $comments = $commentsModel->getAll();

    $pageContent = VIEWS . "article_view.php";
    $title = "Article NAME";
    include VIEWS . "layout_view.php";

  }

  function getHtml() {
    $articlesModel = new ArticlesModel();
    $articles = $articlesModel->getAll();

    $list = "<table>";
    for ($i=0; $i<count($articles); $i++) {
      $list .= "<tr><td>" . $articles[$i]["title"] . "</td><td>" . $articles[$i]["body"] . "</td></tr>";
    }
    $list .= "</table>";

  }


}
