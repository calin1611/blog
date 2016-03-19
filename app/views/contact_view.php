<?php
//    $lastName = "";
//    $lastEmail = "";
//    $lastMessage = "";
//    if (!empty($_POST["name"])) {
//        $lastName = $_POST["name"];
//    }
//
//    if (!empty($_POST["email"])) {
//        $lastEmail = $_POST["email"];
//    }
//
//    if (!empty($_POST["message"])) {
//        $lastMessage = $_POST["message"];
//    }
//
?>
<h1>Contact</h1>

  <form action="http://localhost/blog/contact/sendEmail" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" class="form-control" placeholder="Name" />
    </div>

    <div class="form-group">
      <label for="name">E-mail:</label>
      <input type="text" name="email" class="form-control" placeholder="E-mail" />
    </div>

    <div class="form-group">
      <label for="name">Message:</label>
      <textarea name="message" class="form-control" placeholder="Message" ></textarea>
    </div>

    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Send">
  </form>
