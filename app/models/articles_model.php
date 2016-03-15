<?php
  require_once "db_model.php";

  class ArticlesModel extends DB {
    function getAll() {
      $statement = $this->executeQuery("SELECT * FROM articles");
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getArticle($id) {
      $statement = $this->executeQuery("SELECT * FROM articles WHERE id = " . $id);
      return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    function countArticles() {
      $statement = $this->executeQuery("SELECT COUNT(id) FROM articles");
      return $statement->fetch(PDO::FETCH_ASSOC)['COUNT(id)'];
    }

    function getArticlesForPage($begin, $limit) {
      $statement = $this->executeQuery('SELECT id, title, body FROM articles ORDER BY `articles`.`id` ASC LIMIT ' . $begin . ', ' . $limit);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function insertArticle($article) {
        $this->executeQuery("INSERT INTO articles (title, body) VALUES ('" . $article["title"] . "', '" . $article["body"] . "');");
        return $this->db->lastInsertId();
    }

    function updateArticle($article) {
      $statement = $this->executeQuery("UPDATE articles SET title ='".$article["title"]."',body = '".$article["body"]."' WHERE id =".$article["id"]);
      return $statement->rowCount();
    }

    function deleteArticle($article) {
      $this->executeQuery("DELETE FROM articles WHERE id =" . $article["id"]);
    }
  }
