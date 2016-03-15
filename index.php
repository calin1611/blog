<?php
    session_start();

    define("BASE_URL", "http://localhost/blog/");

    define("VIEWS", "app/views/");
    define("CSS", "public/css/");
    define("MODELS", "app/models/");

    require "app/controllers/controller.php";
    $articles = new Controller();
