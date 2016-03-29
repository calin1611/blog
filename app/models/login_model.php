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
      $query = "SELECT id, username, password, class FROM users WHERE username = :username and password = :password";
      $queryParameters = array(':username' => $credentials['username'], ':password' => $credentials['password']);
      $statement = $this->executeQueryNamedParameters($query, $queryParameters);
      $result =  $statement->fetch(PDO::FETCH_ASSOC);

      if ($result != false) {
        $result['status'] = "ok";
        return $result;
      } else {
        $userExists = $this->checkIfUserExists($credentials['username']);
        if ($userExists != false) {
          $userExists['status'] = "wrong password";
          return $userExists;
        } else {
          return $suggestSignup = array('status' => 'user nonexistent' );
        }
      }
    }

    function createUser($credentials){
      $query = "INSERT INTO users (username, password, class) VALUES (:username, :password, :class);";
      $queryParameters = array(':username' => $credentials["username"] , ':password' => $credentials["password"], ':class' => 'user');
      $this->executeQueryNamedParameters($query, $queryParameters);
      return $this->db->lastInsertId();
    }
  }
