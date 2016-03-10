<?php
    require_once "db_model.php";

    class ArticlesModel extends DB {
        function getAll() {
            $statement = $this->executeQuery("SELECT * FROM articles");
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getArticle($id) {
          $statement = $this->executeQuery("SELECT * FROM articles WHERE id = " . $id);
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
