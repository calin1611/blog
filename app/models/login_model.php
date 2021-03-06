<?php
  require_once "db_model.php";

  class LoginModel extends DB {

    function checkIfUserExists($user){
      $query = "SELECT id, username, password, class FROM users WHERE username = :username"; // OR password = :password";
      $queryParameters = array(':username' => $user); //, ':password' => $credentials['password']
      $statement = $this->executeQueryNamedParameters($query, $queryParameters);
      $result =  $statement->fetch(PDO::FETCH_ASSOC);

      return $result;
    }

    function checkCredentials($credentials){
      // $hashedPassword = password_hash($credentials["password"], PASSWORD_BCRYPT);


      $query = "SELECT id, username, password, class FROM users WHERE username = :username AND password = :password";
      $queryParameters = array(':username' => $credentials['username'], ':password' => $credentials["password"]);
      $statement = $this->executeQueryNamedParameters($query, $queryParameters);
      $result =  $statement->fetch(PDO::FETCH_ASSOC);

      // if (password_verify($credentials["password"], $result['password']))

      return $result;
    }

    function createUser($credentials){

      // $hashedPassword = password_hash($credentials["password"], PASSWORD_BCRYPT);
      // var_dump($hashedPassword);
      // die;

      $query = "INSERT INTO users (username, password, class) VALUES (:username, :password, :class);";
      $queryParameters = array(':username' => $credentials["username"] , ':password' => $credentials["password"], ':class' => 'user');
      $this->executeQueryNamedParameters($query, $queryParameters);
      return $this->db->lastInsertId();
    }
  }
