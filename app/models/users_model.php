<?php
  require_once "db_model.php";

  class UsersModel extends DB {
    function getAll() {
      $statement = $this->executeQuery("SELECT id, username, class FROM users ORDER BY `users`.`id` ASC");
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserById($id) {
      $statement = $this->executeQuery("SELECT id, username, class FROM users WHERE id = " . $id);
      return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    function countUsers() {
      $statement = $this->executeQuery("SELECT COUNT(id) FROM users");
      return $statement->fetch(PDO::FETCH_ASSOC)['COUNT(id)'];
    }

    function getArticlesForPage($begin, $limit) {
      $statement = $this->executeQuery('SELECT id, title, body FROM users ORDER BY `users`.`id` DESC LIMIT ' . $begin . ', ' . $limit);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function insertArticle($article) {
      $query = "INSERT INTO users (title, body, user_id) VALUES (:title, :body, :user_id);";
      $queryParameters = array(':title' => $article["title"] , ':body' => $article["body"], ':user_id' => $article["user_id"]);
      $this->executeQueryNamedParameters($query, $queryParameters);
      return $this->db->lastInsertId();
    }

    function updateArticle($article) {
      $statement = $this->executeQuery("UPDATE users SET title ='".$article["title"]."',body = '".$article["body"]."' WHERE id =".$article["id"]);
      return $statement->rowCount();
    }

    function deleteUser($user) {
      $query = "DELETE FROM users WHERE id = :id";
      $queryParameters = array("id" => $user["id"]);
      $this->executeQueryNamedParameters($query, $queryParameters);
      // $this->executeQuery("DELETE FROM users WHERE id =" . $user["id"]);
    }

    function mkAdmin($userId){
      $query = "UPDATE users SET class = 'admin' WHERE id = :id";
      $queryParameters = array(':id'=>$userId['id']);
      $this->executeQueryNamedParameters($query, $queryParameters);

      return $this->db->lastInsertId();
    }

    function mkUser($userId){
      $query = "UPDATE users SET class = 'user' WHERE id = :id";
      $queryParameters = array(':id'=>$userId['id']);
      $this->executeQueryNamedParameters($query, $queryParameters);

      return $this->db->lastInsertId();
    }
  }
