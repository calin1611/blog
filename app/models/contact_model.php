<?php
  require_once "db_model.php";

  class ContactModel extends DB {
    protected $to = "calin1611@gmail.com";
    function __construct() {

      //fara linia de mai jos NU VREA sa execute prepare() din executeQuery()
      $this->db = new PDO("mysql:host=localhost; dbname=blog", "root", "");

      if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["message"])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        mail(
          $this->to,
          "MVC - Contact form",
          "Sender's name: " . $name . " \r\n" . "Sender's email: " . $email . " \r\n" . "Message: \r\n" . $message,
          "From: " . $email);

        echo "MODEL - 1/2 Mailul trebuie sa fie trimis. <br>";


        $query = "INSERT INTO `messages` (name, email, message) VALUES ('" . $name . "', '" . $email . "', '" . $message . "');";
        $this->executeQuery($query);
        echo "MODEL - Query: " . $query . "<br>";
        echo "MODEL - 2/2 Ar trebui sa fie in db. <br>";
      }
    }
  }
