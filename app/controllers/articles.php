<?php
require MODELS . "articles_model.php";

class Articles {
  protected $allArticles;

  function index() {
    $articlesModel = new ArticlesModel();
    $articles = $articlesModel->getAll();

    $this->allArticles = $articles;

    require MODELS . "comments_model.php";
    $commentsModel = new CommentsModel();
    $comments = $commentsModel->getAll();


    //De verificat aici

    $pageContent = VIEWS . "articles_view.php";
    $title = "Articles";
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

  function getJson() {
    header('Content-Type: application/json');

    $articlesModel = new ArticlesModel();
    $articles = $articlesModel->getAll();

    echo json_encode($articles);
  }

  function add() {
    header('Content-Type: application/json');

    $articlesModel = new ArticlesModel();
    $id = $articlesModel->addArticle($_POST);

    echo json_encode(array("id" => $id));
  }

  function update() {
    header('Content-Type: application/json');

    $articlesModel = new ArticlesModel();
    $id = $articlesModel->updateArticle($_POST);

    echo json_encode(array("id" => $id));
  }

  public function getArticlesAjax(){
    $articlesModel = new ArticlesModel;
    $articles = $articlesModel->getAll;
  }

  function paginate() {
    if ($_POST) {
      $page = $_POST['page']; // Current page number
      $per_page = $_POST['per_page']; // Articles per page
      if ($page != 1) $start = ($page-1) * $per_page;
      else $start=0;

      $articlesModel = new ArticlesModel;
      $numArticles = $articlesModel->countArticles();

      $numPage = ceil($numArticles / $per_page); // Total number of pages

      // We build the article list
      $articleList = '';

      $articlesOnPage = $articlesModel->getArticlesForPage($start, $per_page);
      foreach ($articlesOnPage as $value) {
        $articleList .= '<a href="http://localhost/blog/article/?id=' . $value["id"] . '"><div class="well well-sm">' . $value["id"] . '. <b>' . $value["title"] . '</b><p>' . $value["body"] . '</p></div></a>';
      }

      // We send back the total number of page and the article list
      $dataBack = array('numPage' => $numPage, 'articleList' => $articleList);
      echo json_encode($dataBack);
    }
  }
}
