<?php

    class Login {

        function index() {


            require MODELS . "login_model.php";
            $loginModel = new LoginModel();

            $pageContent = VIEWS . "login_view.php";
            $title = "Login";


            include VIEWS . "layout_view.php";

        }

//        function logout() {
//            session_start();
//
//            session_destroy();
//            $_SESSION["admin"] = "";
//            $this->index();
//        }
    }