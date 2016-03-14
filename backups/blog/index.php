<?php
    session_start();

    define("BASE_URL", "http://localhost/blog/");

    define("VIEWS", "app/views/");
    define("CSS", "public/css/");
    define("MODELS", "app/models/");

    require "app/controllers/controller.php";
    $articles = new Controller();



//    $articles = new Articles();
//    $articles ->getAll();
//    $article = array("title" => "Is Friday", "body" => "Php for everyone!");
//    $lastId = $articles->addArticle($article);
//    echo "<pre>";
//    var_dump($lastId);
//    $articles ->getAll();
//
//    $comments = new Comments();
//    $comments->getAll();
//    $comment = array("article_id"=>"2", "email"=>"aaa@bbb.ccc", "body"=>"Hello!");
//
//    $comments->addComment($comment);