<?php
require MODELS . "articles_model.php";

class Post {

  function index() {

    if ($_SESSION["logged"]) {
      $pageContent = VIEWS . "post_article_view.php";
      $title = "Post Article";
      include VIEWS . "layout_view.php";
    } else {
      $title = "Restricted page";
      $pageContent = VIEWS . "restricted_view.php";
      include VIEWS . "layout_view.php";
    }
  }

  function postArticle(){
    $articlesModel = new ArticlesModel();
    // var_dump($_POST);
    // die;
    // echo "string";
    if ((isset($_POST['title']) && !empty($_POST['title'])) && (isset($_POST['body']) && !empty($_POST['body']))) {
      $article["title"] = $_POST['title'];
      $article["body"] = $_POST['body'];
      $article["user_id"] = $_SESSION['id'];

      // var_dump($_FILES);

      if (!empty($_FILES["file"])) {
        $fileName = $_FILES["file"]['name'];
        $fileNameNoExtension = pathinfo($fileName, PATHINFO_FILENAME);

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        // $fileNameHashed = md5_file($fileName);
        // $fileNameHashed .= $ext;
        // var_dump($fileName);
        move_uploaded_file($_FILES["file"]["tmp_name"], UPLOADS.$fileName);
        $result = array("filename"=>$fileName);
      }
      $article["image"] = $result['filename'];

      $articlesModel->insertArticle($article);

      http_response_code(200);

    } else {
      http_response_code(412);
    }
  }

  function upload() {
    header('Content-Type: application/json');
    $result = "{}";
    if (!empty($_FILES["file"])) {
      $fileName = $_FILES["file"]['name'];
      $ext = pathinfo($fileName, PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["file"]["tmp_name"], UPLOADS.$fileName);
      $result = array("filename"=>$fileName);
    } else {
      http_response_code(500);
    }
    echo json_encode($result);
  }

}
