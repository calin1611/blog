<?php
    class Articles {
        function index() {
            require MODELS . "articles_model.php";
            $articlesModel = new ArticlesModel();
            $articles = $articlesModel->getAll();

            require MODELS . "comments_model.php";
            $commentsModel = new CommentsModel();
            $comments = $commentsModel->getAll();


            //paging
//    needed for validation purposes
            $articlesLength = count($articles, COUNT_RECURSIVE);
            var_dump($articlesLength);

//    the result hoes here
            $pages = array();

//    How many items should be on one page
            $itemsPerPage = 5;


            function buildPages($source, $itemsPerPage) {
                global $pages;
                global $articlesLength;


                $x = 1;                 //counter for page items
                $pageNumber = 0;        //the number of the page
                $pageItem = 0;          //the number of the item on a page
                $counter = 0;           //global counter. Checks if the correct total number of items is processed


                for ($i=0; $i<count($source); $i++) {
//                foreach ($source as $key => $value) {
                    var_dump($source[$key]);
                    if ($counter < $articlesLength) {

                        if ($x % $itemsPerPage != 0) {
                            $pages[$pageNumber][$pageItem] = $value;

                            $counter++;
                            $x++;
                            $pageItem++;

                        } else {
                            $pages[$pageNumber][$pageItem] = $value;

                            $counter++;
                            $x = 1;
                            $pageNumber++;
                            $pageItem = 0;
                        }
                    }
                }

            }



            buildPages($articles, $itemsPerPage );


            echo "\$pages: <br>";
            var_dump($pages);

            //De verificat aici

            $pageContent = VIEWS . "articles_view.php";
            $title = "Articles";
            include VIEWS . "layout_view.php";
//            include "app/views/comments_view.php";
        }
    }
