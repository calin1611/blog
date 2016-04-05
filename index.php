<?php
    session_start();

    define("BASE_URL", "http://localhost/blog/");

    define("MODELS", "app/models/");
    define("VIEWS", "app/views/");

    define("CSS", "public/css/");
    define("JS", "public/js/");
    
    define("UPLOADS", "uploads/");

    require "app/controllers/controller.php";
    $articles = new Controller();
