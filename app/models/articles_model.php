<?php
  require_once "db_model.php";

  class ArticlesModel extends DB {
    function getAll() {
      $statement = $this->executeQuery("SELECT * FROM articles ORDER BY `articles`.`id` DESC");
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getArticle($id) {
      $statement = $this->executeQuery("SELECT * FROM articles WHERE id = " . $id);
      return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    function getArticleByUser($userId){
      $statement = $this->executeQuery("SELECT * FROM articles WHERE user_id = " . $userId);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function countArticles() {
      $statement = $this->executeQuery("SELECT COUNT(id) FROM articles");
      return $statement->fetch(PDO::FETCH_ASSOC)['COUNT(id)'];
    }

    function countApprovedArticles() {
      $statement = $this->executeQuery("SELECT COUNT(id) FROM articles WHERE status = 'approved'");
      return $statement->fetch(PDO::FETCH_ASSOC)['COUNT(id)'];
    }

    function getArticlesForPage($begin, $limit) {
      $statement = $this->executeQuery('SELECT id, title, body, image FROM articles WHERE status = "approved" ORDER BY `articles`.`id` DESC LIMIT ' . $begin . ', ' . $limit);
      return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function insertArticle($article) {
      $query = "INSERT INTO articles (title, body, user_id, image) VALUES (:title, :body, :user_id, :image);";
      $queryParameters = array(':title' => $article["title"] , ':body' => $article["body"], ':user_id' => $article["user_id"], ':image' => $article["image"]);
      $this->executeQueryNamedParameters($query, $queryParameters);
      return $this->db->lastInsertId();
    }

    function updateArticle($article) {
      $statement = $this->executeQuery("UPDATE articles SET title ='".$article["title"]."',body = '".$article["body"]."' WHERE id =".$article["id"]);
      return $statement->rowCount();
    }
    //like updateArticle() ^ but with image
    function updateArticlewImage($article) {
      $statement = $this->executeQuery("UPDATE articles SET title ='".$article["title"]."', body = '".$article["body"]."', image = '".$article["image"]."' WHERE id =".$article["id"]);
      return $statement->rowCount();
    }

    function approveArticle($article) {
      $statement = $this->executeQuery("UPDATE articles SET status = 'approved' WHERE id =".$article["id"]);
      // return $statement->rowCount();
      return "approved";
    }

    function unApproveArticle($article) {
      $statement = $this->executeQuery("UPDATE articles SET status = 'pending' WHERE id =".$article["id"]);
      return "UNapproved";
    }

    function deleteArticle($article) {
      $this->executeQuery("DELETE FROM articles WHERE id =" . $article["id"]);
    }
  }
