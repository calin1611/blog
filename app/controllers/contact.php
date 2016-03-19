<?php
  class Contact {

    function index() {

      $title = "Contact";
      $pageContent = VIEWS . "contact_view.php";
      include VIEWS . "layout_view.php";
    }

    function saveMessage(){
      require_once MODELS . "contact_model.php";
      $contactModel = new ContactModel;
      $contactModel->sendEmail($_POST['name'], $_POST['email'], $_POST['message']/*, $_POST['submit']*/);
    }

    function sendEmail(){
      require '/lib/PhpMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;

      $mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'iddproba@gmail.com';                 // SMTP username
      $mail->Password = 'parola.123';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      $mail->setFrom('iddproba@gmail.com', 'PHP Mailer');
      $mail->addAddress('calin1611@gmail.com', 'Gheorghe');     // Add a recipient
      // $mail->addAddress('ellen@example.com');               // Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      // $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Un subiect';
      $mail->Body    = 'Blah blah corp <b>in bold!</b>';
      $mail->AltBody = 'Inca Ceva???';

      if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        echo 'Message has been sent';
      }

      $this->saveMessage();
    }
  }
