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

    function executeQueryParameters($query, $parameters) {
      $statement = $this->db->prepare($query);
      $statement->execute($parameters);
      return $statement;
    }

    function executeQueryNamedParameters($query, $parameters) {
      $statement = $this->db->prepare($query);
      $statement->execute($parameters);
      return $statement;
    }
  }
