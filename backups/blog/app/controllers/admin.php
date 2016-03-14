<?php
    require MODELS . "admin_model.php";

    class Admin {

        function index() {
            $adminModel = new AdminModel();



            //paging


//            echo "\$articles: <br>";
//            var_dump($articles);

            //De verificat aici

            $pageContent = VIEWS . "admin_view.php";
            $title = "Admin";
            include VIEWS . "layout_view.php";
//            include "app/views/comments_view.php";
        }

    }
