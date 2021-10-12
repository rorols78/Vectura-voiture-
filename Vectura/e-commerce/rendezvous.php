<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Prendre rendez-vous</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="navbarpage.css">
</head>

<body>
    <?php include "navbar.php"; ?>

    <?php require_once "db.php" ?>

    <?php
    if (isset($_GET['id']) and $_GET['id'] > 0) {
        $getid = intval($_GET['id']);
        $voiture = $bdd->prepare('SELECT * FROM marque where ID = ?');
        $voiture->execute(array($getid));
        $Lavoiture = $voiture->fetch();
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2><?php echo $Lavoiture["Nom"]; ?></h2>
                    <h2><?php echo $Lavoiture["Modele"]; ?></h2>
                </div>
                <div class="card-body">
                    <img class="img" <?php echo "<img src = 'img/" . $Lavoiture["Images"] . "'width=\"130px\" height = '80px'"; ?>>
                    <?php if (isset($_SESSION['mail'])) { ?>
                        <a href="formulairerdv.php" class="btn">Prendre rendez-vous</a>
                    <?php } else { ?>
                        <a href="connexion.php" class="btn">Prendre rendez-vous</a>
                    <?php } ?>
                </div>
            </div>
            <div class="description">
                <p> <?php echo $Lavoiture["Description"]; ?> </p>
            </div>
        </div>
    </div>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: sans-serif;
        }

        .container {
            position: center;
            margin: 30px;
            top: 50%;
            left: 50%;
            transform: translate(-50% -50%);
            width: 95%;
            padding: 30px;
            background: #fff;
            box-sizing: border-box;
            border-radius: 10px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, .3);
        }

        .heading {
            text-align: center;
            font-size: 30px;
            margin-bottom: 50px;
        }

        .row {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-flow: wrap;
        }

        .card {
            width: 30%;
            background: white;
            /* COULEUR DE FOND DES CHOIX */
            border: 3px solid white;
            /* BORDURE DES CHOIX */
            margin-bottom: 50px;
            transition: 0.3s;
        }

        .card-header {
            text-align: center;
            padding: 30px 10px;
            background: linear-gradient(to right, black, black);
            /* COULEUR DES TITRES DANS MES CHOIX */
            color: #fff;
            /* COULEUR DE L ECRITURE */
        }

        .card-body {
            padding: 30px 20px;
            text-align: center;
            font-size: 18px;
        }

        .card-body .img {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            min-width: 380px;
            min-height: 250px;
            max-width: 200px;
            max-height: 300px;
        }

        .card-body .btn {
            display: block;
            color: white;
            /* COULEUR DE L ECRITURE POUR "ACHETER" */
            text-align: center;
            background: linear-gradient(to right, black, black);
            /* COULEUR DE LA CASE "ACHETER" */
            margin-top: 30px;
            text-decoration: none;
            padding: 10px 5px;
        }

        .card-body .btn:hover {
            color: white;
            background: linear-gradient(to right, rgb(158, 3, 3), rgb(158, 3, 3));
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
        }

        @media screen and (max-width: 1000px) {
            .card {
                width: 40%;
            }
        }

        @media screen and (max-width: 620px) {
            .container {
                width: 100%;
            }

            .heading {
                padding: 20px;
                font-size: 20px;
            }
        }
    </style>

</body>

<?php include "footer.php" ?>

</html>