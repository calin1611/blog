<?php
require MODELS . "articles_model.php";

class Post {

  function index() {

    if ($_SESSION["logged"]) {

      // build page
      $title = "Post Article";
      $pageContent = VIEWS . "post_article_view.php";
      include VIEWS . "layout_view.php";

    } else {
      $title = "Restricted page";
      $pageContent = VIEWS . "restricted_view.php";
      include VIEWS . "layout_view.php";
    }
  }

  function postArticle(){
    $articlesModel = new ArticlesModel();

    if ((isset($_POST['title']) && !empty($_POST['title'])) && (isset($_POST['body']) && !empty($_POST['body']))) {

      // build article
      $article["title"] = $_POST['title'];
      $article["body"] = $_POST['body'];
      $article["user_id"] = $_SESSION['id'];

      if (!empty($_FILES["file"])) {

        //get file name
        $fileName = $_FILES["file"]['name'];

        //get file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        //if picture
        if (($ext == 'jpg') || ($ext == 'jpeg') || ($ext == 'png') || ($ext == 'gif')) {
          move_uploaded_file($_FILES["file"]["tmp_name"], UPLOADS.$fileName);

          // hash filename and concatenate the extension
          $fileNameHashed = md5_file(UPLOADS.$fileName) . '.' . $ext;
          rename(UPLOADS.$fileName, UPLOADS.$fileNameHashed);

          $article["image"] = $fileNameHashed;
        } else {
          http_response_code(500);
          echo "wrong filetype";
          return;
        }
      }

      $articlesModel->insertArticle($article);

      http_response_code(200);
    } else {
      http_response_code(500);
    }
  }

}
