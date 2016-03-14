<?php
require MODELS . "articles_model.php";

class Articles {
  protected $pages = array("zzz");

  function index() {
    $articlesModel = new ArticlesModel();
    $articles = $articlesModel->getAll();

    require MODELS . "comments_model.php";
    $commentsModel = new CommentsModel();
    $comments = $commentsModel->getAll();


    //paging
    //---------------------------------------------------------------------------

    //    needed for validation purposes
    $sourceLength = count($articles);


    //    How many items should be on one page
    $itemsPerPage = 6;


    function buildPages($source, $itemsPerPage) {
      $sourceLength = count($source);


      $x = 1;                 //counter for page items
      $pageNumber = 0;        //the number of the page
      $pageItem = 0;          //the number of the item on a page
      $counter = 0;           //global counter. Checks if the correct total number of items is processed


      for ($i=0; $i<count($source); $i++) {
        echo $source[$i]["title"] . "<br>";
        if ($counter < $sourceLength) {

          if ($x % $itemsPerPage != 0) {
            $pages[$pageNumber][$pageItem]["title"] = $source[$i]["title"];
            $pages[$pageNumber][$pageItem]["body"] = $source[$i]["body"];
            //                            array_push($pages, $source[$i]["title"]);

            $counter++;
            $x++;
            $pageItem++;

          } else {
            echo "<hr>";
            $pages[$pageNumber][$pageItem]["title"] = $source[$i]["title"];
            $pages[$pageNumber][$pageItem]["body"] = $source[$i]["body"];
            //                            array_push($pages, $source[$i]["title"]);

            $counter++;
            $x = 1;
            $pageNumber++;
            $pageItem = 0;
          }
        }
      }

      return $pages;
    }
    $this->pages = buildPages($articles, $itemsPerPage );
    $myJson = json_encode($this->pages);

    $fp = fopen('results.json', 'w');
    fwrite($fp, $myJson);
    fclose($fp);

    function returnPage($source, $pageNumber) {
      $arrayPageNumber = $pageNumber - 1;
      for ($i = 0; $i < count($source[$arrayPageNumber]); $i++) {
        //                    echo "item " . $i . ": " . $source[$arrayPageNumber][$i]["title"] . "<br>";
        //                    echo "item " . $i . ": " . $source[$arrayPageNumber][$i]["body"] . "<br>";

        $articles[$i]["title"] = $source[$arrayPageNumber][$i]["title"];
        $articles[$i]["body"] = $source[$arrayPageNumber][$i]["body"];
      }
      return $articles;
    }
    //            echo "\$pages: <br>";
    //            var_dump($this->pages);
    //---------------------------------------------------------------------------


    //De verificat aici

    $pageContent = VIEWS . "articles_view.php";
    $title = "Articles";
    include VIEWS . "layout_view.php";


    //            include "app/views/comments_view.php";
  }

  function getHtml() {
    $articlesModel = new ArticlesModel();
    $articles = $articlesModel->getAll();

    $list = "<table>";
    for ($i=0; $i<count($articles); $i++) {
      $list .= "<tr><td>" . $articles[$i]["title"] . "</td><td>" . $articles[$i]["body"] . "</td></tr>";
    }
    $list .= "</table>";

    echo $list;
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
}

//----------------------------------
