<?php
    class Contact {

        function index() {

            require MODELS . "contact_model.php";
            new ContactModel();

            $pageContent = VIEWS . "contact_view.php";
            $title = "Contact";
            include VIEWS . "layout_view.php";
        }
    }