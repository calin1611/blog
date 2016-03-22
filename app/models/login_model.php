<?php
  require_once "db_model.php";

  class LoginModel extends DB {
    public $error = "";

    function checkCredentials($credentials){
      $query = "SELECT id, password, class FROM users WHERE username = :username OR password = :password";
      $queryParameters = array(':username' => $credentials['username'], ':password' => $credentials['password']);
      $statement = $this->executeQueryNamedParameters($query, $queryParameters);
      $result =  $statement->fetch(PDO::FETCH_ASSOC);
      if (isset($result['id'])) {
        //exista userul
        //daca parola nu e buna=>wrong password
          //altfel =>logare user
        //daca nu exista userul, propunere de inregistrare.
        if ($credentials['username']) {

        }
        return $result;
      } else {
        //nici un rezultat
        return false;
      }
    }
  }
