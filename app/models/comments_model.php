<?php
  require_once "db_model.php";

  class CommentsModel extends DB{
    function getAll() {
      $statement = $this->executeQuery("SELECT * FROM comments");
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getComments($articleId){
      $statement = $this->executeQuery("SELECT * FROM comments WHERE article_id = " . $articleId);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function addComment($comment) {
      $this->executeQuery("INSERT INTO comments (article_id, user, title, body) VALUES ('" . $comment["article_id"] . "', '" . $comment["user"] . "', '" . $comment["title"] . "', '" . $comment["body"] . "');");
      return $this->db->lastInsertId();
    }
  }
