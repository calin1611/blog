<?php
    class Controller {
        function __construct() {
            //toate paginile disponibile in blog
            $pages = array(
                "articles" => array("path" => "articles.php", "class" => "Articles"),
                "contact" => array("path" => "contact.php", "class" => "Contact"),
                "login" => array("path" => "login.php", "class" => "Login"),
                "admin" => array("path" => "admin.php", "class" => "Admin")
            );

            //structura: localhost/rootFolder/controller/method
            //blog/articles/add
            //daca e doar blog/articles => indexul controllerului "articles"
            //daca e blog/articles/add e accesata metoda "add"

            $uri = $_SERVER["REQUEST_URI"];
            $segments = explode("/", $uri);
            //segments array: [0]=>"" [1]=>root [2]=>controller [3]=>method

            //pagina default pentru aterizare (landing page) cand acceseaza rootul aplicatiei
            $page = "articles";
            $controller = $segments[2];
            $method = empty($segments[3]) ? "" : $segments[3];
            if(!empty($controller)) {
                if (array_key_exists($controller, $pages)) {
                    $page = $controller;
                }
                else {
                    http_response_code(404);
                    var_dump($segments);

                    echo "NOT FOUND";
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