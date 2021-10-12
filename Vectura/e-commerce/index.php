<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <?php session_start(); ?>
    <?php include "navbar.php" ?>
    <?php require_once "db.php" ?>
    <img src="img/intro.png">
    <?php include "corp_du_texte.php" ?>
</body>

<?php include "footer_cookie.php" ?>

</html>