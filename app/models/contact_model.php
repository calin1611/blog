<?php
  require_once "db_model.php";

  class ContactModel extends DB {
    protected $to = "calin1611@gmail.com";

    function sendEmail($name, $email, $message){
//
      // $query = "INSERT INTO `messages` (name, email, message) VALUES ('" . $name . "', '" . $email . "', '" . $message . "');";
      // $this->executeQuery($query);

//___________
      // $query = "INSERT INTO `messages` (name, email, message) VALUES (?, ?, ?);";
      // $queryParameters = array($name , $email, $message);
      // $this->executeQueryParameters($query, $queryParameters);

//___________
      $query = "INSERT INTO `messages` (name, email, message) VALUES (:name, :email, :message);";
      $queryParameters = array(':name' => $name , ':email' => $email, ':message' => $message);
      $this->executeQueryNamedParameters($query, $queryParameters);

      // header("Location: http://localhost/blog/");
    }
  }
