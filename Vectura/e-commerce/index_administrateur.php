<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="index_administrateur.css">
    <link rel="stylesheet" href="modification.css">
    <meta charset="utf-8">
    <title>Administration</title>
</head>

<body>

    <?php require_once "db.php" ?>
    <!-- LIEN VERS LA BASE DE DONNEE -->
    <?php session_start(); ?>

    <?php
    if (isset($_SESSION['admin'])) {
        if (isset($_GET['type']) and $_GET['type'] == 'client') {
            if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
                $supprime = (int) $_GET['supprime'];

                $req = $bdd->prepare('DELETE FROM client WHERE ID = ?');
                $req->execute(array($supprime));
            }
        } elseif (isset($_GET['type']) and $_GET['type'] == 'marque') {
            if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
                $supprime = (int) $_GET['supprime'];

                $req = $bdd->prepare('DELETE FROM marque WHERE ID = ?');
                $req->execute(array($supprime));
            }
        }

        /**/

        $client = $bdd->query('SELECT * FROM client');
        $marque = $bdd->query('SELECT * FROM marque');

    ?>
        <div class="all">
            <div class="client">
                <ul>
                    <center>
                        <h2>Tous les clients</h2>
                    </center>
                    <?php while ($c = $client->fetch()) { ?>
                        <li>
                            <?= $c['ID'] ?>
                            - Pseudo : <?= $c['pseudo'] ?> <br />
                            Numéro de téléphone : <?= $c['numero'] ?> <br />
                            Mail : <?= $c['mail'] ?> <br />
                            Adresse : <?= $c['adresse'] ?><br />
                            Code Postal : <?= $c['codepostal'] ?><br />
                            Ville : <?= $c['ville'] ?><br />
                            <a href="index_administrateur.php?type=client&supprime=<?= $c['ID'] ?>">Supprimer</a> <br /><br />
                        </li><?php } ?>
                </ul>
            </div>

            <div class="voiture">
                <ul>
                    <center>
                        <h2>Toutes les voitures</h2>
                    </center>
                    <?php while ($m = $marque->fetch()) { ?>
                        <li> <?= $m['ID'] ?>
                            - Marque : <?= $m['Nom'] ?> <br />
                            Modèle : <?= $m['Modele'] ?> <br />
                            Prix : <?= $m['Prix'] ?> <br />
                            Description du modèle :<br /><?= $m['Description'] ?> <br />
                            <a href="admin_modification.php?numModifier=<?= $m['ID'] ?>">Modifier</a> <a href="index_administrateur.php?type=marque&supprime=<?= $m['ID'] ?>">Supprimer</a>
                        </li><br /><?php } ?>
                </ul>
            </div>
            <center><button type="submit" onclick="window.location.href = 'index.php';">Retour vers le site</button></center>
        </div>

</body>

</html>

<?php } else {
        header("Location: connexion_admin.php");
    } ?>