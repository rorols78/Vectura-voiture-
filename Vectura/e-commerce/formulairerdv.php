<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="navbarformulaire.css">
</head>

<body>
  <?php session_start(); ?>
  <?php include "navbar.php"; ?>
  <?php require_once "db.php" ?>
  <?php if (isset($_SESSION['mail'])) { ?>
    <div class="container">
      <h1>Contactez nous</h1>
      <div class="border"></div>
      <form class="formulairerdv.php" action="formulairerdv.php" method="POST">
        <input type="text" class="contact-form-text" name="nomprenom" placeholder="Nom,Prenom">
        <input type="email" class="contact-form-text" name="mail" placeholder="Mail">
        <input type="text" class="contact-form-text" name="sujet" placeholder="Sujet">
        <textarea class="contact-form-text" name="message" placeholder="Message"></textarea>
        <input type="submit" class="contact-form-btn" value="Envoyer">
      </form>

    <?php } else {
    header("Location: connexion.php");
  } ?>

    <?php
    $message_sent = false;
    if (isset($_POST['mail']) && $_POST['mail'] != '') {

      if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {

        $nomprenom = $_POST['nomprenom'];
        $mail = $_POST['mail'];
        $message = $_POST['message'];

        $to = "rk.romainkas@gmail.com";
        $body = "";

        $body .= "FROM: . " . $nomprenom . "\r\n";
        $body .= "Mail: . " . $mail . "\r\n";
        $body .= "Message: . " . $message . "\r\n";

        //mail($to, $message, $body);

        $message_sent = true;
      }
    }
    ?>
    </div>

    <?php
    if ($message_sent) :
    ?>
      <center>
        <h4>Merci de nous avoir contacté, nous vous contacterons dans les plus brefs délais</h4>
      </center>

    <?php
    else :
    ?>

    <?php endif; ?><br></br>

    <!---------------------------------------------- STYLE CSS ---------------------------------------------->

    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }

      body {
        background-color: white;
      }

      .container {
        position: center;
        margin: 35px auto;
        top: 50%;
        left: 50%;
        transform: translate(-50% -50%);
        width: 50%;
        padding: 30px;
        background-color: white;
        box-sizing: border-box;
        border-radius: 5px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, .3);
      }

      .container h1 {
        text-align: center;
        color: black;
      }

      .border {
        width: 200px;
        height: 8px;
        background: #34495e;
        margin: 40px auto;
      }

      .contact-form {
        max-width: 600px;
        margin: auto;
        padding: 0 10px;
        overflow: hidden;
      }

      .contact-form-text {
        display: block;
        width: 100%;
        box-sizing: border-box;
        margin: 16px 0;
        border: 0;
        border: solid black 1px;
        border-radius: 10px;
        background: white;
        padding: 20px 40px;
        outline: none;
        color: black;
        transition: 0.5s;
      }

      .contact-form-text:focus {
        box-shadow: 0 0 10px 4px #34495e;
      }

      textarea.contact-form-text {
        resize: none;
        height: 250px;
      }

      .contact-form-btn {
        float: right;
        border: 0;
        background: #34495e;
        color: #fff;
        padding: 12px 50px;
        border-radius: 20px;
        cursor: pointer;
        transition: 0.5s;
      }

      .contact-form-btn:hover {
        background: #2980b9;
      }
    </style>

</body>

<?php include "footer.php"; ?>

</html>