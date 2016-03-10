<?php
    class DB {
        protected $db;
        function __construct() {
            $this->db = new PDO("mysql:host=localhost; dbname=blog", "root", "");
        }

        function executeQuery($query) {

            $statement = $this->db->prepare($query);
            $statement->execute();
            return $statement;
        }
    }
