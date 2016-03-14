<?php
    require_once "db_model.php";

    class ArticlesModel extends DB {
        function getAll() {
            $statement = $this->executeQuery("SELECT * FROM articles");
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function getArticle() {

        }

        function addArticle($article) {
            $this->executeQuery("INSERT INTO articles (title, body) VALUES ('" . $article["title"] . "', '" . $article["body"] . "');");
            return $this->db->lastInsertId();
        }

        function updateArticle() {

        }

        function deleteArticle() {

        }
    }