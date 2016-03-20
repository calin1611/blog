<?php
  require_once "db_model.php";

  class UsersModel extends DB {
    function getAll() {
      $statement = $this->executeQuery("SELECT * FROM users ORDER BY `users`.`id` ASC");
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

    function deleteArticle($article) {
      $this->executeQuery("DELETE FROM users WHERE id =" . $article["id"]);
    }
  }
