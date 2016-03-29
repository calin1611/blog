<?php
  class Controller {
    function __construct() {
      //toate paginile disponibile in blog
      $pages = array(
        "articles" => array("path" => "articles.php", "class" => "Articles"),
        "article" => array("path" => "article.php", "class" => "Article"),
        "contact" => array("path" => "contact.php", "class" => "Contact"),
        "login" => array("path" => "login.php", "class" => "Login"),
        "signup" => array("path" => "signup.php", "class" => "Signup"),
        "admin" => array("path" => "admin.php", "class" => "Admin"),
        "post" => array("path" => "post.php", "class" => "Post")
      );

      //structura: localhost/rootFolder/controller/method
      //blog/articles/add
      //daca e doar blog/articles => indexul controllerului "articles"
      //daca e blog/articles/add e accesata metoda "add"

      $uri = $_SERVER["PATH_INFO"];
      // $uri = $_SERVER["REQUEST_URI"];
      $segments = explode("/", $uri);
      //segments array: [0]=>"" [1]=>root [2]=>controller [3]=>method
      //pagina default pentru aterizare (landing page) cand acceseaza rootul aplicatiei

      $page = "articles";
      $controller = $segments[1];
      $method = empty($segments[2]) ? "" : $segments[2];
      if(!empty($controller) && $controller != "index.php") {
        if (array_key_exists($controller, $pages)) {
          $page = $controller;
        }
        else {
          http_response_code(404);
          var_dump($segments);
          echo "<br>" . $_SERVER["REQUEST_URI"];

          echo "<br> NOT FOUND";
          var_dump($_GET);
          exit;
        }
      }

      require $pages[$page]["path"];
      $controllerClass = new $pages[$page]["class"]();
      if (empty($method)) {
        $controllerClass->index();
      } else {
        $controllerClass->$method();
      }

    }
  }
